<?php
    include_once 'db.php';
    $rows = selectAllByTable('menu');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, thead, tr, th, td {
            border: 1px solid darkred;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <tr>
            <?php
                foreach ($rows[0] as $key => $value) {
                    echo "<th>{$key}</th>";
                }
            ?>
        </tr>
<?php

foreach ($rows as $row) {
    echo '<tr>';
        foreach ($row as $key => $value) {
            echo "<td>{$value}</td>";
        }
    echo '</tr>';
}

?>
</body>
</html>