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
    public function __construct()
    {
    }

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
        $settings = self::getSettings();

        self::$connection = new PDO(self::getConnectionString(), $settings['db_user'], $settings['db_pass']);
    }

    /**
     * @return string
     */
    private static function getConnectionString(): string
    {
        $settings = self::getSettings();

        return 'mysql:dbname=' . $settings['db_name'] . ';host=' . $settings['db_host'];
    }

    /**
     * @return array
     */
    private static function getSettings(): array
    {
        return require(dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'settings.php');
    }
}
