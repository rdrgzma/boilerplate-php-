<?php
// setup_db.php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pdo = \Core\Database::getConnection();

// Lê o arquivo de schema
$schema = file_get_contents(__DIR__ . '/database/schema.sql');
$pdo->exec($schema);

// Auto-discovery de Migrations dos Módulos (modules/*/migration.sql)
foreach (glob(__DIR__ . '/modules/*/migration.sql') as $migrationFile) {
    echo "Executando migration: " . basename(dirname($migrationFile)) . "\n";
    $moduleSql = file_get_contents($migrationFile);
    if (!empty(trim($moduleSql))) {
        $pdo->exec($moduleSql);
    }
}

// Cria um Tenant (Empresa) padrão
$pdo->exec("INSERT OR IGNORE INTO companies (id, name, domain) VALUES (1, 'Empresa Matriz', 'matriz.com')");

// Cria um usuário admin padrão (Senha: 123456)
$passwordHash = password_hash('123456', PASSWORD_DEFAULT);
$email = 'admin@admin.com';

$stmt = $pdo->prepare("INSERT OR IGNORE INTO users (name, email, password, company_id, role) VALUES ('Administrador', :email, :password, 1, 'admin')");
$stmt->execute(['email' => $email, 'password' => $passwordHash]);

echo "\nBanco configurado com suporte a multi-tenant!\n";
echo "Empresa 'Empresa Matriz' criada.\n";
echo "Usuário admin@admin.com (senha: 123456) vinculado à empresa 1.\n";