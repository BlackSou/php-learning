<?php

namespace app\core;

/**
 * Class Config
 */
class Config
{
    /**
     * @var $this
     */
    private static $instance;

    /**
     * @var array
     */
    private $configs = [];

    /**
     * @param string $key
     * @param mixed $default
     *
     * @return mixed
     */
    public static function get(string $key, $default = null)
    {
        return self::getInstance()->_get($key, $default);
    }

    public static function getAll()
    {
        return self::getInstance()->configs;
    }

    /**
     * Config constructor.
     */
    private function __construct() {}

    /**
     * @return Config
     */
    private static function newInstance(): self
    {
        $instance = new self();
        $configs = require_once self::getSettingsPath();
        $instance->configs = self::setParams([], $configs);

        return $instance;
    }

    /**
     * @param $configs
     * @param $params
     *
     * @return array
     */
    private static function setParams($configs, $params): array
    {
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $configs[$key] = self::setParams($configs[$key], $value);
            } else {
                $configs[$key] = $value;
            }
        }

        return $configs;
    }

    /**
     * @return Config
     */
    private static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = self::newInstance();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    private static function getSettingsPath(): string
    {
        return dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config.php';
    }

    /**
     * @param string $key
     * @param $default
     * @return mixed
     */
    private function _get(string $key, $default)
    {
        return array_key_exists($key, $this->configs)
            ? $this->configs[$key]
            : $default;
    }
}
