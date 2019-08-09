<?php

$configs = require_once 'config.php';

$dsn = 'mysql:' .
    'host=' . $configs['db_host'] . ';' .
    'dbname=' . $configs['db_name'] . ';';
$db = new PDO(
    $dsn,
    $configs['db_user'],
    $configs['db_pass']
);

//$query = $db->query('SELECT * FROM `languages`');
//$languages = $query->fetchAll(PDO::FETCH_OBJ);

$param = $_GET['l'] ?? null;

$query = $db->prepare('
    SELECT id, language 
    FROM `languages` 
    WHERE 
        `language` > :language AND
        `id` < :id
');
$query->execute([
    'id' => 3,
    'language' => $param,
]);
$res=$query->fetchAll(PDO::FETCH_OBJ);
var_dump($res);

