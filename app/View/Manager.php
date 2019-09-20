<?php


namespace App\View;


class Manager
{
    private $view = '';
    private $layout = 'app';
    private $path = ROOT . '/resource/views';

    public function __construct()
    {
    }

    public static function make(string $name)
    {
    }
}