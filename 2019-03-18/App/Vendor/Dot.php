<?php

namespace App\Vendor;

/**
 * Class Dot
 */
class Dot extends Unit
{
    use Trophy;

    protected const UNIT_POWER = 100;

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        echo self::class . ' does not have possibility to ' . $name;
    }

    /**
     * @return int
     */
    public function power(): int
    {
        return self::UNIT_POWER;
    }

    /**
     * @return int
     */
    public function health(): int
    {
        return self::UNIT_HEALTH;
    }

    /**
     * @return int
     */
    public function magic(): int
    {
        return self::UNIT_MAGIC;
    }
}
