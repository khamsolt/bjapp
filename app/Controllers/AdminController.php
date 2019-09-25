<?php


namespace App\Controllers;


use App\Auth\Manager;
use App\Components\Session;
use App\Data\Url\Paginator;
use App\Services\Contracts\TaskServiceInterface;
use App\Validation\Pagination;
use App\Validation\Task;
use App\View\Manager as View;
use Exception;
use HttpInvalidParamException;
use Pecee\Http\Exceptions\MalformedUrlException;
use Pecee\SimpleRouter\SimpleRouter;

class AdminController extends Controller
{

    /** @var TaskServiceInterface */
    private $taskService;
    /** @var Paginator */
    private $urlPaginator;
    /** @var Pagination */
    private $paginatorValidation;
    /** @var Manager */
    private $authManager;
    /** @var Task */
    private $taskValidation;

    /**
     * HomeController constructor.
     * @param TaskServiceInterface $taskService
     * @param Task $taskValidation
     * @param Manager $authManager
     * @param Paginator $urlPaginator
     * @param Pagination $paginatorValidation
     */
    public function __construct(TaskServiceInterface $taskService, Task $taskValidation, Manager $authManager, Paginator $urlPaginator, Pagination $paginatorValidation)
    {
        $this->taskService = $taskService;
        $this->urlPaginator = $urlPaginator;
        $this->paginatorValidation = $paginatorValidation;
        $this->authManager = $authManager;
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
        return View::make('index', 'admin')
            ->with('data', $data)
            ->with('links', $links);
    }

    public function read(int $id)
    {
        $task = $this->taskService->find($id)->first();
        return View::make('read', 'admin')->with('task', $task);
    }

    public function update()
    {
        try {
            $data = $this->taskValidation->valid()->getData();
            if ($this->taskService->update($data)) {
                Session::withFlash('success', 'Задача успешно изменена!');
                SimpleRouter::response()->redirect('/admin');
                return SimpleRouter::response();
            } else {
                Session::withFlash('danger', 'Произошла не предвиденная ошибка, пожалуйста свяжитесь с администратором!');
            }
        } catch (HttpInvalidParamException $e) {
            Session::withFlash('warning', $e->getMessage());
        }
        SimpleRouter::response()->redirect(SimpleRouter::getUrl('read', ['id' => $data['id']]));
    }

    public function login()
    {
        return View::make('login', 'admin');
    }

    public function logout()
    {
        $this->authManager->logout();
        SimpleRouter::request()->setRewriteUrl('/');
    }

    public function auth()
    {
        try {
            if ($this->authManager->login()) {
                Session::withFlash('success', 'Добро пожаловать!');
                SimpleRouter::response()->redirect('/admin');
            } else {
                Session::withFlash('warning', 'Произошла не предвиденная ошибка, пожалуйства свяжитесь с администратором!');
            }
        } catch (Exception $e) {
            Session::withFlash('danger', $e->getMessage());
        }
        SimpleRouter::response()->redirect('/admin/login');
    }
}