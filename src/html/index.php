<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Templates\View;
use App\Routers\Router;

$pattern = [
    '/' => [
        'method'        => 'GET',
        'controller'    => 'HomeController',
        'action'        => 'index',
    ],
    '/blog' => [
        'method'        => 'GET',
        'controller'    => 'BlogController',
        'action'        => 'index',
    ],
    '/blog/create' => [
        'method'        => 'GET',
        'controller'    => 'BlogController',
        'action'        => 'create',
    ],
    '/blog/create/confirm' => [
        'method'        => 'POST',
        'controller'    => 'BlogController',
        'action'        => 'post',
    ],
];

$router = new Router($pattern);
$router->response($_SERVER['REQUEST_URI']);
