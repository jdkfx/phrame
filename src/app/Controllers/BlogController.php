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

        // 配列ではなくインスタンス->プロパティで扱えるようにする
        // その前にDBにデータを保存させる動作をつけるほうがいいかもしれない
        if (!is_null($response)) {
            if(is_array($response)){
                extract($response);
            }
        }

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

        // 配列でしかデータが渡せない状態になっているのでそちらを修正してからにする
        var_dump(is_array($blog));
        exit;

        $view->pages('confirm', $blog);
    }
}