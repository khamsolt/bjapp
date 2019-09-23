<?php

use App\Repositories\Contracts\TaskInterface;
use App\Repositories\Contracts\UserInterface;
use App\Repositories\Task\MysqliDbRepository as TaskMysqliDbRepository;
use App\Repositories\User\MysqliDbRepository as UserMysqliDbRepository;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Router;

$app = [
    MysqliDb::class => DI\create(MysqliDb::class)->constructor('mysql', 'root', 'root', 'beejee', 3306, 'utf8'),
    UserInterface::class => DI\create(UserMysqliDbRepository::class)->constructor(DI\get(MysqliDb::class)),
    TaskInterface::class => DI\create(TaskMysqliDbRepository::class)->constructor(DI\get(MysqliDb::class)),
    'Route' => DI\create(Router::class),
    'Request' => DI\create(Request::class),
];