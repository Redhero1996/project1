<?php

namespace App\Repositories;

/**
 * Interface BaseRepositoryInterface
 *
 * @package App\Repositories
 */
interface RepositoryInterface
{
    public function findById($id);

    public function find($id, $with, $dataSelect = ['*']);

    public function all();

    public function getData();

    public function update($id, $data);

    public function destroy($id);

    public function create($data = []);

    public function slug($str);
}
