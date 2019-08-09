<?php

//
//static $a = 1;
//
//function foo($a) {
//
//    echo $a . '<br>';
//    $a++;
//}
//
//foo($a);
//foo($a);
//foo($a);


//
//$a = 'what the f*ck!!?';
//
//function foo() {
//
////    var_dump($GLOBALS['a']);
//    echo $GLOBALS['a']  . ' - from func <br>';
//    $GLOBALS['a'] = 13;
//}
//
//foo();
//echo $a;
//
//$a = 'what the f*ck?';
//
//function foo() {
//    global $a;
//
//    $a = 'somestr';
//
//    echo $a . ' - from func <br>';
//}
//
//foo();
//echo $a;

//$a = 'what the f*ck';
//
//function foo() {
//    echo func_get_arg(0) . ' - from func <br>';
//}
//
//foo($a);

//
//const MY_CONST = 'conssss';
//
//function foo() {
//    echo MY_CONST . ' - from func <br>';
//}
//
//foo();

//function foo(&$q) {
//    echo $q . ' - from func <br>';
//    $q = 'bar';
//}
//$q = 12;
//foo($q);
//echo $q . ' - from file <br>';


//
//function foo()
//{
//    $numargs = func_num_args();
//    echo "Number of arguments: $numargs \n";
//    if ($numargs >= 2) {
//        echo "Second argument is: " . func_get_arg(1) . "\n";
//    }
//    $arg_list = func_get_args();
//    for ($i = 0; $i < $numargs; $i++) {
//        echo "Argument $i is: " . $arg_list[$i] . "\n";
//    }
//}
//echo '<pre>';
//foo(1, 2, 3);
//echo '</pre>';

//числа Фибоначчи
//1, 1, 2, 3, 5, 8, 13, 21, 34, 55
//элемент 10 -> 55
// fib(1) = 1
// fib(2) = 1
// fib(3) = 2 = 1 + 1
// fib(4) = 3 = fib(3) + fib(2)
// fib(5) = 5
// fib(6) = 8
// fib(10) = 55
//fib(n) = fib(n-1) + fib(n-2)
//function fib(int $n): int
//{
//    if ($n === 1) {
//        return 1;
//    }
//    if ($n === 2) {
//        return 1;
//    }
//
//    return fib($n - 1) + fib($n - 2);
//}
//
//echo call_user_func('fib', 10, 1, 12, 14);
//var_dump(function_exists('fiBa'));
//echo call_user_func('fiBa', 22);
//$arr = [
//    'a' =>1,
//    'A' => 2
//];


//echo fib(1) . '<br>';
//echo fib(2) . '<br>';
//echo fib(3) . '<br>';
//echo fib(8) . '<br>';
//echo fib(9) . '<br>';
//echo fib(10) . '<br>';

////факториал от 1 = 1;
////факториал от 2 = 2;
////факториал от 3 = 6 = 3*2*1;
////факториал от n - это n*(n-1)*(n-2)*...*2*1;
////факториал от n - это (n) * факториал от (n-1);
//function factorial(int $n): int
//{
//    if ($n === 2) {
//        return 2;
//    }
//
//    return $n * factorial($n - 1);
//}
//echo factorial(6);

//function foo($bar) {
//    //    ...
//    foo(42);
//}

//
//$foo = function (string $bar) {
//    echo strlen($bar);
//};
//$foo('What is going here   ?');
//

//
//$a = array(1, 2, 3, 4, 5);
//$b = array_map(function ($n) {
//    return $n ** 2;
//}, $a);
//print_r($b);


//// dynamic function call from variable
//function simpleFunc($baz, $bar) { echo $baz+$bar . '<br>'; }
//$veryHardExplanation = 'simple';
//($veryHardExplanation . 'Func')(15, 12);


//
//function getNameAndSurnameFromString(string $fio): array
//{
//    return explode(' ', $fio);
//}
//
//[$name, $surname] = getNameAndSurnameFromString('Bill Gates AZA aaz');
////BAD: [$a, $b] = doJob('Bill Gates AZA aaz');
//$result = getNameAndSurnameFromString('Bill Gates AZA aaz');
//echo 'My name is ' . $name . ' and surname is ' . $surname;

//
//function echoSumOfRandomQuantityOfArguments(
//    string $a,
//    int ...$args
//): void {
//    echo $a . '<br>';
//    echo sprintf('Sum is = %s', array_sum($args));
////    var_dump($args);
////    echo sprintf('Sum is %s (from %s + %s)', $g + $z, $g, $z);
//}
//
//function echoSumOfArguments(int $g, int $z): void
//{
//    echo sprintf('Sum is %s (from %s + %s)', $g + $z, $g, $z);
//}
//
////echoSumOfArguments(15, random_int(floor(100.152), 200));
//echoSumOfRandomQuantityOfArguments(
//    'az',
//    15,
//    random_int(2, 200),
//    15,
//    random_int(2, 200),
//    1000
//);

//
///**
// * @throws Exception
// */
//function printRandomInt(): void
//{
//    print_r(random_int(155, 255));
//}
//
//printRandomInt();

//$arr = [
//    'John',
//    'Anna',
//    'Max',
//    'Dima',
//];
//array_unique($arr);
///**
// * @param array $arr
// * @param int|null $key
// * @param int $key2
// */
//function showArrayElement(array $arr, int $key, int $key2 = 1): void
//{
//    print_r($arr[$key]);
//    print_r($arr[$key2]);
//}
//showArrayElement($arr, 2);
//showArrayElement($arr, 1);
//showArrayElement($arr, 0);

//
//$a = 12;
//$b = 15;
//$c = -1;
//
//if ($a < $b) {
//    echo 'a lt b' . '<br>';
//} else {
//    echo 'a !lt b' . '<br>';
//}
//if ($b < $c) {
//    echo 'b lt c' . '<br>';
//} else {
//    echo 'b !lt c' . '<br>';
//}
//if ($c < $a) {
//    echo 'c lt a' . '<br>';
//} else {
//    echo 'c !lt a' . '<br>';
//}
//
///**
// * This function do some great job
// *
// * @param $x
// * @param int $y
// *
// * @return string|null
//// * @return array|string[]
// */
//function echoLessVariables($x, int $y): ?string
//{
//    if ($x === $y) {
//        return null;
//    }
//
//    $result = ($x < $y)
//        ? ($x . ' lt ' . $y . '<br>')
//        : ($x . ' !lt ' . $y . '<br>');
//
//    return $result;
//}
//




