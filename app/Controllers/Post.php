<?php

namespace App\Controllers;

use App\Services\Router;

class Post
{
    public function save($data)
    {
        $data = array_chunk($data, 3);


        foreach ($data as $kay => $item) {
            $post = \R::dispense('posts');
            $post->title = $item[0];
            $post->body = $item[1];
            $post->button = $item[2];
            $post->id_user = $_SESSION['user']['id'];
            \R::store($post);
        }

        $_SESSION['success'] = 'Дані успішно збережені!!!';
        Router::redirect('/');

    }
}