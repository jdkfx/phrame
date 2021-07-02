<?php

namespace App\Models;

use App\Models\Model;

class Blog extends Model
{
    public $title;
    public $messages;

    public function __construct()
    {
        parent::__construct();
    }

    public function index() : array
    {
        $query = "SELECT * FROM blog.posts";

        try {
            $stmt = $this->pdo->query($query);
            $response = $stmt->fetchAll();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit();
        }

        return $response;
    }
}