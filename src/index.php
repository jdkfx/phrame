<?php

if ($_SERVER['REQUEST_URI'] == '/') {
    include('./views/index.php');
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

if (file_exists('./controllers/' . $fullpath[1] . '_controller.php')) {
    include('./controllers/' . $fullpath[1] . '_controller.php');

    $conName = "controllers\\" . $fullpath[1] . "_controller";
    $con = new $conName();

    if (empty($fullpath[2])) {
        $response = $con->index();
        if (file_exists('./views/' . $contents . '.php')) {
            include('./views/' . $contents . '.php');
        }
    } else {
        $conFunc = $fullpath[2];
        if (method_exists($con, $conFunc)) {
            $response = $con->$conFunc();
            echo $response;
        } else {
            include('./views/error.php');
        }
    }
} else {
    include('./views/error.php');
}

?>