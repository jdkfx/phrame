<?php

namespace App\Models;

use App\Models\Model;
use \PDO;

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
            $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            return [];
        }

        return $response;
    }

    public function store($request)
    {
        $query = "INSERT INTO blog.posts (title, messages) VALUES (?, ?)";

        try {
            $stmt = $this->pdo->prepare($query);
            $response = $stmt->execute(array($request["title"], $request["messages"]));
        } catch (Exception $e) {
            return;
        }
    }
}