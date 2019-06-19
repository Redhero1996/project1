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
}
