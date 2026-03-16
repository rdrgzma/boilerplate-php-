<?php

namespace Core;

use PDO;
use AllowDynamicProperties;

#[AllowDynamicProperties]
abstract class Model
{
    protected static string $table;

    public static function all(): array
    {
        $pdo = Database::getConnection();
        $query = "SELECT * FROM " . static::$table;
        
        // Se a tabela tiver company_id, filtra pelo tenant logado
        if (static::isTenantModel() && $tenantId = Auth::user()['company_id'] ?? null) {
            $stmt = $pdo->prepare($query . " WHERE company_id = :company_id");
            $stmt->execute(['company_id' => $tenantId]);
        } else {
            $stmt = $pdo->query($query);
        }

        return $stmt->fetchAll(PDO::FETCH_CLASS, static::class);
    }

    public static function find(int $id): ?static
    {
        $pdo = Database::getConnection();
        $query = "SELECT * FROM " . static::$table . " WHERE id = :id";
        $params = ['id' => $id];

        // Se for model de tenant, garante que o id pertence ao tenant logado
        if (static::isTenantModel() && $tenantId = Auth::user()['company_id'] ?? null) {
            $query .= " AND company_id = :company_id";
            $params['company_id'] = $tenantId;
        }

        $stmt = $pdo->prepare($query . " LIMIT 1");
        $stmt->execute($params);
        $stmt->setFetchMode(PDO::FETCH_CLASS, static::class);
        $result = $stmt->fetch();
        return $result ?: null;
    }

    /**
     * Define se o model deve ser filtrado por company_id.
     * Sobrescreva nos models que NÃO devem ser filtrados.
     */
    protected static function isTenantModel(): bool
    {
        return true;
    }
}