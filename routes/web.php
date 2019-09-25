<?php

use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::get('/', 'HomeController@index')->name('home');

SimpleRouter::post('/add', 'TaskController@store')->name('add');

SimpleRouter::get('/admin', 'AdminController@index', []);

SimpleRouter::start();