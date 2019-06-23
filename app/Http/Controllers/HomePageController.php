<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Topic\TopicRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Session;

class HomePageController extends Controller
{
    public function __construct(
        UserRepositoryInterface $user,
        TopicRepositoryInterface $topic,
        CategoryRepositoryInterface $category,
        QuestionRepositoryInterface $question
    ) {
        $this->user = $user;
        $this->topic = $topic;
        $this->category = $category;
        $this->question = $question;
    }

    public function home()
    {
        $categories = $this->category->getData(['topics'], [], ['id', 'name']);
        $data = [
            'id',
            'name',
            'slug',
            'category_id',
            'created_at'
        ];
        $topics = $this->topic->getDataWithPaginate(['category'], ['status' => 1], $data);

        $ranks = $this->topic->rank();

        return view('pages.homepage', compact('categories', 'topics', 'ranks'));
    }

    public function getProfile($username, $id)
    {
        $user = $this->user->find($id, ['topics', 'topics.category']);

        return view('pages.profile', compact('user'));
    }

    public function postProfile(UserProfileRequest $request, $username, $id)
    {
        $user_id = $this->user->findById($id);
        $data = $request->all();
        if (isset($data['change_password']) && $data['change_password'] == 'on') {
            $data['password'] = $request->validate([
                'password' => 'required|confirmed|min:6',
            ]);
            $data['password'] = bcrypt($request->password);
        }
        $data['avatar'] = $this->user->handleUploadImage(false, $request->file('avatar'), $user_id);

        unset($data['change_password'], $data['password_confirmation']);

        $this->user->update($id, $data);

        Session::flash('success', trans('translate.succ_acount'));

        return redirect()->route('user.profile', [$this->user->findById($id)->name, $this->user->findById($id)->id]);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/');
    }
}
