<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Routers\Router;
use App\Controllers\HomeController;
use App\Controllers\BlogController;

$pattern = [
    '/' => [
        'method'        => 'GET',
        'controller'    => HomeController::class,
        'action'        => 'index',
    ],
    '/blog' => [
        'method'        => 'GET',
        'controller'    => BlogController::class,
        'action'        => 'index',
    ],
    '/blog/create' => [
        'method'        => 'GET',
        'controller'    => BlogController::class,
        'action'        => 'create',
    ],
    '/blog/create/confirm' => [
        'method'        => 'POST',
        'controller'    => BlogController::class,
        'action'        => 'post',
    ],
    '/blog/store' => [
        'method'        => 'POST',
        'controller'    => BlogController::class,
        'action'        => 'store',
    ],
];

$router = new Router($pattern);
$router->response($_SERVER['REQUEST_URI']);
