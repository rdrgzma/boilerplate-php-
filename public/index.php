<?php

require_once __DIR__ . '/../vendor/autoload.php';

// 1. Carrega as variáveis de ambiente (.env)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// INICIA A SESSÃO AQUI
session_start();

// ==========================================
// 2. CONFIGURAÇÕES GLOBAIS DE LOCALIZAÇÃO
// ==========================================

// Define o fuso horário padrão (Padrão: São Paulo)
$timezone = $_ENV['APP_TIMEZONE'] ?? 'America/Sao_Paulo';
date_default_timezone_set($timezone);

// Define o idioma padrão para formatações nativas (como strftime, moedas, etc)
$locale = $_ENV['APP_LOCALE'] ?? 'pt_BR';
setlocale(LC_ALL, "{$locale}.UTF-8", "{$locale}.utf-8", "portuguese");

// ==========================================

// 3. Inicializa o Roteador
$router = new \Core\Router();

// 4. Carrega o arquivo de rotas
require_once __DIR__ . '/../routes/web.php';

// 5. Despacha a requisição atual
$router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);