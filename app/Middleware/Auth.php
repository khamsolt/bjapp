<?php


namespace App\Middleware;


use App\Components\Session;
use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Auth implements IMiddleware
{

    /**
     * @param Request $request
     */
    public function handle(Request $request): void
    {
        if (!Session::isAuthorized()) {
            $request->setRewriteUrl('/admin/login');
        }
    }
}