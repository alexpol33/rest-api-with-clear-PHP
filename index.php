<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Credentials: true');
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

}elseif ($method === 'PATCH'){

    if($type === 'posts'){
        if(isset($id)){
            $data = file_get_contents('php://input');
            $data = json_decode($data);
            updatePost($connect, $id, $data);
        }
    }
}elseif ($method === 'DELETE'){
    if($type === 'posts'){
        if(isset($id)){
            deletePost($connect, $id);
        }
    }
}



