<?php

use App\Middleware\Auth;
use App\Middleware\Guest;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('\App\Controllers');

SimpleRouter::get('/', 'HomeController@index')->name('home');

SimpleRouter::post('/add', 'HomeController@store')->name('add');

SimpleRouter::get('/admin', 'AdminController@index', ['middleware' => Auth::class])->name('admin');

SimpleRouter::get('/admin/read/{id}', 'AdminController@read', ['middleware' => Auth::class])->where(['id' => '[0-9]+'])->name('read');

SimpleRouter::post('/admin/update', 'AdminController@update', ['middleware' => Auth::class])->name('update');

SimpleRouter::get('/admin/login', 'AdminController@login', ['middleware' => Guest::class])->name('login');

SimpleRouter::get('/admin/logout', 'AdminController@logout', ['middleware' => Auth::class])->name('logout');

SimpleRouter::post('/admin/auth', 'AdminController@auth', ['middleware' => Guest::class])->name('auth');

SimpleRouter::start();