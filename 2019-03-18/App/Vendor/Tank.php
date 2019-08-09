<?php

namespace App\Vendor;

/**
 * Class Tank
 */
class Tank extends Unit implements Moveable
{
    use Trophy;

    protected const UNIT_POWER = 100;

    private const TANK_MOVE = 5;

    /**
     * @var int
     */
    private $oil;

    /**
     * Tank constructor.
     * @param int $oil
     */
    public function __construct(int $oil)
    {
        $this->oil = $oil;
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

    /**
     * @return int
     */
    public function move(): int
    {
        if ($this->oil <= 0) {
            return 0;
        }

        $movement = ($this->oil >= self::TANK_MOVE)
            ? self::TANK_MOVE
            : $this->oil;

        $this->oil = ($this->oil >= self::TANK_MOVE)
            ? $this->oil - self::TANK_MOVE
            : 0;

        return $movement;
    }
}
