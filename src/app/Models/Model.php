<?php

namespace App\Models;

use PDO;
use PDOException;

class Model
{
    public PDO $pdo;

    protected string $table = 'posts';

    public function __construct()
    {
        $dsn        = 'mysql:dbname=' . $_ENV['DATABASE_NAME'] . ';host=' . $_ENV['DATABASE_HOST'];
        $user       = $_ENV['USERNAME'];
        $password   = $_ENV['ROOT_PASSWORD'];

        try {
            $this->pdo = new PDO($dsn, $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function findAll(string $table): array
    {
        $stmt = $this->pdo->query("SELECT * FROM {$table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert(string $table, array $data): void
    {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $stmt = $this->pdo->prepare("INSERT INTO {$table} ({$columns}) VALUES ({$placeholders})");
        $stmt->execute($data);
    }

    public function findById(string $table, int $id): array
    {
        return [];
    }

    public function update(string $table, array $data, int $id): void
    {
        //...
    }

    public function delete(string $table, int $id): void
    {
        //...
    }
}