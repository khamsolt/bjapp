<?php


namespace App\Repositories\Contracts;


use App\Data\Structure\ModelCollection;
use App\Models\User;

interface UserInterface
{
    public function all(array $columns = []): ModelCollection;

    public function latest(array $columns = []): ModelCollection;

    public function oldest(array $columns = []): ModelCollection;

    public function findById(int $id, array $columns = []): User;
}