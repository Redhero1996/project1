<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Topic;
use Purifier;
use Session;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();

        return view('admin.questions.index', ['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $topics = Topic::all();

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
        $question = Question::create([
            'content' => Purifier::clean($request->content),
            'explain' => Purifier::clean($request->explain),
        ]);
        $question->topics()->sync($request->topic_id, false);
        $correct = $question->correct_ans;
        $all_correct = $request->correct_ans;
        foreach ($request->answer as $key => $content) {
            $answer = Answer::create([
                'question_id' => $question->id,
                'content' => $content,
            ]);
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
        $alphabet = [
            'A', 'B', 'C', 'D', 'E',
            'F', 'g', 'h', 'i', 'j',
            'k', 'l', 'm', 'n', 'o',
            'p', 'q', 'r', 's', 't',
            'u', 'v', 'w', 'x', 'y',
            'z',
        ];
        $question = Question::findOrFail($id);
        foreach ($question->topics as $topic) {
            $topic_name = $topic->name;
            $category = $topic->category->name;
            break;
        }
        $answers = Answer::where('question_id', $id)->get();

        return view('admin.questions.show', compact('alphabet', 'question', 'topic_name', 'category', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alphabet = [
            'A', 'B', 'C', 'D', 'E',
            'F', 'g', 'h', 'i', 'j',
            'k', 'l', 'm', 'n', 'o',
            'p', 'q', 'r', 's', 't',
            'u', 'v', 'w', 'x', 'y',
            'z',
        ];
        $question = Question::findOrFail($id);
        $categories = Category::all();
        $answers = Answer::where('question_id', $id)->get();
        foreach ($question->topics as $topic) {
            $topic_name = $topic->name;
            $category = $topic->category->id;
            break;
        }

        return view('admin.questions.edit', compact('alphabet', 'question', 'topic_name', 'category', 'answers', 'categories'));
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
        $question = Question::findOrFail($id);
        dd($question);
        $answers = Answer::where('question_id', $id)->get();
        // Reset all correct answers
        $question->correct_ans = null;
        $correct = $question->correct_ans;
        $question->content = Purifier::clean($request->content);
        $question->explain = Purifier::clean($request->explain);
        // update all correct answers
        for ($i = 0; $i < count($request->correct_ans); $i++) {
            $correct[$i] = (int) $request->correct_ans[$i];
            $question->correct_ans = $correct;
        }
        $question->save();
        $question->topics()->sync($request->topic_id);
        // Update all answers was be change
        $all_ans = $request->answer;
        for ($i = 0; $i < count($all_ans); $i++) {
            $answer = Answer::find($answers[$i]->id);
            if ($all_ans[$i] != $answers[$i]->content) {
                $answer->content = $all_ans[$i];
                $answer->save();
            }
        }
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
        $question = Question::findOrFail($id);
        $question->topics()->detach();
        $answers = Answer::where('question_id', $id)->delete();
        $question->delete();
        Session::flash('success', __('translate.question_deleted'));
        return redirect()->route('questions.index');
    }
}
