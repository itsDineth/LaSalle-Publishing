<?php
session_start();
include_once ('db.php');

$type = $_REQUEST['type'];

if (!empty($_FILES)) {

    $cover = $_FILES;
    $cover = json_encode($cover['file']['name']);
    $cover = str_replace('"', "", $cover);
    
    
    if ($type == 'cover') {
        $_SESSION['cover'] = $cover;
    } else if ($type == 'backdrop') {
        $_SESSION['backdrop'] = $cover;
    } else if ($type == 'ebook') {
        $_SESSION['ebook'] = $cover;
    } else if ($type == 'video') {
        $_SESSION['video'] = $cover;
    } else if ($type == 'zip') {
        $_SESSION['zip'] = $cover;
    }    
    

}
$target_dir = "../images/products/";

if ($type == 'cover') {
    $target_file = $target_dir . $_SESSION['cover'];
} else if ($type == 'backdrop') {
    $target_file = $target_dir . $_SESSION['backdrop'];
} else if ($type == 'ebook') {
    $target_file = $target_dir . $_SESSION['ebook'];
} else if ($type == 'video') {
    $target_file = $target_dir . $_SESSION['video'];
} else if ($type == 'zip') {
    $target_file = $target_dir . $_SESSION['zip'];
}




if ($cover)
    $_SESSION['tempname'] = $_FILES['file']['tmp_name'];
    $_SESSION['temp'] = $target_file;
print_r($_SESSION) ;

/*
if (copy($_FILES['file']['tmp_name'], $target_file)) {
    echo 1;
}
*/


if (copy($_FILES['file']['tmp_name'], $target_file)) {
    echo 1;
} else {
    echo 0;
}



