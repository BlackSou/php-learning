<?php

namespace App\Common;


class Router
{
    public const PAGE_INDEX = 'index';
    public const PAGE_HOME  = 'home';
    public const PAGE_404   = 'notFound';

    private static $allowedUrls = [
        self::PAGE_INDEX,
        self::PAGE_HOME,
    ];

    private static $current = self::PAGE_INDEX;

    public static function action()
    {
        $className = '\App\Actions\\' . ucfirst(self::$current) . 'Action';
        (new $className)->index();
    }

    public static function setCurrent(string $current)
    {
        if (!in_array(strtolower($current), self::$allowedUrls)) {
            $current = self::PAGE_404;
        }

        self::$current = $current;
    }
}