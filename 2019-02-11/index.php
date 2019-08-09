<?php

include_once 'libs/global.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isAuthorized($_SESSION)) {
    login();
}

render('main', [
    'title'   => $title['index'],
    'content' => $greetings['index'] . '<br>' . form(),
]);
