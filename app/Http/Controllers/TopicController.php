<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Http\Requests\TopicEditRequest;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Topic\TopicRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Answer\AnswerRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use App\Models\Category;
use App\Models\Topic;
use Session;
use Purifier;

class TopicController extends Controller
{
    protected $topic, $category, $question, $answer;

    public function __construct(
        TopicRepositoryInterface $topic,
        CategoryRepositoryInterface $category,
        QuestionRepositoryInterface $question,
        AnswerRepositoryInterface $answer
    ) {
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
    public function index()
    {
        $dataSelect = [
            'id',
            'name',
            'slug',
            'status',
        ];
        $topics = $this->topic->getData([], [], $dataSelect);

        return view('admin.topics.index')->withTopics($topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataSelect = [
            'id',
            'name',
        ];
        $categories = $this->category->getData([], [], $dataSelect);

        return view('admin.topics.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TopicRequest $request)
    {
        $data = $request->all();
        $data['slug'] = str_slug($request->name, '-');
        $this->topic->create($data);

        Session::flash('success', __('translate.topic_store'));

        return redirect()->route('topics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Topic $topic)
    {
        $alphabet = alphabet();
        $questions = $topic->questions()->get();

        return view('admin.topics.show', compact('category', 'topic', 'questions', 'alphabet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $alphabet = alphabet();
        $categories = $this->category->getData([], [], ['id', 'name']);
        $questions = $topic->questions()->get();

        return view('admin.topics.edit', compact('categories', 'topic', 'questions', 'alphabet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TopicEditRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = str_slug($request->name);
        $this->topic->update($id, $data);
        $topic = $this->topic->findById($id);

        $questions = $topic->questions()->get();
        foreach ($questions as $key => $question) {
            $data_question = [
                'content' => Purifier::clean($request->content[$question->id]),
                'correct_ans' => null,
                'explain' => Purifier::clean($request->explain[$question->id][0]),
            ];
            $correct = $data_question['correct_ans'];

            for ($i = 0; $i < count($request->correct_ans[$question->id]); $i++) {
                $correct[$i] = (int) $request->correct_ans[$question->id][$i];
                $data_question['correct_ans'] = $correct;
            }
            $this->question->update($question->id, $data_question);

            $question->topics()->sync($topic->id);

            // Update all answers was be change
            $answers = $this->answer->getData(['question'], ['question_id' => $question->id], ['*'], ['id', 'asc']);
            $all_ans = $request->answer[$question->id];
            for ($i = 0; $i < count($all_ans); $i++) {
                $answer = $this->answer->findById($answers[$i]->id);
                if ($all_ans[$i] != $answers[$i]->content) {
                    $data_ans = [
                        'content' => $all_ans[$i],
                        'question_id' => $question->id,
                    ];
                    $this->answer->update($answer->id, $data_ans);
                }
            }
        }
        Session::flash('success', __('translate.topic_updated'));

        return redirect()->route('topics.index');
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

        return redirect()->route('topics.index');
    }
}
