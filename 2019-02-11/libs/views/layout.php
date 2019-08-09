<?php

include_once ROOT_PATH . '/libs/db/db.php';

const LAYOUT_EXTENSION = 'alp';

function render(string $layoutName = 'main', array $params = []): void
{
    $template = file_get_contents('layouts' . DIRECTORY_SEPARATOR . $layoutName . '.' . LAYOUT_EXTENSION .'.php');
    $params['pathToProject'] = getDbParam(KEY_PATH_PROJECT);
    ob_start(function ($buffer) use ($params) {
        $matches = [];
        preg_match_all('/[{]{2}(.*)[}]{2}/', $buffer, $matches);
        if (isset($matches[1]) && count($matches[1])) {
            foreach ($matches[1] as $match) {
                $param = substr(trim($match), 1);
                if (array_key_exists($param, $params)) {
                    $buffer = str_replace('{{$'.$param.'}}', $params[$param], $buffer);
                }
            }
        }

        return $buffer;
    });
    echo $template;
    ob_end_flush();
}

function render2(string $layoutName = 'main', array $params = []): void
{
    $pathToLayout = sprintf('layouts' . DIRECTORY_SEPARATOR . '%s.%s.php', $layoutName, LAYOUT_EXTENSION);

    $layout = file_get_contents($pathToLayout);

    foreach ($params as $paramKey => $param) {
        $layout = preg_replace(
            '/{{\$' . $paramKey . '}}/',
            $param,
            $layout
        );
    }

    echo $layout;
}
