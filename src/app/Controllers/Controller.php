<?php

namespace App\Controllers;

use Psr\Http\Message\UriInterface;
use App\Middlewares\CsrfToken;

class Controller
{
    public $csrfToken;

    public function __construct(CsrfToken $csrfToken)
    {
        $this->csrfToken = $csrfToken;
    }

    public function tokenValidate($token)
    {
        try {
            if ($this->csrfToken->validate($token) == false) {
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