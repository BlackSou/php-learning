<?php

class Technology
{
    private const STATUS_ACTIVE     = 'active';
    private const STATUS_DEPRECATED = 'deprecated';

    private const IMPLEMENTATION_OPEN = 'open';
    private const IMPLEMENTATION_DONE = 'done';

    public static $version = '1.2.3';

    protected static $count = 0;

    protected $implementation;

    public $author = 'Some Guy';

    public function __construct()
    {
        $this->implementation = self::IMPLEMENTATION_DONE;
    }

    public static function getName(): string
    {
        return 'my awesome Technology';
    }

    public static function getCurrentTechnologyStatus(): string
    {
        // logging point

        return self::STATUS_DEPRECATED;
    }

    public function isImplemented(): bool
    {
        return $this->implementation === self::IMPLEMENTATION_DONE;
    }

    public static function getCounter()
    {
        return ++self::$count;
    }
//    public static function getCounter()
//    {
//        return [
//            'countTechnology' => ++self::$count,
//        ];
//    }
}

class Branch extends Technology
{
    protected static $countBranch = 0;

    public static function create()
    {
        return new self('Man Branch');
    }

    public function __construct($author)
    {
        parent::__construct();
        $this->author = $author;
    }

    public function __destruct()
    {
        // logging point
        echo PHP_EOL . __CLASS__ . ' was deleted' . PHP_EOL;
    }

//    public static function getCounter()
//    {
//        return array_merge(
//            parent::getCounter(),
//            ['countBranch' => ++self::$countBranch]
//        );
//    }
}

echo '<pre>';

//var_dump(new Branch('New Man'));
//var_dump(Branch::create());


//$view = new Technology();
//echo 'version: ' . $view->version . PHP_EOL . 'name: ' . $view->getName();
//$branch = new Branch();
//
//echo 'name: ' . Branch::getName() . PHP_EOL;
//echo 'author: ' . $branch->author . PHP_EOL;
//echo 'version: ' . Branch::$version . PHP_EOL;
//echo 'status: ' . Branch::getCurrentTechnologyStatus() . PHP_EOL;
//echo 'implementation status: ' . ($branch->isImplemented() ? 'Done' : 'Open');
//
//echo '<hr>';
//
print_r(Technology::getCounter());
print_r(Technology::getCounter());
print_r(Branch::getCounter());
print_r(Branch::getCounter());
//
//
//unset($branch);

echo '</pre>';

