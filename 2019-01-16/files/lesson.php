<?php
//&lt;
/*$string = "<?php echo \"123\"; ?>";*/
//echo '<pre>';
//echo $string;
//echo '</pre>';
//var_dump(__METHOD__ );
//$arr = [
//    'London',
//    'is',
//    'the',
//    'capital',
//];
//$arr2 = [
//    'ivan',
//    '1' => 'sergey',
//    'dima' => 'Dima',
//    'dima1' => 'Dima',
//    'dima2' => 'dima',
//    'oleg',
//    'a' => 'max',
//    'AA' => 'sveta',
//    25,
//];
//$str = 'a:8:{i:0;s:4:"ivan";i:1;s:6:"sergey";s:4:"dima";s:4:"Dima";s:5:"dima1";s:4:"Dima";s:5:"dima2";s:4:"dima";i:2;s:4:"oleg";s:1:"a";s:3:"max";s:2:"AA";s:5:"sveta";}';
//var_dump($arr);
//var_dump(serialize($arr2));
//var_dump(unserialize($str));
//var_dump(count($arr2));
//$strstrstr = implode(' ', $arr);
//var_dump($strstrstr);
//var_dump(explode('i', $strstrstr));
//var_dump(array_keys($arr2));
//var_dump(array_values($arr2));
//var_dump(in_array('25', $arr2));


//$myAwesomeString = 'London is the capital of Great Britain';
//$myAwesomeString2 = 'Киев столица Украины';
//$needle = 'o';
//$dirtyString = '     Vasya   Ivanov        ';
//var_dump(strlen($myAwesomeString2));
//var_dump(mb_strlen($myAwesomeString2));
//if (false !== strpos($myAwesomeString, $needle)) {
//    echo 'true';
//} else {
//    echo 'false';
//}
//var_dump(strpos($myAwesomeString, $needle, 2));
//var_dump(trim($dirtyString));
//var_dump(str_replace($needle, '!', $myAwesomeString));


//$arr = [
//    'a',
//    'b',
//    'c',
//    'd',
//    'e',
//];

//$i = 0;
//do {
//    echo $arr[$i++] . '<br>';
//} while ($i < count($arr));
//
//while ($i < count($arr)) {
//    echo $arr[$i++] . '<br>';
//}

//$i = 0;
//while (true) {
//    echo $arr[$i++] . '<br>';
//    if ($i >2) {
//        break;
//    }
//}

//for ($i=0; $i < count($arr); $i++) {
//    var_dump($arr[$i]);
//}
//for ($i=count($arr); $i > 0; $i--) {
//    var_dump($arr[$i-1]);
//}
//foreach ($arr as $value) {
//foreach ($arr as $key => $value) {
////    $arr[$key] = $key;
//
//    if ($key === 1) {
//        continue;
//    }
////    if ($key === 2) {
////        unset($key);
////    }
////    $value = $key;
//    echo $value . '<br>';
//}
//var_dump($arr);

////switch-case
//$a = 5;
//$b = 15;
//$c = false;
//$d = 'str';
////switch (true) {
//switch ($a) {
//    case is_array($c) || $d === 'str':
//    case $b < 2:
//    case $a > 10:
//        echo 3;
//        break;
//    case $a === 4: {
//        echo 4;
//        break;
//    }
//    default:
//        echo 'default';
//}


////null-coalescent
//$a = 'some data';
//$b = null;
//var_dump($b ?? $a);
//var_dump($a ?? $b ?? $c ?? $d);
//if (is_null($b)) {
//    echo $a;
//} else {
//    echo $b;
//}


//Elvis
//$a = 'a';
//$b = '';
//<if is true> ?: <if is false>
//var_dump($a ?: $b);
//var_dump($b ?: $a ?: $c ?: $d);

//
//$a = 5;
//if ($a === 10) {
//    $b = '10';
//} else {
//    $b = 'not 10';
//}
//$c = ($a === 10)
//    ? '10'
//    : 'not 10';
//var_dump($b, $c);

//$a = 5;
//if ($a > 10) {
//    echo '10';
//} elseif ($a > 5) {
//    echo '5';
//} elseif ($a <= 4) {
//    echo '4';
//} else {
//    echo 'finish';
//}

//$shop = [
//    0 => [
//        'name' => 'BMW',
//        'price' => 50,
//        'comfort' => ['airconditioner', 'audio'],
//        'hasWarranty' => true,
//    ],
//    1 => [
//        'name' => 'Tavria',
//        'price' => 1,
//        'comfort' => [],
//        'hasWarranty' => false,
//    ],
//    2 => [
//        'name' => 'Ivan',
//        'price' => 5,
//        'comfort' => ['shanson'],
//        'hasWarranty' => true,
//    ],
//];
// $aza = 'Меня зовут Максим';
//var_dump($aza[2]);

//$arr = [
//    'ivan',
//    'sergey',
//    'dima',
//    'oleg',
//];
//$arr2 = [
//    'ivan',
//    '1' => 'sergey',
//    'dima' => 'Dima',
//    'dima1' => 'Dima',
//    'dima2' => 'dima',
//    'oleg',
//    'a' => 'max',
//    'a' => 'sveta',
//];
//$arr2['newName'] = 'Ariana';
////unset($arr2[2]);
//$arr2[] = 'Olesya';
//array_push($arr2, 'Svarog');
//
//$arr3 = array_values($arr2);
//$arr3 = array_unique($arr3);
//
//
//var_dump($arr3, $arr3[2] == $arr3[4]);

// <, >, <=, >=, !=, ==, !==, ===
//$int1 = 15;
//$int2 = 2;
//$string1 = '2.0';
//var_dump($string1 !== $int2);


//comment => ctrl+/
//$a = 'string1';
//$s = 's';
//$bool = false;
//$true = true;
//$false = false;
//// ! - отрицание
//// && - and
//// xor - только одно
//// || - or
//var_dump($true && $false);


//$str = <<<EOT
//strfgjklregkjleg
//sfdfljksfklj
//sdflkfjsdfklj
//EOT;
//echo '<pre>';
//print_r($str);
//echo '</pre>';


//$a = 'string1';
//$b = 'string2';
//echo $a . ' ' . $b . '<br>';
//$a .= $b;
//echo $a . '<br>';

//echo 2 ** 3 . '<br>';
//echo pow(2, 3);

//echo 123;


