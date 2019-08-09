<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include_once 'authorize.php';
    include_once 'content.php';
    include_once 'form-prepare.php';
    if (isAuthorized($_SESSION)) {
        login();
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
