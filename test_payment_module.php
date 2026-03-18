<?php

// Script de teste do módulo de pagamentos
// Este script verifica se as classes podem ser carregadas e o factory funciona corretamente.

require_once __DIR__ . '/modules/payment/payment_service.php';

echo "--- Início do Teste do Módulo de Pagamento ---\n";

try {
    $gateway = 'asaas';
    $service = new PaymentService($gateway);
    
    echo "Instância do PaymentService criada com sucesso ($gateway).\n";

    // Simulação do uso (sem executar a chamada real se a API Key for inválida)
    /*
    $response = $service->criarPagamento([
        'customer' => 'cus_123',
        'value' => 100,
        'billingType' => 'PIX'
    ]);
    print_r($response);
    */

    echo "Estrutura verificada com sucesso.\n";

} catch (Exception $e) {
    echo "ERRO: " . $e->getMessage() . "\n";
}

echo "--- Fim do Teste ---\n";
