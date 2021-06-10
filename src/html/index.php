<?php

require_once __DIR__ . "/../vendor/autoload.php";

if ($_SERVER['REQUEST_URI'] == '/') {
    include __DIR__ . '/../app/views/index.php';
    exit;
} else {
    $fullpath = explode('/', $_SERVER['REQUEST_URI']);
}

foreach ($fullpath as $path) {
    if ($path !== "") {
        $contents = $path;
        break;
    }
}

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

        // $response = $controller->index();
        // include __DIR__ . "/../app/views/{$contents}.php";
    } else {
        throw new \Exception("error!"); 
    }
} catch (\Exception $e) {
    error_log($e->getFile() . $e->getLine() . $e->getMessage());
    include __DIR__ . '/../app/views/error.php';
}