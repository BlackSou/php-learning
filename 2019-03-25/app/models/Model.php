<?php

namespace app\models;


use app\core\DB;
use PDO;

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
     * @return PDO
     */
    public static function getConnection(): PDO
    {
         return DB::getConnection();
    }


    protected static function getAllBy(array $params): array
    {
        $stmt = self::getConnection();
        $sql = 'SELECT * FROM ' . static::$tblName;
        $whereClause = [];
        foreach ($params as $key => $param) {
            $whereClause[] = $key . ' = :' . $key;
        }
        if (count($whereClause) > 0) {
            $sql .= ' WHERE ' . implode(', ', $whereClause);
        }
        $stmt = $stmt->prepare($sql);

        if (count($whereClause) > 0) {
            foreach ($params as $key => $param) {
                $stmt->bindParam(':' . $key, $param);
            }
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
}