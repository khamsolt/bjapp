<?php


namespace App\Controllers;


use App\View\Manager as View;
use MysqliDb;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Router;

class HomeController
{
    private $database;
    private $router;
    private $request;

    public function __construct(MysqliDb $database, Router $router, Request $request)
    {
        $this->database = $database;
        $this->router = $router;
        $this->request = $request;
    }

    public function index()
    {
        $data = ['Magomed', 'Khamidov', 'Developer'];
        return View::make('index', 'home')->with('data', $data);
    }
}