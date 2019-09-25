<?php


namespace App\Auth\Contracts;


interface AuthInterface
{
    public function login();

    public function logout();
}