<?php
// setup_db.php
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pdo = \Core\Database::getConnection();

// Cria a tabela
$pdo->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL
)");

// Cria um usuário admin padrão (Senha: 123456)
$passwordHash = password_hash('123456', PASSWORD_DEFAULT);
$email = 'admin@admin.com';

$stmt = $pdo->prepare("INSERT OR IGNORE INTO users (name, email, password) VALUES ('Administrador', :email, :password)");
$stmt->execute(['email' => $email, 'password' => $passwordHash]);

echo "Banco configurado e usuário admin@admin.com (senha: 123456) criado!";