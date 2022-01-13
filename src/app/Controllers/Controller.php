<?php

namespace App\Controllers;

use Psr\Http\Message\UriInterface;
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

    public function redirect(UriInterface $uri)
    {
        header($uri->getScheme() . $uri->getHost() . $uri->getPath());
        exit;
    }
}