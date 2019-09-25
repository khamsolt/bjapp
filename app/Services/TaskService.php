<?php


namespace App\Services;


use App\Data\Structure\ModelCollection;
use App\Data\Url\Paginator;
use App\Repositories\Contracts\TaskInterface;
use App\Services\Contracts\TaskServiceInterface;
use Pecee\Http\Exceptions\MalformedUrlException;

class TaskService implements TaskServiceInterface
{

    /** @var TaskInterface */
    private $taskRepository;

    /**
     * HomeController constructor.
     * @param TaskInterface $taskRepository
     */
    public function __construct(TaskInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * @param int $currentPage
     * @return ModelCollection
     */
    public function findAll(int $currentPage): ModelCollection
    {
        return $this->taskRepository->latest([], $currentPage);
    }


    /**
     * @param Paginator $paginator
     * @param int $currentPage
     * @return array
     * @throws MalformedUrlException
     */
    public function withPaginationLinks(Paginator $paginator, int $currentPage): array
    {
        return $paginator->generate($currentPage, $this->taskRepository->getDb()->totalPages, 'admin');
    }

    public function find(int $id): ModelCollection
    {
        return $this->taskRepository->findById($id);
    }

    public function create(array $data): bool
    {
        return $this->taskRepository->create($data);
    }

    public function update(array $data): bool
    {
        return $this->taskRepository->update($data);
    }
}