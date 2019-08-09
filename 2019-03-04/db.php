<?php


function getDb(): PDO
{
    $configs = include 'config.php';

    $dsn = 'mysql:' .
        'host=' . $configs['db_host'] . ';' .
        'dbname=' . $configs['db_name'] . ';';
    return new PDO(
        $dsn,
        $configs['db_user'],
        $configs['db_pass']
    );
}

function selectAllByTable(string $tbl): array
{
    $query = getDb()->query("SELECT * FROM {$tbl}");

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
