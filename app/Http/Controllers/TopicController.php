<?php

namespace App\Http\Controllers;

use App\Http\Requests\TopicRequest;
use App\Http\Requests\TopicEditRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Question;
use App\Models\Topic;
use App\Models\Answer;
use App\User;
use Session;
use Purifier;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        return view('admin.topics.index')->withTopics($topics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

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
        Topic::create([
            'name' => $request->name,
            'slug' => str_slug($request->name, '-'),
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'status' => $request->status,
        ]);
        Session::flash('success', 'The topic was successfully save!');
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
        $alphabet = [
            'A', 'B', 'C', 'D', 'E',
            'F', 'g', 'h', 'i', 'j',
            'k', 'l', 'm', 'n', 'o',
            'p', 'q', 'r', 's', 't',
            'u', 'v', 'w', 'x', 'y',
            'z',
        ];
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
        $alphabet = [
            'A', 'B', 'C', 'D', 'E',
            'F', 'g', 'h', 'i', 'j',
            'k', 'l', 'm', 'n', 'o',
            'p', 'q', 'r', 's', 't',
            'u', 'v', 'w', 'x', 'y',
            'z',
        ];
        $categories = Category::all();
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
        $topic = Topic::findOrFail($id);
        $topic->name = $request->name;
        $topic->slug = str_slug($request->name);
        $topic->category_id = $request->category_id;
        $topic->status = $request->status;
        $topic->save();          
        $questions = $topic->questions()->get();
        foreach ($questions as $key => $question) {
            $question->correct_ans = null;
            $correct = $question->correct_ans;
            $question->content = Purifier::clean($request->content[$question->id]);
            $question->explain = Purifier::clean($request->explain[$question->id][0]);
            for ($i = 0; $i < count($request->correct_ans[$question->id]); $i++) {
                $correct[$i] = (int) $request->correct_ans[$question->id][$i];
                $question->correct_ans = $correct;
            }
            $question->save();
            $question->topics()->sync($topic->id);
            // Update all answers was be change
            $answers = Answer::where('question_id', $question->id)->get();
            $all_ans = $request->answer[$question->id];
            for ($i = 0; $i < count($all_ans); $i++) {
                $answer = Answer::find($answers[$i]->id);
                if ($all_ans[$i] != $answers[$i]->content) {
                    $answer->content = $all_ans[$i];
                    $answer->save();
                }
            }
        }
        Session::flash('success', 'The topic was successfully updated!');

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
        $topic = Topic::findOrFail($id);
        $topic->questions()->detach();
        $topic->users()->detach();
        $topic->delete();
        Session::flash('success', 'The topic was successfully deleted!');

        return redirect()->route('topics.index');
    }
}
