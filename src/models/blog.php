<?php

namespace models;

class Blog
{
    public $title;
    public $messages;

    public function index() : array
    {
        return array('title' => 'My first posts!', 'messages' => 'My name is jdkfx.');
    }
}