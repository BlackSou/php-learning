<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    include_once 'authorize.php';
    $db = include 'db.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME page</title>
</head>
<body style="background-color: #ced4da;">

<h1 style="color: #0b2e13"><?= ($_COOKIE['userName'] ?? 'Dear') . ','; ?></h1>
<h2 style="color: #0b2e13">Welcome HOME</h2>

<?php
    if (count($db['allowedUsers'])) {
        echo '<h3>Users in system</h3><br>';
    } else {
        echo '<h3>NO Users in system</h3><br>';
    }
    foreach ($db['allowedUsers'] as $key => $user) {
        echo "<p>user {$key}: {$user}</p>";
    }

?>


<a href="home-page.php?logout=1">logout</a>

<?php
    if (isset($_GET['logout']) || !isAuthorized($_SESSION)) {
        logout();
    }
?>

</body>
</html>