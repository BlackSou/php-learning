<?php

include_once 'db.php';

/**
 * @param string $user
 * @return array
 */
function getJournalPostsByUser(string $user): array
{
    $posts = getJournalPosts();

    $userPosts = [];

    foreach ($posts as $post) {
        if ($post['author'] === $user) {
            $userPosts[] = $post;
        }
    }

    return $userPosts;
}

/**
 * @return array
 */
function getJournalPosts(): array
{
    $posts = file_get_contents(getDbParam(KEY_PATH_JOURNAL));
    if (!strlen($posts)) {
        return [];
    }

    return unserialize($posts);
}

/**
 * @param string $date
 * @param string $author
 * @param string $subject
 * @param string $post
 */
function addPostToJournal(
    string $date,
    string $author,
    string $subject,
    string $post
): void {
    $posts = getJournalPosts();

    array_unshift($posts, [
        'date' => $date,
        'author' => $author,
        'subject' => $subject,
        'post' => $post,
    ]);

    $posts = serialize($posts);
    file_put_contents(getDbParam(KEY_PATH_JOURNAL), $posts);
}

if (isset($_POST['author'])) {
    addPostToJournal(
        date('Y-m-d H:i:s'),
        $_POST['author'],
        $_POST['subject'] ?? '',
        $_POST['post'] ?? ''
    );
    header('Location: ' . getDbParam(KEY_PATH_PROJECT) . 'home-page.php');
}