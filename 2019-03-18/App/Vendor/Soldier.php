<?php

namespace App\Vendor;

use App\Interfaces\WTF;

/**
 * Class Soldier
 */
class Soldier extends Unit implements WTF, Eatable
{
    protected const UNIT_POWER = 10;
    protected const UNIT_MAGIC = 10;

    private const SOLDIER_MORAL = 1;
    private const SOLDIER_MOVE  = 1;
    private const SOLDIER_SWIM  = 0.5;

    /**
     * @return int
     */
    public function power(): int
    {
        return self::UNIT_POWER * self::SOLDIER_MORAL;
    }

    /**
     * @return int
     */
    public function health(): int
    {
        return self::UNIT_HEALTH * self::SOLDIER_MORAL;
    }

    /**
     * @return int
     */
    public function magic(): int
    {
        return self::UNIT_MAGIC * self::SOLDIER_MORAL;
    }

    /**
     * @return int
     */
    public function move(): int
    {
        return self::SOLDIER_MOVE;
    }

    /**
     * @return float
     */
    final public function swim(): float
    {
        return self::SOLDIER_SWIM;
    }

    /**
     * @param string $food
     * @return bool
     */
    public function eat(string $food): bool
    {
        return strlen($food) > Eatable::MIN_EAT;
    }
}
