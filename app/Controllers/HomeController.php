<?php


namespace App\Controllers;


use App\Data\Url\Paginator;
use App\Repositories\Contracts\TaskInterface;
use App\Repositories\Contracts\UserInterface;
use App\Validation\Pagination;
use App\View\Manager as View;
use Pecee\Http\Exceptions\MalformedUrlException;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends Controller
{
    /** @var UserInterface */
    private $userRepository;
    /** @var TaskInterface */
    private $taskRepository;
    /** @var Paginator */
    private $urlPaginator;
    /** @var Pagination */
    private $taskValidation;

    /**
     * HomeController constructor.
     * @param UserInterface $userRepository
     * @param TaskInterface $taskRepository
     * @param Paginator $urlPaginator
     * @param Pagination $taskValidation
     */
    public function __construct(UserInterface $userRepository, TaskInterface $taskRepository, Paginator $urlPaginator, Pagination $taskValidation)
    {
        $this->userRepository = $userRepository;
        $this->taskRepository = $taskRepository;
        $this->urlPaginator = $urlPaginator;
        $this->taskValidation = $taskValidation;
    }

    /**
     * @return View
     * @throws MalformedUrlException
     */
    public function index()
    {
        $currentPage = $this->taskValidation->getPage();
        $data = $this->taskRepository->all([], $currentPage);
        $db = $this->taskRepository->getDb();
        $links = $pagination = $this->urlPaginator->generate($currentPage, $db->totalPages);
        return View::make('index', 'home')
            ->with('data', $data)
            ->with('links', $links);
    }

    public function add()
    {
        
    }
}