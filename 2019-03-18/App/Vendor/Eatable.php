<?php

namespace App\Vendor;

/**
 * Interface Eatable
 */
interface Eatable
{
    public const MIN_EAT = 3;

    /**
     * @param string $food
     *
     * @return bool
     */
    public function eat(string $food): bool;
}
