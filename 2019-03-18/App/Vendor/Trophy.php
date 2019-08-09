<?php

namespace App\Vendor;

/**
 * Trait Trophy
 */
trait Trophy
{
    /**
     * @var
     */
    private $owner;

    /**
     * @return string
     */
    public function getOwner(): string
    {
        return $this->owner ?? (static::class . ' is not a Trophy');
    }

    /**
     * @param string $owner
     */
    public function setOwner(string $owner): void
    {
        $this->owner = $owner;
    }
}
