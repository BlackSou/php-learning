<?php

namespace App\Vendor;

/**
 * Interface Healthable
 */
interface Healthable
{
    /**
     * @return int
     */
    public function health(): int;

    /**
     * @return string
     */
    public function unitName(): string;
}
