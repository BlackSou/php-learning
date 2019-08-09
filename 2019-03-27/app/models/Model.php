<?php

namespace app\models;

use app\core\QueryBuilder;

/**
 * Class Model
 */
class Model
{
    /**
     * @var string
     */
    public static $tblName;

    /**
     * @return QueryBuilder
     */
    protected static function getQueryBuilder(): QueryBuilder
    {
        return new QueryBuilder(static::$tblName, static::class);
    }

    /**
     * @param int $id
     * @return Model|null
     * @throws \ReflectionException
     */
    public static function find(int $id): ?self
    {
        $result = self::getQueryBuilder()
            ->andWhere('id = :id')
            ->addParam('id', $id)
            ->getQuery()
            ->getResult();

        return count($result) ? $result[0] : null;
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function findAll(): array
    {
        return self::getQueryBuilder()
            ->getQuery()
            ->getResult();
    }

    /**
     * @param array $params
     * @return Model|null
     * @throws \ReflectionException
     */
    public static function findOneBy(array $params): ?self
    {
        $result = self::findBy($params);

        return count($result) ? $result[0] : null;
    }

    /**
     * @param array $params
     * @return array
     * @throws \ReflectionException
     */
    public static function findBy(array $params): array
    {
        $qb = self::getQueryBuilder();
        foreach ($params as $key => $value) {
            $qb->andWhere($key . ' = :' . $key);
        }
        foreach ($params as $key => $value) {
            $qb->addParam($key, $value);
        }
        return $qb
            ->getQuery()
            ->getResult();
    }
}