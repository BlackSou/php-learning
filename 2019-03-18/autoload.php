<?php

/**
 * @param string $class_name
 */
function __autoload(string  $class_name) {
    require_once
        __DIR__ . '/' .
        str_replace('\\', '/', $class_name) .
        '.php';
}
