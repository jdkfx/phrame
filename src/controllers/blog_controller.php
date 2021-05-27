<?php

namespace controllers;

include('./models/blog.php');
use models\blog as blog;

class Blog_controller
{
    public function __construct(){}

    public function index()
    {
        $blog = new blog();
        $response = $blog->index();

        if (!is_null($response)) {
            if(is_array($response)){
                extract($response);
            }
        }

        return $response;
    }

    public function create()
    {
        return "新しい記事を作成するページです。";
    }
}