<?php

// phpinfo();
// exit;

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

if (file_exists( __DIR__ . '/../app/controllers/' . $fullpath[1] . '_controller.php')) {
    include __DIR__ . '/../app/controllers/' . $fullpath[1] . '_controller.php';

    $conName = "controllers\\" . $fullpath[1] . "_controller";
    $con = new $conName();
}


if (isset($fullpath[2])){ // 三項演算子とかでもいいけど、わかりやすさのため
    $conFunc = $fullpath[2];
} else {
    $conFunc = null; 
}

// var_dump($fullpath, $conFunc);
// exit;

try{
    if (method_exists($con, $conFunc)) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $response = $con->post($_POST); // ここ、conFuncつかわないのかな？
        } else {
            // var_dump($conFunc);
            // exit;
            $response = $con->$conFunc();
        }
    } else if (!is_null($conFunc)) {
        if (!file_exists( __DIR__ . "/../app/views/{$contents}.php")){
            throw new \Exception("error!"); 
        }
        // var_dump($conFunc);
        //     exit;
        $response = $con->index();
        include __DIR__ . "/../app/views/{$contents}.php";
    } else {
        throw new \Exception("error!"); 
    }
} catch(\Exception $e){
    error_log($e->getFile().$e->getLine().$e->getMessage());
    include __DIR__ . '/../app/views/error.php';
}