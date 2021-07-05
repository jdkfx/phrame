<?php

require_once __DIR__ . "/../vendor/autoload.php";

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
    '/blog/store' => [
        'method'        => 'POST',
        'controller'    => 'BlogController',
        'action'        => 'store',
    ],
];

$router = new Router($pattern);
$router->response($_SERVER['REQUEST_URI']);
