<?php

namespace models;

class Blog
{
    public function index() : array
    {
        return array('title' => 'My first posts!', 'messages' => 'My name is jdkfx.');
    }
}