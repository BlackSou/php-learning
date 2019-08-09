<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'authorize.php';
include_once 'content.php';
include_once 'form-prepare.php';
if (isAuthorized($_SESSION)) {
    login();
}

echo render('main', [
    'title' => $title,
    'content' => [
        $content,
        form()
    ],
]);
