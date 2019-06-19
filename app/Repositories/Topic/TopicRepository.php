<?php

namespace App\Repositories\Topic;

use App\Repositories\BaseRepository as BaseRepository;

/**
 *
 */
class TopicRepository extends BaseRepository implements TopicRepositoryInterface
{
    public function model()
    {
        return \App\Models\Topic::class;
    }
}
