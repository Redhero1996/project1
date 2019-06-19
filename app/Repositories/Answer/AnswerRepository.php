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
}
