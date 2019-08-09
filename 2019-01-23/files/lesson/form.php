<?php
$uploaddir = __DIR__;

$myFormValues = $_POST;

// password was set
if (!isset($myFormValues['secret'])) {
    echo '<div style="color: red;">password is required</div>';
    die;
//    die('kill the script');
}
// length of password
if (strlen($myFormValues['secret']) < 6) {
    echo '<div style="color: green;">password is short</div>';
}

if ($_FILES['uploadImage']['type'] !== 'image/jpeg') {
    echo '<div style="color: red;">uploadImage wrong mime-type</div>';
} else {
    $uploadfile = $uploaddir . '/test.jpg';
    if (move_uploaded_file($_FILES['uploadImage']['tmp_name'], $uploadfile)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }

}
if ($_FILES['uploadImage2']['type'] !== 'image/jpeg') {
    echo '<div style="color: red;">uploadImage2 wrong mime-type</div>';
}

//

//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
//
//echo '<pre>';
//if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
//    echo "Файл корректен и был успешно загружен.\n";
//} else {
//    echo "Возможная атака с помощью файловой загрузки!\n";
//}
//
//echo 'Некоторая отладочная информация:';
//print_r($_FILES);
//
//print "</pre>";



var_dump($_FILES);


