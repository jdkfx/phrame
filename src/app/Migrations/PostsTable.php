<?php

namespace App\Migrations;

use PDO;

class PostsTable
{
    public function up(PDO $pdo): void
    {
        $pdo->exec("USE {$_ENV['DATABASE_NAME']}");

        $sql = "CREATE TABLE IF NOT EXISTS posts (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            messages TEXT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci";
        $pdo->exec($sql);

        echo "Table `posts` created successfully.\n";
    }

    public function down(PDO $pdo): void
    {
        $pdo->exec("USE {$_ENV['DATABASE_NAME']}");
        $pdo->exec("DROP TABLE IF EXISTS posts");

        echo "Table `posts` dropped successfully.\n";
    }
}