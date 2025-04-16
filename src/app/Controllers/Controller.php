<?php

namespace App\Controllers;

use Exception;
use Psr\Http\Message\UriInterface;
use App\Middlewares\CsrfToken;

class Controller
{
    public CsrfToken $csrfToken;

    public function __construct(?CsrfToken $csrfToken = null)
    {
        $this->csrfToken = $csrfToken ?? new CsrfToken();
    }

    public function tokenValidate($token): void
    {
        try {
            if (!$this->csrfToken->validate($token)) {
                exit;
            }
        } catch (Exception $e) {
            error_log($e->getFile() . $e->getLine() . $e->getMessage());
        }
    }

    public function redirect(UriInterface $uri): void
    {
        header($uri->getScheme() . $uri->getHost() . $uri->getPath());
        exit;
    }
}