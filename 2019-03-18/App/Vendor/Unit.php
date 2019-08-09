<?php

namespace App\Vendor;

/**
 * Class Unit
 */
abstract class Unit implements Healthable
{
    protected const UNIT_POWER  = 0;
    protected const UNIT_HEALTH = 100;
    protected const UNIT_MAGIC  = 0;

    /**
     * @return int
     */
    abstract public function power(): int;

    /**
     * @return int
     */
    abstract public function magic(): int;

    /**
     * @return string
     */
    public function unitName(): string
    {
        return static::class;
    }
}
