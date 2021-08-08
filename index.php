<?php

header('Content-type: json/application');
include 'vendor/connect.php';
include 'vendor/functions.php';

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
$id = $params[1];

$method = $_SERVER['REQUEST_METHOD'];


if($method === 'GET'){
    if ($type === 'posts'){
        if(isset($id)){
            getPost($connect, $id);
        }else {
            getPosts($connect);
        }
    }
}elseif ($method === 'POST'){
    addPost($connect, $_POST);
}



