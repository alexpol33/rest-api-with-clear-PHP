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

function addPost($connect, $data){
    $title = $data['title'];
    $body = $data['body'];

    mysqli_query($connect, "INSERT INTO `posts` (`id`, `title`, `body`) VALUES (NULL, '$title', '$body')");

    http_response_code(201);

    $res = [
        'status' => true,
        'post_id' => mysqli_insert_id($connect)
    ];

    echo json_encode($res);
}