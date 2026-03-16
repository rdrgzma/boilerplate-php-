<?php

namespace Core;

use PDO;

abstract class Model
{
    protected static string $table;

    public static function all(): array
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM " . static::$table);
        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function find(int $id): ?static
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("SELECT * FROM " . static::$table . " WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result = $stmt->fetch();
        return $result ?: null;
    }
}