<?php


namespace App\Repositories\Contracts;


use App\Data\Structure\ModelCollection;
use App\Models\Task;
use App\Models\User;

interface TaskInterface
{
    public function all(array $columns = [], int $page = 0): ModelCollection;

    public function latest(array $columns = [], int $page = 0): ModelCollection;

    public function oldest(array $columns = [], int $page = 0): ModelCollection;

    public function findById(int $id, array $columns = []): Task;

    public function create(array $data): Task;

    public function update(int $id, array $data): Task;
}