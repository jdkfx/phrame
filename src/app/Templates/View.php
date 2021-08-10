<?php

namespace App\Templates;

use App\Middlewares\CsrfToken;

class View
{
    public function __construct(){}

    public function pages($filename, $dvalue = null)
    {
        $csrf = new CsrfToken();
        $response = $dvalue;
        include __DIR__ . "/../Views/" . $filename . ".php";    
    }
}