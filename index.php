<?php

header('Content-type: json/application');
include 'vendor/connect.php';
include 'vendor/functions.php';

$type = $_GET['q'];

if ($type === 'posts'){
   getPosts($connect);
}

