<?php
$configs = include 'config.php';

$dsn = 'mysql:' . 'host=' . $configs['db_host'] . ';' . 'dbname=' . $configs['db_name'] . ';';
$pdo = new PDO($dsn, $configs['db_user'], $configs['db_pass']);

$query = $pdo->query('SELECT * FROM `test`');
$rows = $query->fetchAll(PDO::FETCH_ASSOC);
var_dump($rows);
echo '<hr>';

try {
    $pdo->beginTransaction();
    $query1 = $pdo->query('INSERT INTO test (`name`) VALUES ("qwe")');
    $query2 = $pdo->query('INSERT INTO test (`name`) VALUES ("asd")');
    $query3 = $pdo->query('INSERT INTO test (`name`) VALUES ("asa")');
    throw new Exception('try-catch example');
    $pdo->commit();
} catch (Throwable $e) {
    $pdo->rollBack();
    exit($e->getMessage());
}

$query = $pdo->query('SELECT * FROM `test`');
$rows = $query->fetchAll(PDO::FETCH_OBJ);
var_dump($rows);
echo '<hr>';