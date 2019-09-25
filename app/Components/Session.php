<?php


namespace App\Components;

/**
 * Class Session
 * @package App\Components
 */
class Session
{
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

    /**
     * @return bool
     */
    public static function logout()
    {
        if (self::isAuthorized()) {
            unset($_SESSION['auth']);
        }
        return true;
    }

    /**
     * @return bool
     */
    public static function isAuthorized(): bool
    {
        return self::is('auth');
    }

    /**
     * @param string $key
     * @return bool
     */
    public static function is(string $key)
    {
        return isset($_SESSION[$key]);
    }

    /**
     * @param string $login
     * @return bool
     */
    public static function authorize(string $login)
    {
        if (!self::isAuthorized()) {
            self::add('auth', $login);
            return true;
        }
        return false;
    }

    /**
     * @param string $key
     * @param $value
     */
    public static function add(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @return string
     */
    public static function user(): string
    {
        return $_SESSION['auth'];
    }
}