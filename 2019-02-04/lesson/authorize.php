<?php

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
    header('Location: http://tayokin-max.loc/2019-02-04/home-page.php');
}

/**
 * logout
 */
function logout(): void
{
    $_SESSION['Authorized'] = '';
    header('Location: http://tayokin-max.loc/2019-02-04/');
}