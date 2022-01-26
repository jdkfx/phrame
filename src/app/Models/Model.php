<?php

namespace App\Models;

use \PDO;

class Model
{
    public $pdo;

    public function __construct() {
        $dsn        = 'mysql:dbname=' . $_ENV['DATABASE_NAME'] . ';host=' . $_ENV['DATABASE_HOST'];
        $user       = $_ENV['USERNAME'];
        $password   = $_ENV['ROOT_PASSWORD'];

        $query = "CREATE TABLE IF NOT EXISTS blog.posts (
            id INT(11) NOT NULL auto_increment PRIMARY KEY,
            title VARCHAR(255),
            messages VARCHAR(255)
            ) DEFAULT CHARSET=utf8";

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $this->pdo->query($query);
        } catch (PDOException $e) {
            return;
        }
    }
}