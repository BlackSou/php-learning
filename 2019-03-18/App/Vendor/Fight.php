<?php

namespace App\Vendor;

/**
 * Class Fight
 */
class Fight
{
    /**
     * @param Healthable $obj1
     * @param Healthable $obj2
     *
     * @return string
     *
     * @throws \Exception
     */
    public static function fightWinner(Healthable $obj1, Healthable $obj2): string
    {
        return random_int(0, 1)
            ? $obj1->unitName()
            : $obj2->unitName();
    }
}
