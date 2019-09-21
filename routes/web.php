<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::get('/', 'HomeController@index', []);

SimpleRouter::get('/admin', 'AdminController@index', []);

SimpleRouter::start();