<?php

namespace App\Controllers;

class Controller
{
    public function __construct(){}

    public function redirect($path)
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . $path);
        exit;
    }
}