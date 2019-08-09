<?php

namespace app\models;

/**
 * Class Post.
 *
 * @method $this find(int $id)
 * @method array|Post[] findAll()
 * @method array|Post[] findBy(array $params)
 * @method $this findOneBy(array $params)
 */
class Post extends Model
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $msg;

    /**
     * @var string
     */
    private $author;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    public static $tblName = 'posts';

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

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }

    /**
     * @param bool $isActive
     *
     * @return $this
     */
    public function setActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return array
     * @throws \Exception
     * @throws \ReflectionException
     */
    public static function getTodayPosts(): array
    {
        return self::getQueryBuilder()
            ->andWhere('created_at >= :created_at')
            ->addParam('created_at', (new \DateTime('today'))->format('Y-m-d H:i:s') )
            ->getQuery()
            ->getResult();
    }
}