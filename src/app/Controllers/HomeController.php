<?php

namespace App\Controllers;

use App\Templates\View;
use App\Controllers\Controller;

class HomeController
{
    public function __construct(){}

    public function index()
    {
        $view = new View();
        $view->pages('index');
    }
}