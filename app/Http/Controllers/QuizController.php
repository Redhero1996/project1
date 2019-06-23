<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Topic\TopicRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Question\QuestionRepositoryInterface;

class QuizController extends Controller
{
    protected $topic, $category, $question, $answer;

    public function __construct(
        TopicRepositoryInterface $topic,
        CategoryRepositoryInterface $category,
        QuestionRepositoryInterface $question
    ) {
        $this->topic = $topic;
        $this->category = $category;
        $this->question = $question;
    }

    public function category($category_id)
    {
        $topics = $this->topic->getData(['category', 'users', 'questions'], ['category_id' => $category_id]);
        foreach ($topics as $key => $topic) {
            $topics[$key]['count'] = count($topic->questions);
            foreach ($topic->users as $user) {
                if (Auth::check() && Auth::user()->id == $user->pivot->user_id) {
                    $topics[$key]['user'] = $user->pivot->user_id;
                }
            }
        }

        return response()->json([
            'topics' => $topics,
        ]);
    }

    public function quiz(Category $category, Topic $topic)
    {
        $alphabet = alphabet();
        $with = [
            'questions',
            'questions.answers'
        ];
        $questions = $this->topic->find($topic->id, $with)->questions;
        $data = [];
        foreach ($questions as $key => $question) {
            $data[$key] = [
                'question' => $question,
                'answers' => $question->answers,
            ];
        }

        return view('pages.quiz', compact('topic', 'data', 'alphabet'));
    }

    public function handleQuestion(Request $request)
    {
        $dataRequest = $request->dataRequest;
        $topic_id = $dataRequest[0]['topic'];
        $score = config('constants.zero');
        $total = config('constants.zero');
        $correct = [];
        $answered = [];
        foreach ($dataRequest as $key => $value) {
            $question = $this->question->findById($value['question_id']);
            if (isset($value['answered'])) {
                $value['answered'] = array_map(function ($elem) {
                    return intval($elem);
                }, $value['answered']);
                $answered[$key] = $value['answered'];
                if ((count($value['answered']) == count($question->correct_ans)) && !array_diff($value['answered'], $question->correct_ans)) {
                    $score++;
                    $total += config('constants.point');
                    $correct[] = [
                        'question_id' => $value['question_id'],
                        'answered' => $value['answered'],
                        'answer' => true,
                    ];
                } else {
                    $correct[] = [
                        'question_id' => $value['question_id'],
                        'answered' => $value['answered'],
                        'answer' => false,
                        'correct_ans' => $question->correct_ans,
                    ];
                }
            } else {
                $correct[] = [
                    'question_id' => $value['question_id'],
                    'answered' => config('constants.negative'),
                    'answer' => false,
                    'correct_ans' => $question->correct_ans,
                ];
            }
        }
        $answered = json_encode($answered);

        // Save total and user's answer
        Auth::user()->topics()->attach($topic_id, ['total' => $total, 'answered' => $answered]);

        // Data response
        $dataResponse = [
            'score' => $score,
            'total' => $total,
            'correct' => $correct,
        ];

        return $dataResponse;
    }

    public function reviewQuiz(Category $category, Topic $topic, $id)
    {
        $alphabet = alphabet();
        $with = [
            'questions',
            'questions.answers'
        ];
        $questions = $this->topic->find($topic->id, $with)->questions;
        $data = [];
        foreach ($topic->users as $key => $user) {
            $answered = json_decode($user->pivot->answered, true);
            if ($user->pivot->id == $id) {
                $data['total'] = $user->pivot->total;
                foreach ($questions as $key => $question) {
                    if (!empty($answered)) {
                        foreach ($answered as $k => $answer) {
                            if ($key == $k) {
                                $data['topic'][$key] = [
                                    'question' => $question,
                                    'answers' => $question->answers,
                                    'answered' => $answer,
                                ];
                                break;
                            } else {
                                $data['topic'][$key] = [
                                    'question' => $question,
                                    'answers' => $question->answers,
                                ];
                            }
                        }
                    } else {
                        $data['topic'][$key] = [
                            'question' => $question,
                            'answers' => $question->answers,
                        ];
                    }
                }
            }
        }

        return view('pages.review', compact('topic', 'data', 'alphabet'));
    }
}
