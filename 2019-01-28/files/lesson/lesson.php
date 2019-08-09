<?php

$arrOld = [
    ['amount'=>1, 'name'=>'product1'],
    ['amount'=>15, 'name'=>'product2'],
    ['amount'=>0, 'name'=>'product3'],
    ['amount'=>18, 'name'=>'product4'],
];
//
//$arrNew = [
//    ['amount'=>0, 'name'=>'product3'],
//    ['amount'=>1, 'name'=>'product1'],
//    ['amount'=>15, 'name'=>'product2'],
//    ['amount'=>18, 'name'=>'product4'],
//];

function awesomeSort($a, $b)
{
    return $a['amount'] <=> $b['amount'];
}

var_dump($arrOld);
//usort($arrOld, 'awesomeSort');
usort($arrOld, function ($a, $b) {
    return $a['amount'] <=> $b['amount'];
});
var_dump($arrOld);

//include 'include.php';
//include 'include.php';
//require 'include.php';
//$whatIsGoingOn = require 'include-alt.php';

//include 'include.php';
//include_once 'include.php';

//$product = 'Мобильный "Samsung"';
//$city = 'Киев';
//
//var_dump(sprintf($whatIsGoingOn['product'], $product, $city));


//var_dump($whatIsGoingOn, $awesomeVar);

//require_once 'include.php';
exit('stop');


//$fileName = __DIR__ . '/test-test.txt';
//$dataOld = file_get_contents($fileName);
//$data = <<<HEREDOC
//www -4
//www-5
//ww-6
//
//HEREDOC;
//file_put_contents($fileName, $dataOld . $data);


// ПОСТРОЧНОЕ СЧИТЫВАНИЕ
//if ($file = fopen($fileName, 'rb')) {
//    while(!feof($file)) {
//        $line = fgets($file);
//        # do same stuff with the $line
//        echo $line . '<br>';
//    }
//    fclose($file);
//}

//$file = file_get_contents($fileName);
//var_dump($file);

//$httpAddress = 'https://devionity.com';
//$file = file_get_contents($httpAddress);
//$site = explode("\n", $file);
//foreach ($site as $key => $value) {
//    if (strpos(strtolower($value), 'analytics') !== false) {
//        echo "string number {$key} <br>";
//    }
//}
//var_dump($site);

// r, r+, w, w+, a, a+
//$mode = 'r';
//$mode2 = 'a';
//// что такое BOM + кодировка UTF-8
//
//$file = fopen($fileName, $mode);
////flock($file, LOCK_EX);
////fwrite($file, "\nnew string");
//$context = fread($file, filesize($fileName));
//var_dump($context);
//fclose($file);



