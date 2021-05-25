<?php

$fullpath;

if (empty($_SERVER['PATH_INFO'])) {
    include('./views/index.php');
    exit;
} else {
    $fullpath = explode('/', $_SERVER['PATH_INFO']);
}

$contents;

foreach ($fullpath as $path) {
    if ($path !== "") {
        $contents = $path;
        break;
    }
}

$response;

if (file_exists('./controllers/' . $fullpath[1] . '_controller.php')) {
    include('./controllers/' . $fullpath[1] . '_controller.php');

    $conName = "controllers\\" . $fullpath[1] . "_controller";
    $con = new $conName();
    $response = $con->index();

    if (file_exists('./views/' . $contents . '.php')) {
        include('./views/' . $contents . '.php');
    }
} else {
    include('./views/error.php');
}

?>