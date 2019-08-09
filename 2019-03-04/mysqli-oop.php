<?php

$configs = require_once 'config.php';

$db = new mysqli(
    $configs['db_host'],
    $configs['db_user'],
    $configs['db_pass'],
    $configs['db_name'],
    $configs['db_port']
);

//$query = $db->query('SELECT * FROM `languages`');
//$languages = $query->fetch_all(MYSQLI_ASSOC);

$param = $_GET['l'] ?? null;

$stmt = $db->prepare('SELECT id, language FROM `languages` WHERE `language` > ?');

$stmt->bind_param('s', $param);

/* execute prepared statement */
$stmt->execute();

/* bind result variables */
$stmt->bind_result($id, $language);

/* fetch values */
while ($stmt->fetch()) {
    printf ("%s (%s)\n", $id, $language);
}

/* close statement */
$stmt->close();


//var_dump($stmt);

