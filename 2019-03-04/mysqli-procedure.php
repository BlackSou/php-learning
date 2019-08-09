<?php

$configs = require_once 'config.php';

$dbConnection = mysqli_connect(
    $configs['db_host'],
    $configs['db_user'],
    $configs['db_pass'],
    $configs['db_name'],
    $configs['db_port']
);

$param = $_GET['l'] ?? null;

//$query = mysqli_query(
//    $dbConnection,
//    'SELECT * FROM `languages`'
//);

//$languages = mysqli_fetch_all(
//    $query,
//    MYSQLI_BOTH
//);
$stmt = mysqli_prepare(
    $dbConnection,
    'SELECT id, language FROM `languages` WHERE `language` > ?'
);
$param = mysqli_real_escape_string($stmt, $param);
mysqli_stmt_bind_param($stmt, 's', $param);

/* execute prepared statement */
mysqli_stmt_execute($stmt);

/* bind result variables */
mysqli_stmt_bind_result($stmt, $id, $language);

/* fetch values */
while (mysqli_stmt_fetch($stmt)) {
    printf ("%s (%s)\n", $id, $language);
}

/* close statement */
mysqli_stmt_close($stmt);


//var_dump($stmt);

