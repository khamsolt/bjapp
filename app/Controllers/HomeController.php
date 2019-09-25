<?php


namespace App\Controllers;


use App\Components\Session;
use App\Data\Url\Paginator;
use App\Services\Contracts\TaskServiceInterface;
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
    /** @var TaskServiceInterface */
    private $taskService;
    /** @var Paginator */
    private $urlPaginator;
    /** @var Pagination */
    private $paginatorValidation;
    /** @var Task */
    private $taskValidation;

    /**
     * HomeController constructor.
     * @param TaskServiceInterface $taskService
     * @param Task $taskValidation
     * @param Paginator $urlPaginator
     * @param Pagination $paginatorValidation
     */
    public function __construct(TaskServiceInterface $taskService, Task $taskValidation, Paginator $urlPaginator, Pagination $paginatorValidation)
    {
        $this->taskService = $taskService;
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
        $data = $this->taskService->findAll($currentPage);
        $links = $this->taskService->withPaginationLinks($this->urlPaginator, $currentPage);
        return View::make('index', 'home')
            ->with('data', $data)
            ->with('links', $links);
    }

    public function store()
    {
        try {
            $data = $this->taskValidation->valid()->getData();
            if ($this->taskService->create($data)) {
                Session::withFlash('success', 'Задача успешно сохранена!');
            } else {
                Session::withFlash('danger', 'Произошла не предвиденная ошибка, пожалуйста свяжитесь с администратором!');
            }
        } catch (HttpInvalidParamException $e) {
            Session::withFlash('warning', $e->getMessage());
        }
        SimpleRouter::response()->redirect('/');
    }
}