<?php

namespace App\Repositories\Answer;

use App\Repositories\BaseRepository as BaseRepository;

/**
 *
 */
class AnswerRepository extends BaseRepository implements AnswerRepositoryInterface
{
    public function model()
    {
        return \App\Models\Answer::class;
    }

    public function updateAnswerChange($question, $req_ans)
    {
        $all_ans = $req_ans;
        for ($i = 0; $i < count($all_ans); $i++) {
            $answer = $this->findById($question->answers[$i]->id);
            if ($all_ans[$i] != $question->answers[$i]->content) {
                $answer->content = $all_ans[$i];
                $answer->save();
            }
        }
    }
}
