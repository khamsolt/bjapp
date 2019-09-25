<?php


namespace App\Repositories\Contracts;


use App\Data\Structure\ModelCollection;

interface TaskInterface
{
    public function all(array $columns = [], int $page = 0): ModelCollection;

    public function latest(array $columns = [], int $page = 0): ModelCollection;

    public function oldest(array $columns = [], int $page = 0): ModelCollection;

    public function findById(int $id, array $columns = []): ModelCollection;

    public function create(array $data);

    public function update(array $data);
}