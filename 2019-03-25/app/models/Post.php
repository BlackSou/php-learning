<?php

namespace app\models;

use PDO;

class Post extends Model
{
    private $id;
    private $msg;
    private $author;

    public static $tblName = 'posts';

    public static function getData(): array
    {
        $posts = self::getByAuthor('dima');

        /** @var Post $post */
        foreach ($posts as $post) {
            echo $post->author . ' says ' . $post->msg . '; ';
        }

        exit;
        return [
            ['id'=>1, 'post'=>'msg 1'],
            ['id'=>2, 'post'=>'msg 2'],
        ];
    }

    /**
     * @param string $author
     *
     * @return array|Post[]
     */
    public static function getByAuthor(string $author): array
    {
        return self::getAllBy(['author' => $author]);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @param string $msg
     *
     * @return $this
     */
    public function setMsg(string $msg): self
    {
        $this->msg = $msg;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return $this
     */
    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }
}