<?php

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $dbConfigPath = $_ENV['DB_DATABASE'] ?? 'database/database.sqlite';
            $dbPath = __DIR__ . '/../' . ltrim($dbConfigPath, '/');
            
            if (!file_exists($dbPath)) {
                touch($dbPath);
            }

            try {
                self::$instance = new PDO("sqlite:" . $dbPath);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Erro de Conexão: " . $e->getMessage());
            }
        }
        return self::$instance;
    }
}