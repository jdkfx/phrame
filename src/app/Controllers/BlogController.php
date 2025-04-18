<?php

namespace App\Controllers;

use App\Models\Blog;
use App\Templates\View;
use App\Middlewares\CsrfToken;

class BlogController extends Controller
{
    public function index(): void
    {
        $blog = new Blog();
        $view = new View();

        $response = $blog->index();

        $view->pages('blog', $response);
    }

    public function create(): void
    {
        $view = new View();
        $view->pages('create');
    }

    public function post($request): void
    {
        $blog = new Blog();
        $view = new View();

        if (empty($request['title']) || empty($request['messages'])) {
            parent::redirect('blog/create');
        }

        if (mb_strlen($request['title']) > 20 || mb_strlen($request['messages']) > 50) {
            parent::redirect('blog/create');
        }

        $blog->title = $request['title'];
        $blog->messages = $request['messages'];

        $view->pages('confirm', $blog);
    }

    public function store($request): void
    {
        $blog = new Blog();
        $view = new View();
        $validate = new parent(new CsrfToken());

        $validate->tokenValidate($request['token']);

        $blog->store($request);

        $view->pages('store');
    }
}