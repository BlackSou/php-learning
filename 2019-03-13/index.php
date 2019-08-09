<?php

class Car
{
    protected static $voice = 'bip-bip';

    public static function clackson(): string
    {
        return sprintf('"%s"', static::$voice);
    }
}

class Mustang extends Car
{

    public static function voice()
    {
        echo static::class . ' says ' . self::clackson();
    }
}

class Shelby extends Mustang
{
    protected static $voice = 'BRRRRR';

}

class Gt500 extends Mustang
{
    protected static $voice = 'grrr';
}

echo '<pre>';
//echo Car::clackson() . PHP_EOL;
//echo Mustang::clackson() . PHP_EOL;
//echo Shelby::clackson() . PHP_EOL;
//echo Car::clackson() . PHP_EOL;
echo Shelby::voice() . PHP_EOL;
echo Gt500::voice() . PHP_EOL;
echo '</pre>';
