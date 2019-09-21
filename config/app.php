<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\Route\Route;
use Pecee\SimpleRouter\Router;

include_once 'database.php';

$app = [
    MysqliDb::class => DI\factory(function ($connection) {
        return new MysqliDb($connection);
    })->parameter('connection', DI\get('database.connection')),
    Route::class => DI\create(Router::class),
    Request::class => DI\create(Request::class),
];

$app = array_merge($database, $app);