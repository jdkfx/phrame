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

if (file_exists('./models/' . $contents . '.php')) {
    include('./models/' . $contents . '.php');

    $className = "models\\" . $contents;
    $class = new $className();
    
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        $response = $class->index($contents);

        // var_dump($response);
        // exit;

        if (!is_null($response)) {
            if(is_array($response)){
               extract($response);
            }
        }
    }
}

if (file_exists('./views/' . $contents . '.php')) {
    include('./views/' . $contents . '.php');
} else {
    include('./views/error.php');
}

?>