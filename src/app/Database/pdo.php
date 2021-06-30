<?php

namespace App\Database;

use \PDO;

$dsn        = 'mysql:dbname=blog;host=phrame_mysql_1';
$user       = 'root';
$password   = 'password';

try {
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Mysql connected.\n";
    
    $query = "CREATE TABLE IF NOT EXISTS blog.posts (
        id INT(11) NOT NULL auto_increment PRIMARY KEY,
        title VARCHAR(20),
        messages VARCHAR(50)
        ) DEFAULT CHARSET=utf8";
    $pdo->query($query);
    echo "Table created.\n";
} catch (PDOException $e) {
    error_log($e->getMessage());
    exit();
}

$pdo = null;