<?php

require_once 'autoload.php';

use App\Vendor\Soldier;
use App\Vendor\Sniper;
use App\Vendor\Tank;
use App\Vendor\Dot;
use App\Vendor\Fight;

echo '<pre>';

$soldier = new Soldier();
$sniper = new Sniper();
$tank = new Tank(15);
$dot = new Dot();

echo $tank->getOwner() . PHP_EOL;
$fight = Fight::fightWinner($tank, $sniper);
if ($fight === $sniper->unitName()) {
    $tank->setOwner($sniper->unitName());
}
echo sprintf(
        '%s VS %s, and wins: %s',
        $tank->unitName(),
        $sniper->unitName(),
        $fight
    ) . PHP_EOL;
echo $tank->getOwner() . PHP_EOL;


//echo sprintf(
//        '%s VS %s, and wins: %s',
//        $soldier->unitName(),
//        $sniper->unitName(),
//        Fight::fightWinner($soldier, $sniper)
//    ) . PHP_EOL;
//
//echo sprintf(
//        '%s VS %s, and wins: %s',
//        $tank->unitName(),
//        $sniper->unitName(),
//        Fight::fightWinner($tank, $sniper)
//    ) . PHP_EOL;

//echo sprintf('Unit: %s, move: %s', $soldier->unitName(), $soldier->move()) . PHP_EOL;
//echo sprintf('Unit: %s, move: %s', $sniper->unitName(), $sniper->move()) . PHP_EOL;
//echo sprintf('Unit: %s, move: %s', $tank->unitName(), $tank->move()) . PHP_EOL;
//echo sprintf('Unit: %s, move: %s', $dot->unitName(), $dot->move()) . PHP_EOL;

echo '</pre>';
