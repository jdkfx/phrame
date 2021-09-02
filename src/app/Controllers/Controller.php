<?php

namespace App\Controllers;

use App\Middlewares\CsrfToken;

class Controller
{
    public function __construct(){}

    public function tokenValidate($token)
    {
        $csrfToken = new CsrfToken();

        try {
            if ($csrfToken->validate($token) == false) {
                exit;
            }
        } catch (\Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }

    public function redirect($path)
    {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . $path);
        exit;
    }
}