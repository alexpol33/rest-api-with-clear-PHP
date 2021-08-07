<?php

function getPosts($connect){
    $posts = mysqli_query($connect, 'select * from posts');

    $postsList = [];

    while ($row = mysqli_fetch_assoc($posts)){
        $postsList[] = $row;
    }

    echo json_encode($postsList);
}