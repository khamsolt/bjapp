<?php


namespace App\Controllers;

use DI\Container;

/**
 * Class Controller
 * @package App\Controllers
 */
abstract class Controller
{
    /**
     * @return Container
     */
    protected function getDi(): Container
    {
        return $GLOBALS['container'];
    }
}