<?php


namespace App\Components;

/**
 * Class Session
 * @package App\Components
 */
class Session
{
    /**
     * @param string $key
     * @param $value
     */
    public static function add(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $type
     * @param string $value
     */
    public static function withFlash(string $type, string $value)
    {
        $_SESSION['flash.alert'][] = [$type, $value];
    }

    /**
     * @return array
     */
    public static function getFlash(): array
    {
        if (isset($_SESSION['flash.alert']) && !empty($_SESSION['flash.alert'])) {
            $alerts = $_SESSION['flash.alert'];
            unset($_SESSION['flash.alert']);
            return $alerts;
        }
        return [];
    }
}