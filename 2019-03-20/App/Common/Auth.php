<?php

namespace App\Common;


class Auth
{
    private static $isAuthorized = false;

    public static function isLogged(): bool
    {
        if (isset($_SESSION['Authorized']) && $_SESSION['Authorized'] === 'OK') {
            self::$isAuthorized = true;
        }
        return self::$isAuthorized;
    }

    public static function login()
    {
        Router::setCurrent(Router::PAGE_HOME);
        self::$isAuthorized = true;
        $_SESSION['Authorized'] = 'OK';

    }

    public static function logout()
    {
        Router::setCurrent(Router::PAGE_INDEX);
        self::$isAuthorized = false;
        $_SESSION['Authorized'] = '';
    }
}