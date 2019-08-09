<?php

class Music
{
    public $volume11 = 101;
    protected $volume12 = 102;
    private $uuid = '550e8400-e29b-41d4-a716-446655440000';
    private $aa = '111';

    public function __clone()
    {
        $this->uuid = '550e8400-e29b-41d4-a716-4466554400s0';
    }
    public function __get($name)
    {
        return 'It is a hidden or not set property';
    }
    public function __call($method, $arguments)
    {
        // log
        return $method . ' is a deprecated method';
    }

}

class Rock extends Music
{
    public $volume21 = 201;
    protected $volume22 = 202;
    private $volume23 = 203;

    public function __sleep()
    {
        echo PHP_EOL . 'I\'m serialized' . PHP_EOL;

        return array_keys(get_object_vars($this));
    }

    public function __wakeup()
    {
        echo PHP_EOL . 'I\'m DE serialized' . PHP_EOL;
    }


}

echo '<pre>';

$obj1 = new Music();
$obj2 = clone $obj1;
$obj2->volume11 = 201;

echo PHP_EOL;
print_r($obj1->uuid);
echo PHP_EOL;
print_r($obj1->micha());
echo PHP_EOL;
//print_r($obj1->__get('aa'));
//print_r($obj2);

echo '</pre>';

