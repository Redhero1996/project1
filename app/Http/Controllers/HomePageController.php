<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Topic;
use App\User;
use Image;
use Session;
use Storage;

class HomePageController extends Controller
{

    public function home()
    {
        $categories = Category::all();
        $topics = Topic::latest('id')->where('status', 1)->paginate();

        return view('pages.homepage', compact('categories', 'topics'));
    }

    public function getProfile($username, User $user)
    {
        return view('pages.profile', compact('user'));
    }

    public function postProfile(UserProfileRequest $request, $username, User $user)
    {
        $user->name = $request->name;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        if ($request->change_password == 'on') {
            $user->password = bcrypt($request->password);
        }
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $file_name = time() . '.' . $avatar->getClientOriginalExtension();
            $location = public_path('images/' . $file_name);
            Image::make($avatar)->resize(300, 300)->save($location);
            if (isset($user->avatar)) {
                $old_avatar = $user->avatar;
                $user->avatar = $file_name;
                Storage::delete($old_avatar);
            } else {
                $user->avatar = $file_name;
            }
        }
        $user->save();
        Session::flash('success', trans('translate.succ_acount'));

        return redirect()->route('user.profile', [$user->name, $user->id]);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect('/');
    }
}
