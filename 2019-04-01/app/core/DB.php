<?php

namespace app\core;

use PDO;

/**
 * Class DB
 */
class DB
{
    /**
     * @var PDO
     */
    private static $connection;

    /**
     * DB constructor.
     */
    private function __construct() {}

    /**
     * destruct
     */
    public function __destruct()
    {
        self::$connection = null;
    }

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        if (!self::$connection) {
            self::newConnection();
        }

        return self::$connection;
    }

    /**
     * newConnection
     */
    private static function newConnection(): void
    {
        self::$connection = new PDO(
            self::getConnectionString(),
            Config::get('db_user'),
            Config::get('db_pass')
        );
    }

    /**
     * @return string
     */
    private static function getConnectionString(): string
    {
        return 'mysql:dbname=' . Config::get('db_name') .
            ';host=' . Config::get('db_host');
    }
}
