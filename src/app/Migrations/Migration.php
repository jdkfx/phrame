<?php

namespace App\Migrations;

use PDO;
use PDOException;

class Migration
{
    private PDO $pdo;

    public function __construct() {
        $dsn        = 'mysql:host=' . $_ENV['DATABASE_HOST'] . ';port=3306';
        $user       = $_ENV['USERNAME'];
        $password   = $_ENV['ROOT_PASSWORD'];

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database connection failed: " . $e->getMessage();
            return;
        }
    }

    public function migrate(): void
    {
        $migrations = [
            new Database(),
            new PostsTable(),
        ];

        foreach ($migrations as $migration) {
            $migration->up($this->pdo);
        }

        echo "Migrations completed successfully.\n";
    }

    public function rollback(): void
    {
        $migrations = [
            new PostsTable(),
            new Database(),
        ];

        foreach ($migrations as $migration) {
            $migration->down($this->pdo);
        }

        echo "Rollback completed successfully.\n";
    }
}
