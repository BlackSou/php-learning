<?php

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
    'action' => 'form-process.php',
    'method' => 'post',
    'inputs' => $inputs,
];
