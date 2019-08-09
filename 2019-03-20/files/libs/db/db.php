<?php

const KEY_ALLOWED_USERS = 'allowedUsers';
const KEY_PATH_PROJECT  = 'pathProject';
const KEY_PATH_JOURNAL  = 'pathJournal';

/**
 * @param string $paramName
 *
 * @return mixed
 */
function getDbParam(string $paramName)
{
    global $db;

    if (array_key_exists($paramName, $db)) {
        return $db[$paramName];
    }

    return null;
}

$db = [
    KEY_ALLOWED_USERS => [
        'Taras',
        'Sveta',
        'Dima',
        'Artem',
    ],
    KEY_PATH_PROJECT => $_SERVER['REQUEST_SCHEME'] . '://' .
        substr(dirname(__DIR__, 2), strpos(dirname(__DIR__, 2), $_SERVER['SERVER_NAME'])) . DIRECTORY_SEPARATOR,
    KEY_PATH_JOURNAL => ROOT_PATH . '/files' . DIRECTORY_SEPARATOR . 'journal',
];
