<?php

include_once ROOT_PATH . '/libs/db/db.php';

/**
 * isAuthorized
 *
 * @param array $session
 * @return bool
 */
function isAuthorized(array $session): bool
{
    if (!isset($session['Authorized'])) {
        return false;
    }
    if ($session['Authorized'] !== 'OK') {
        return false;
    }

    return true;
}


/**
 * login
 */
function login(): void
{
    header('Location: ' . getDbParam(KEY_PATH_PROJECT) . 'home-page.php');
}

/**
 * logout
 */
function logout(): void
{
    $_SESSION['Authorized'] = '';
    header('Location:' . getDbParam(KEY_PATH_PROJECT), false, 401);
}