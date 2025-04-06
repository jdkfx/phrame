<?php

namespace App\Migrations;

use PDO;

class Database
{
    public function up(PDO $pdo): void
    {
        $sql = "CREATE DATABASE IF NOT EXISTS `{$_ENV['DATABASE_NAME']}` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
        $pdo->exec($sql);

        echo "Database `{$_ENV['DATABASE_NAME']}` created successfully.\n";
    }

    public function down(PDO $pdo): void
    {
        $sql = "DROP DATABASE IF EXISTS `{$_ENV['DATABASE_NAME']}`";
        $pdo->exec($sql);

        echo "Database `{$_ENV['DATABASE_NAME']}` dropped successfully.\n";
    }
}