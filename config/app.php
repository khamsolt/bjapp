<?php

use App\Auth\Manager;
use App\Auth\Contracts\AuthInterface;
use App\Data\Url\Paginator;
use App\Repositories\Contracts\TaskInterface;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Task\MysqliDbRepository as TaskMysqliDbRepository;
use App\Repositories\User\MysqliDbRepository as UserMysqliDbRepository;
use App\Services\Contracts\TaskServiceInterface;
use App\Services\TaskService;
use App\Validation\Pagination;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Router;

$app = [
    MysqliDb::class              => DI\create(MysqliDb::class)->constructor('mysql', 'root', 'root', 'beejee', 3306, 'utf8'),
    UserInterface::class         => DI\create(UserMysqliDbRepository::class)->constructor(DI\get(MysqliDb::class)),
    TaskInterface::class         => DI\create(TaskMysqliDbRepository::class)->constructor(DI\get(MysqliDb::class)),
    Paginator::class             => DI\create(Paginator::class)->constructor(DI\get(Router::class)),
    Pagination::class            => DI\create(Pagination::class)->constructor(DI\get(Request::class)),
    TaskServiceInterface::class  => DI\create(TaskService::class)->constructor(DI\get(TaskInterface::class)),
    AuthInterface::class         => DI\create(Manager::class)->constructor(DI\get(Request::class))
];