<?php

namespace App\Controllers;

use App\Templates\View;

class HomeController
{
    public function __construct(){}

    public function index(): void
    {
        $view = new View();
        $view->pages('index');
    }
}