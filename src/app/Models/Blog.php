<?php

namespace App\Models;

class Blog extends Model
{
    public string $title;

    public string $messages;

    public function __construct()
    {
        parent::__construct();
    }

    public function index() : array
    {
        return $this->findAll($this->table);
    }

    public function store($request): void
    {
        $this->insert($this->table, [
            'title' => $request['title'],
            'messages' => $request['messages']
        ]);
    }
}