<?php

spl_autoload_register(function ($class_name) {
    include dirname(__DIR__) . DIRECTORY_SEPARATOR .
        str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
});
