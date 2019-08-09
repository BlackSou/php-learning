<?php

namespace App\Views;


class Render
{
    private const LAYOUT_EXTENSION = 'alp';

    public static function render(string $layoutName = 'main', array $params = []): void
    {
        $layout = file_get_contents(self::getTemplatePath($layoutName));

        foreach ($params as $paramKey => $param) {
            $layout = preg_replace(
                '/{{\$' . $paramKey . '}}/',
                $param,
                $layout
            );
        }

        echo $layout;
    }

    private static function getTemplatePath(string $layoutName): string
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Layouts' .
            DIRECTORY_SEPARATOR . $layoutName . '.' . self::LAYOUT_EXTENSION .'.php';
    }
}