<?php

namespace App\Repositories\Question;

use App\Repositories\BaseRepository as BaseRepository;

/**
 *
 */
class QuestionRepository extends BaseRepository implements QuestionRepositoryInterface
{
    public function model()
    {
        return \App\Models\Question::class;
    }

    public function updateCorrectAns($question, $req_correctAns)
    {
        $correct = $question->correct_ans;
        for ($i = 0; $i < count($req_correctAns); $i++) {
            $correct[$i] = (int) $req_correctAns[$i];
            $question->correct_ans = $correct;
        }
        return $question->save();
    }
}
