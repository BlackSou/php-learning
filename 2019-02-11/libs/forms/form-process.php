<?php

include_once  '../global.php';
include_once 'form-settings.php';

$allowedUsers = getDbParam(KEY_ALLOWED_USERS);

$formHasErrors = false;
$errors = [
    'name' => null,
    'password' => null,
];

$name = $_POST['name'];
$password = $_POST['password'];

if (empty($name)) {
    $formHasErrors = true;
    $errors['name'] = 'Имя обязательно к заполнению';
} elseif (!in_array($name, $allowedUsers, true)) {
    $formHasErrors = true;
    $errors['name'] = 'В доступе отказано';
}

if (empty($password)) {
    $formHasErrors = true;
    $errors['password'] = 'Пароль не указан';
} elseif ($password !== $name) {
    $formHasErrors = true;
    $errors['password'] = 'Неверный пароль';
}

if ($formHasErrors) {
    foreach ($errors as $key => $error) {
        setcookie(ERROR_INPUT_NAME . $key, $error, time() + 60);
    }
} else {
    setcookie('userName', $name, time() + 60 * 60 * 24 * 365);
    $_SESSION['Authorized'] = 'OK';
}

header('Location: ' . getDbParam(KEY_PATH_PROJECT));
