<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Repositories\Topic\TopicRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Answer\AnswerRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;
use Purifier;
use Session;

class QuestionController extends Controller
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
            'content',
        ];
        $questions = $this->question->getData(['topics'], [], $dataSelect);

        return view('admin.questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->getData([], [], ['id', 'name']);
        $topics = $this->topic->getData([], [], ['id', 'name', 'category_id']);

        return view('admin.questions.create', compact('categories', 'topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $data = [
            'content' => Purifier::clean($request->content),
            'explain' => Purifier::clean($request->explain),
        ];
        $question = $this->question->create($data);
        $question->topics()->sync($request->topic_id, false);

        $correct = $question->correct_ans;
        $all_correct = $request->correct_ans;
        foreach ($request->answer as $key => $content) {
            $data_ans = [
                'question_id' => $question->id,
                'content' => $content,
            ];
            $answer = $this->answer->create($data_ans);
            $answer->question()->associate($question->id);

            for ($i = 0; $i < count($all_correct); $i++) {
                if ($key == (int) $all_correct[$i]) {
                    $correct[$i] = $answer->id;
                    $question->correct_ans = $correct;
                }
                $question->save();
            }
        }
        Session::flash('success', __('translate.question_store'));

        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alphabet = alphabet();
        $with = [
            'topics',
            'topics.category',
            'answers'
        ];
        $question = $this->question->find($id,$with);

        return view('admin.questions.show', compact('alphabet', 'question'));
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
        $with = [
            'topics',
            'topics.category',
            'answers'
        ];
        $question = $this->question->find($id,$with);
        $categories = $this->category->getData();

        return view('admin.questions.edit', compact('alphabet', 'question', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        // Reset all correct answers
        $data = [
            'content' => Purifier::clean($request->content),
            'explain' => Purifier::clean($request->explain),
            'correct_ans' => null
        ];
        $this->question->update($id, $data);
        $question = $this->question->find($id, ['answers']);

        // update all correct answers
        $this->question->updateCorrectAns($question, $request->correct_ans);

        $question->topics()->sync($request->topic_id);

        // Update all answers was be change
        $this->answer->updateAnswerChange($question, $request->answer);

        Session::flash('success', __('translate.question_updated'));

        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->question->destroy($id);
        Session::flash('success', __('translate.question_deleted'));

        return redirect()->route('questions.index');
    }
}
