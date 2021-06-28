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
];

$router = new Router($pattern);
$router->response($_SERVER['REQUEST_URI']);


// if ($_SERVER['REQUEST_URI'] == '/') {
//     $view = new View();
//     return $view->pages('index'); 
// } else {
//     $fullpath = explode('/', $_SERVER['REQUEST_URI']);
// }

// foreach ($fullpath as $path) {
//     if ($path !== "") {
//         $contents = $path;
//         break;
//     }
// }

// foreach 必要ではない

// クラスが存在するかで読み込みをしてあげる
try {
    $controllerName = "App\\Controllers\\" . ucfirst($fullpath[1]) . "Controller";
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
    } else {
        throw new \Exception("error!");
    }

    isset($fullpath[2]) ? $controllerFunc = $fullpath[2] : $controllerFunc = null;
    
    if (method_exists($controller, $controllerFunc)) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $response = $controller->post($_POST); // controllerFuncにすべきか
        } else {
            $response = $controller->$controllerFunc();
        }
    } else if (!is_null($controllerFunc)) {
        if (!file_exists( __DIR__ . "/../app/views/{$contents}.php")) {
            throw new \Exception("error!"); 
        }

        return $controller->index();
    } else {
        throw new \Exception("error!"); 
    }
} catch (\Exception $e) {
    error_log($e->getFile() . $e->getLine() . $e->getMessage());
    $view = new View();
    return $view->pages('error');
}