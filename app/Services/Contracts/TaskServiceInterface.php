<?php


namespace App\Services\Contracts;


use App\Data\Structure\ModelCollection;
use App\Data\Url\Paginator;
use App\Models\Task;

/**
 * Interface TaskServiceInterface
 * @package App\Services\Contracts
 */
interface TaskServiceInterface
{
    public function findAll(int $currentPage): ModelCollection;

    public function withPaginationLinks(Paginator $paginator, int $currentPage): array;

    public function create(array $data): bool;

    public function update(array $data): bool;

    public function find(int $id): ModelCollection;
}