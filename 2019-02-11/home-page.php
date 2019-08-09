<?php

include_once 'libs/global.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET['logout']) || !isAuthorized($_SESSION)) {
    logout();
}

function createTableWithJournalPosts(array $posts): string
{
    if (count($posts)) {
        $result = <<<'TABLE'
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
TABLE;

        foreach ($posts as $key => $post) {
            $result .= '<tr>';
            $result .='<td>' . ($key+1) . '</td>';
            $result .='<td>' . $post['date'] . '</td>';
            $result .='<td>' . $post['author'] . '</td>';
            $result .='<td>' . $post['subject'] . '</td>';
            $result .='<td>' . $post['post'] . '</td>';
            $result .='</tr>';
        }

        $result .= '</tbody></table>';
        return $result;
    }
    return '<h1>НЕТ записей в журнале</h1>';
}

function prepareContentForHomePage(array $posts, string $greeting): string
{
    $result = <<<START
<h1 class="greetings">{$greeting},</h1>
<h2 class="greetings">Welcome HOME</h2>
<hr>
<a href="home-page.php?logout=1">logout</a>
<hr>
START;
    $result .= createTableWithJournalPosts($posts);
    $result .= <<<EOHP
<hr>
<h1>Создать запись в журнале</h1>
<form action="libs/common/live-journal.php" method="post">
    <input type="hidden" name="author" value="{$greeting}">
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
EOHP;

    return $result;
}

$posts    = getJournalPostsByUser($_COOKIE['userName']);
$greeting = $_COOKIE['userName'] ?? $greetings['home-page'];
$content = prepareContentForHomePage($posts, $greeting);

if (count(getDbParam(KEY_ALLOWED_USERS))) {
    $content .= '<h3>Users in system</h3><br>';
} else {
    $content .= '<h3>NO Users in system</h3><br>';
}
foreach (getDbParam(KEY_ALLOWED_USERS) as $key => $user) {
    $content .= "<p>user {$key}: {$user}</p>";
}


render('main', [
    'title'   => $title['home-page'],
    'content' => $content,
]);

