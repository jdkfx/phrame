<?php

namespace models;

class Blog
{
    public function index($params) : array
    {
        return array('title' => 'My first posts!', 'messages' => 'My name is jdkfx.');
    }
}