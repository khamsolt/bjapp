<?php


namespace App\Auth;


use App\Auth\Contracts\AuthInterface;
use App\Components\Session;
use Pecee\Http\Request;

class Manager implements AuthInterface
{
    /** @var Request */
    private $request;
    /** @var string */
    private $login = 'admin';
    /** @var string */
    private $password = '123';

    /**
     * Manager constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @throws \Exception
     */
    public function login()
    {
        $login = $this->request->getInputHandler()->post('login');
        $password = $this->request->getInputHandler()->post('password');
        if ($this->login == $login && $this->password == $password) {
            return Session::authorize($login);
        }
        throw new \Exception('Логин или пароль неверны!');
    }

    public function logout()
    {
        return Session::logout();
    }
}