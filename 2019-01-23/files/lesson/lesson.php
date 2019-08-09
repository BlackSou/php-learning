<?php


//
///**
// * @param mixed $data
// * @param int $level
// */
//function myPrintR($data, int $level = 1): void
//{
//    switch (true) {
//        case is_null($data):
//            echo '';
//            break;
//        case is_bool($data):
//            echo $data ? '1' : '';
//            break;
//        case is_string($data):
//            echo $data;
//            break;
//        case is_int($data):
//            echo (string) $data;
//            break;
//        case is_float($data):
//            echo (string) $data;
//            break;
//        case is_array($data):
//            echo 'Array' . PHP_EOL;
//            addSpaces($level - 1);
//            echo '(' . PHP_EOL;
//            foreach ($data as $key => $value) {
//                addSpaces($level);
//                echo "[{$key}] => ";
//                myPrintR($value, $level + 2);
//                echo PHP_EOL;
//            }
//            addSpaces($level - 1);
//            echo ')' . PHP_EOL;
//            break;
//    }
//}
//
///**
// * @param int $level
// */
//function addSpaces(int $level): void
//{
//    for ($i=0; $i < $level; $i++) {
//        echo '    ';
//    }
//}
//
//$arr = [
//    'Max',
//    'Sveta',
//    'Oleg' => [
//        12,
//        true,
//        25 => 'tet',
//        'Oleg' => [
//            12,
//            true,
//            25 => 'tet',
//        ],
//    ],
//];
//print_r($arr);
//echo '<br>';
//myPrintR($arr);
//echo '<br>';
//echo '<br>';
//echo '<br>';
//echo '<br>';
//
//
//
//echo '<pre>';
//print_r('start');
//print_r($arr);
//print_r('finish');
//echo '</pre>';
//
//
//echo '<pre>';
//print_r('start myPrintR');
//myPrintR($arr);
//print_r('finish myPrintR');
//echo '</pre>';


// $GLOBALS
//$_GET, $_POST, $_SERVER, $_SESSION


//$myString = 'London';
//
//function echoString(): void
//{
//     global $myString;
//    $GLOBALS['myString'] = 'Kiev';
//}
//
//echoString();
//echo $myString;

//
//define('MY_CONST', 12);
//$var = 12;
//
//function printConst(&$var)
//{
//    ++$var;
//    print_r($var);
//    echo '<br>';
//}
//
//print_r($var);
//    echo '<br>';
//printConst($var);
//print_r($var);
//    echo '<br>';
//printConst($var);
//print_r($var);
//    echo '<br>';
//printConst($var);



//$myFunc = function ($var, $getCounter = false) {
//    static $cnt = 1;
//    if ($getCounter) {
//        echo 'Function was used ' . ($cnt - 1) . ' times';
//    } else {
//        // some business
//        $a = $var % $cnt;
//        $cnt++;
//    }
//};
//
//$times = mt_rand(15, 25);
//for ($i = 1; $i <= $times; $i++) {
//    $myFunc(mt_rand(1, $times));
//}
//
//$myFunc(15, true);

//
//
//
//function iCanSeeNotStatic(): void
//{
//    $var = 2;
//    $var++;
//    echo 'File: ' . $var . '<br>';
//}
//function iCanSeeStatic(): void
//{
//    static $var = null;
//    if (is_null($var)) {
//        $var = 2;
//    }
//    $var++;
//    echo 'File stat: ' . $var . '<br>';
//}
//
//iCanSeeNotStatic();
//iCanSeeStatic();
//iCanSeeNotStatic();
//iCanSeeStatic();
//iCanSeeNotStatic();
//iCanSeeStatic();
//iCanSeeNotStatic();
//iCanSeeStatic();
//iCanSeeNotStatic();
//iCanSeeStatic();
//
//echo '--'.$var;


///**
// * @param int $var
// */
//function iCanSee(int $var): void
//{
//    echo 'FUNC: ' . ++$var . '<br>';
//}
//
//$var = 5;
//echo 'FILE 1: ' . $var . '<br>';
//iCanSee($var);
//echo 'FILE 2: ' . $var . '<br>';


