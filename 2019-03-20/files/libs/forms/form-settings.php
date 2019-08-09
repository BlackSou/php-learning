<?php

define('ERROR_INPUT_NAME', 'error_input_');

$inputs = [
    [
        'type'        => 'text',
        'id'          => 'name',
        'name'        => 'name',
        'placeholder' => 'введите имя',
        'label'       => 'Логин',
        'value'       => null,
    ],
    [
        'type'        => 'password',
        'id'          => 'password',
        'name'        => 'password',
        'placeholder' => 'пароль тут вводить',
        'label'       => 'Пароль',
        'value'       => null,
    ],
    [
        'type'        => 'submit',
        'id'          => null,
        'name'        => null,
        'placeholder' => null,
        'label'       => null,
        'value'       => 'OK',
    ],
];

return [
    'action' => SERVER_PATH . 'libs/forms/form-process.php',
    'method' => 'post',
    'inputs' => $inputs,
];
