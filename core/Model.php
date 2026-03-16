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
     * Salva ou atualiza o registro no banco de dados.
     */
    public function save(): bool
    {
        $pdo = Database::getConnection();
        $data = $this->toArray();
        
        // Remove o ID do array de dados para a query se estiver presente
        $id = $this->id ?? null;
        if (isset($data['id'])) unset($data['id']);

        if ($id) {
            // UPDATE
            $fields = [];
            foreach (array_keys($data) as $key) {
                $fields[] = "{$key} = :{$key}";
            }
            $sql = "UPDATE " . static::$table . " SET " . implode(', ', $fields) . " WHERE id = :id";
            $data['id'] = $id;
        } else {
            // INSERT
            if (empty($this->created_at)) {
                $this->created_at = date('Y-m-d H:i:s');
                $data['created_at'] = $this->created_at;
            }
            if (empty($this->updated_at)) {
                $this->updated_at = date('Y-m-d H:i:s');
                $data['updated_at'] = $this->updated_at;
            }

            $keys = array_keys($data);
            $tags = array_map(fn($k) => ":$k", $keys);
            $sql = "INSERT INTO " . static::$table . " (" . implode(', ', $keys) . ") VALUES (" . implode(', ', $tags) . ")";
        }

        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute($data);

        if ($success && !$id) {
            $this->id = (int)$pdo->lastInsertId();
        }

        return $success;
    }

    /**
     * Converte o objeto em um array de dados correspondentes às colunas do banco.
     */
    public function toArray(): array
    {
        return get_object_vars($this);
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