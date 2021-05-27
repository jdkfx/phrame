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
    $response = $con->index();

    if (file_exists('./views/' . $contents . '.php')) {
        include('./views/' . $contents . '.php');
    }
} else {
    include('./views/error.php');
}

?>