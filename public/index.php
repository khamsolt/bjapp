<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../config/app.php';

define('ROOT', dirname(__DIR__));

error_reporting(E_ALL);

ini_set("display_errors", 1);

session_start();

$builder = new DI\ContainerBuilder();

$builder->useAutowiring(true);

$builder->useAnnotations(false);

$builder->addDefinitions($app);

$container = $builder->build();

Pecee\SimpleRouter\SimpleRouter::enableDependencyInjection($container);

$container->set(Pecee\SimpleRouter\Router::class, Pecee\SimpleRouter\SimpleRouter::router());

$container->set(Pecee\Http\Response::class, Pecee\SimpleRouter\SimpleRouter::request());

$container->set(Pecee\Http\Response::class, Pecee\SimpleRouter\SimpleRouter::response());

require_once __DIR__ . '/../routes/web.php';