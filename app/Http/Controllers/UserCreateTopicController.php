<?php

namespace App\Http\Controllers;

use App\Http\Requests\HandleCreateTopicRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Topic\TopicRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Repositories\Answer\AnswerRepositoryInterface;
use App\Models\Category;
use App\Models\Topic;
use Session;
use Purifier;

class UserCreateTopicController extends Controller
{
    public function __construct(
        UserRepositoryInterface $user,
        TopicRepositoryInterface $topic,
        CategoryRepositoryInterface $category,
        QuestionRepositoryInterface $question,
        AnswerRepositoryInterface $answer
    ) {
        $this->user = $user;
        $this->topic = $topic;
        $this->category = $category;
        $this->question = $question;
        $this->answer = $answer;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $topics = $this->topic->getData(['category'], ['user_id' => Auth::id()]);

        return view('pages.topics.manage-topic', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alphabet = alphabet();
        $categories = $this->category->getData([], [], ['id', 'name']);

        return view('pages.topics.create-topic', compact('categories', 'alphabet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandleCreateTopicRequest $request)
    {
        $data_topic = $request->only(['category_id', 'name', 'status', 'user_id', 'view_count']);
        $data_topic['slug'] = str_slug($request->name, '-');
        $topic = $this->topic->create($data_topic);

        foreach ($request->content as $key => $question) {
            foreach ($request->explain[$key] as $explain) {
                $data = [
                    'content' => Purifier::clean($question),
                    'explain' => Purifier::clean($explain),
                ];
                $question = $this->question->create($data);
                $question->topics()->sync($topic->id, false);
            }
            $corrected = $question->correct_ans;
            $correct = $request->correct_ans[$key];
            foreach ($request->answer[$key] as $k => $content) {
                $data_ans = [
                    'question_id' => $question->id,
                    'content' => $content,
                ];
                $answer = $this->answer->create($data_ans);
                $answer->question()->associate($question->id);
                for ($i = 0; $i < count($correct); $i++) {
                    if ($k == (int) $correct[$i]) {
                        $corrected[$i] = $answer->id;
                        $question->correct_ans = $corrected;
                    }
                    $question->save();
                }
            }
        }
        Session::flash('success', __('translate.request'));
        // return Response()->json(['status' => 'success']);

        return redirect()->route('create-topics.index', $topic->user_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Topic $topic, $id)
    {
        $alphabet = alphabet();
        $with = [
            'category',
            'questions',
            'questions.answers'
        ];
        $topic = $this->topic->find($id, $with);

        return view('pages.topics.show-topic', compact('topic', 'alphabet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alphabet = alphabet();
        $categories = $this->category->getData([], [], ['id', 'name']);
        $with = [
            'category',
            'questions',
            'questions.answers'
        ];
        $topic = $this->topic->find($id, $with);

        return view('pages.topics.edit-topic', compact('categories', 'topic', 'alphabet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HandleCreateTopicRequest $request, $id)
    {
        $topic = $this->topic->findById($id, ['category' ,'questions']);

        if ($topic->name != $request->topic_name) {
            $data_topic = $request->only(['category_id', 'name', 'status', 'user_id', 'view_count']);
            $data_topic['slug'] = str_slug($request->name, '-');
            $this->topic->update($id, $data_topic);
        }
        foreach ($topic->questions as $key => $question) {
            $data = [
                'content' => Purifier::clean($request->content[$question->id]),
                'explain' => Purifier::clean($request->explain[$question->id][0]),
                'correct_ans' => null
            ];
            $this->question->update($question->id, $data);
            $question = $this->question->find($question->id, ['answers']);

            // update all correct answers
            $this->question->updateCorrectAns($question, $request->correct_ans[$question->id]);

            $question->topics()->sync($topic->id);

            // Update all answers was be change
            $this->answer->updateAnswerChange($question, $request->answer[$question->id]);
        }
        Session::flash('success', __('translate.topic_updated'));

        return redirect()->route('create-topics.show', [$topic->category->slug, $topic->slug, $topic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topic = $this->topic->find($id, 'questions');
        foreach ($topic->questions as $question) {
            $answer = $this->answer->getData(['question'], ['question_id' => $question->id])->first();
            $this->answer->destroy($answer->id);
            $question->topics()->detach();
            $this->question->destroy($question->id);
        }
        $this->topic->destroy($id);

        Session::flash('success', __('translate.topic_deleted'));
        return redirect()->route('create-topics.index', Auth::id());
    }
}
