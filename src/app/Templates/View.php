<?php

namespace App\Templates;

class View
{
    public function __construct(){}

    public function pages($filename, $dvalue = null)
    {
        $response = $dvalue;
        include __DIR__ . "/../Views/" . $filename . ".php";    
    }
}