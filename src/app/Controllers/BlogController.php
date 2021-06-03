<?php

namespace App\Controllers;

use App\Models\Blog;

class BlogController
{
    public function __construct(){}

    public function index()
    {
        $blog = new Blog();
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
        $blog = new Blog();

        $blog->title = $request['title'];
        $blog->messages = $request['messages'];

        return include __DIR__ . '/../views/confirm.php';
    }
}