<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once 'authorize.php';
include_once 'db.php';
include_once 'live-journal.php';

if (isset($_GET['logout']) || !isAuthorized($_SESSION)) {
    logout();
}

$posts = getJournalPostsByUser($_COOKIE['userName']);
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME page</title>
    <style>
        table {
            border: 1px solid black;
            border-collapse: collapse;
        }
        td, th, tr {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body style="background-color: #ced4da;">

<h1 style="color: #0b2e13"><?= ($_COOKIE['userName'] ?? 'Dear') . ','; ?></h1>
<h2 style="color: #0b2e13">Welcome HOME</h2>
<hr>
<a href="home-page.php?logout=1">logout</a>
<hr>

<?php if (count($posts)) { ?>
    <h1>Записи журнала</h1>
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Дата</th>
            <th>Автор</th>
            <th>Тема</th>
            <th>Мысли</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($posts as $key => $post) {
            echo '<tr>';
            echo '<td>' . ($key+1) . '</td>';
            echo '<td>' . $post['date'] . '</td>';
            echo '<td>' . $post['author'] . '</td>';
            echo '<td>' . $post['subject'] . '</td>';
            echo '<td>' . $post['post'] . '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>

<?php } else { ?>
    <h1>НЕТ записей в журнале</h1>
<?php } ?>
<hr>
<h1>Создать запись в журнале</h1>
<form action="live-journal.php" method="post">
    <input type="hidden" name="author" value="<?= $_COOKIE['userName']; ?>">
    <label for="subject">Тема поста</label>
    <br>
    <input type="text" id="subject" name="subject" placeholder="subject here" required>
    <br>
    <textarea name="post" placeholder="Ваш пост тут" required></textarea>
    <br>
    <input type="submit" value="Опубликовать">
</form>

<hr>
<br><br><br><br><br><br><br><br>
<?php
if (count(getDbParam(KEY_ALLOWED_USERS))) {
    echo '<h3>Users in system</h3><br>';
} else {
    echo '<h3>NO Users in system</h3><br>';
}
foreach (getDbParam(KEY_ALLOWED_USERS) as $key => $user) {
    echo "<p>user {$key}: {$user}</p>";
}
?>


</body>
</html>