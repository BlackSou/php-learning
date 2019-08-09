<?php

function render(string $layoutName = 'main', array $params = []): string
{
    return '';
}



?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
</head>
<body style="background-color: #ced4da">
<?php
echo $content;
echo form();
?>
</body>
</html>

