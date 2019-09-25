<?php


namespace App\Controllers;


use App\Components\Session;
use App\Data\Url\Paginator;
use App\Repositories\Contracts\TaskInterface;
use App\Validation\Pagination;
use App\Validation\Task;
use App\View\Manager as View;
use HttpInvalidParamException;
use Pecee\Http\Exceptions\MalformedUrlException;
use Pecee\SimpleRouter\SimpleRouter;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{
    /** @var TaskInterface */
    private $taskRepository;
    /** @var Paginator */
    private $urlPaginator;
    /** @var Pagination */
    private $paginatorValidation;
    /** @var Task */
    private $taskValidation;

    /**
     * HomeController constructor.
     * @param TaskInterface $taskRepository
     * @param Task $taskValidation
     * @param Paginator $urlPaginator
     * @param Pagination $paginatorValidation
     */
    public function __construct(TaskInterface $taskRepository, Task $taskValidation, Paginator $urlPaginator, Pagination $paginatorValidation)
    {
        $this->taskRepository = $taskRepository;
        $this->urlPaginator = $urlPaginator;
        $this->paginatorValidation = $paginatorValidation;
        $this->taskValidation = $taskValidation;
    }

    /**
     * @return View
     * @throws MalformedUrlException
     */
    public function index()
    {
        $currentPage = $this->paginatorValidation->getPage();
        $data = $this->taskRepository->latest([], $currentPage);
        $db = $this->taskRepository->getDb();
        $links = $pagination = $this->urlPaginator->generate($currentPage, $db->totalPages);
        return View::make('index', 'home')
            ->with('data', $data)
            ->with('links', $links);
    }

    public function store()
    {
        try {
            $data = $this->taskValidation->valid()->getData();
            $this->taskRepository->create($data);
            Session::withFlash('success', 'Задача успешно сохранена!');
        } catch (HttpInvalidParamException $e) {
            Session::withFlash('warning', $e->getMessage());
        }
        SimpleRouter::response()->redirect('/');
    }
}