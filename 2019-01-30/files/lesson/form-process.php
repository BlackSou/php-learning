<?php

$allowedUsers = [
    'Taras',
    'Sveta',
    'Dima',
    'Artem',
];

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
} elseif (!in_array($password, $allowedUsers, true)) {
    $formHasErrors = true;
    $errors['password'] = 'Неверный пароль';
}
//var_dump($formHasErrors, $errors);exit;
if ($formHasErrors) {
    if ($errors['name']) {
        setcookie('inputName', $errors['name'], time() + 60);
    }
    if ($errors['password']) {
        setcookie('inputPass', $errors['password'], time() + 60);
    }
} else {
    setcookie('success', 'Hello master', time() + 60);
}

header('Location: http://tayokin-max.loc/2019-01-30/');
