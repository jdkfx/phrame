<?php

namespace App\Models;

use \PDO;

class model
{
    public $pdo;

    public function __construct() {
        $dsn        = 'mysql:dbname=blog;host=phrame_mysql_1';
        $user       = 'root';
        $password   = 'password';

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