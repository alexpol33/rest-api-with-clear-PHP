<?php

function getPosts($connect){
    $posts = mysqli_query($connect, 'select * from posts');

    $postsList = [];

    while ($row = mysqli_fetch_assoc($posts)){
        $postsList[] = $row;
    }

    echo json_encode($postsList);
}

function getPost($connect, $id){
    $post = mysqli_query($connect, "select * from posts where id = '$id'");
    if(mysqli_num_rows($post) < 1){
        http_response_code(404);
        $res = [
          'status' => false,
            'response' => 'post not found'
        ];
        echo json_encode($res);
    }else {
        $post = mysqli_fetch_assoc($post);
        echo json_encode($post);
    }
}