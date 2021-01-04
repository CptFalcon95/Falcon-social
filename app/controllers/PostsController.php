<?php

namespace App\Controllers;

use App\Core\{Response, Token, App};
use App\Models\{Post, Comment};

class PostsController
{
    public function index() {
        Response::json([
            "data" => (new Post())->getUserPosts(
                Token::getUserId()
            )
        ]);
    }

    public function store() {
        if(isset($_POST['content'])) {
            $post = new Post;
            $post->content = $_POST['content'];
            $post->user_id = Token::getUserId();
            if($post->save()) {
                Response::json([
                    "succes" => true
                ]);
            }
            Response::json([
                "succes" => false,
                "msg" => App::get('err_msgs')->post->failed
            ]);
        }
        Response::json([
            "succes" => false,
            "msg" => App::get('err_msgs')->post->failed
        ]);
    }

    public function comment() {
        $comment = new Comment;
        $comment->post_id = $_POST['post_id'];
        $comment->user_id = Token::getUserId();
        $comment->content = $_POST['content'];
    }
}