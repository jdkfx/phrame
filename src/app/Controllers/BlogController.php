<?php

namespace App\Controllers;

use App\Models\Blog;
use App\Templates\View;

class BlogController
{
    public function __construct(){}

    public function index()
    {
        $blog = new Blog();
        $view = new View();

        $response = $blog->index();

        $view->pages('blog', $response);
    }

    public function create()
    {
        $view = new View();
        $view->pages('create');
    }

    public function post($request)
    {
        $blog = new Blog();
        $view = new View();

        $blog->title = $request['title'];
        $blog->messages = $request['messages'];

        $view->pages('confirm', $blog);
    }

    public function store($request)
    {
        $blog = new Blog();
        $view = new View();

        $blog->store($request);
    }
}