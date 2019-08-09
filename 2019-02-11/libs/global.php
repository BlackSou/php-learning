<?php

define('ROOT_PATH', getRootPath());
define('SERVER_PATH', getServerPath());

include_once 'common/authorize.php';
include_once 'common/content.php';
include_once 'common/live-journal.php';
include_once 'db/db.php';
include_once 'forms/form-prepare.php';
include_once 'views/layout.php';

/**
 * @return string
 */
function getServerPath(): string
{
    return $_SERVER['REQUEST_SCHEME'] . ':' . DIRECTORY_SEPARATOR .  DIRECTORY_SEPARATOR .
        substr(dirname(__DIR__, 1), strpos(dirname(__DIR__, 1), $_SERVER['SERVER_NAME'])) .
        DIRECTORY_SEPARATOR;
}

/**
 * @return string
 */
function getRootPath(): string
{
    return dirname(__DIR__, 1);
}