<?php


namespace App\Middleware;


use App\Components\Session;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter;

class Guest implements IMiddleware
{
    /**
     * @param Request $request
     */
    public function handle(Request $request): void
    {
        if (Session::isAuthorized()) {
            SimpleRouter::response()->redirect('/admin');
        }
    }
}