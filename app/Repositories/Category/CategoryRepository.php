<?php

namespace App\Repositories\Category;

use App\Repositories\BaseRepository as BaseRepository;

/**
 *
 */
class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function model()
    {
        return \App\Models\Category::class;
    }
}
