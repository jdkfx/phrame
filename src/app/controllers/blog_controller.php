<?php

namespace controllers;

include __DIR__ . '/../models/blog.php';
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
        include __DIR__ . '/../views/create.php';
    }

    public function post($request)
    {
        $blog = new blog();

        $blog->title = $request['title'];
        $blog->messages = $request['messages'];

        return include __DIR__ . '/../views/confirm.php';
    }
}