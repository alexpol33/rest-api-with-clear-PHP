<?php

header('Content-type: json/application');
include 'vendor/connect.php';
include 'vendor/functions.php';

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];


if ($type === 'posts'){
    if(isset($id)){
        getPost($connect, $id);
    }else {
        getPosts($connect);
    }
}

