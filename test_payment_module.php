<?php
require_once __DIR__ . '/modules/payment/payment_service.php';
require_once __DIR__ . '/modules/payment/customer_service.php';

$gateway = 'asaas';

try {
    $customerService = new CustomerService($gateway);

    $customer = $customerService->criarCliente([
        'name' => 'Cliente Teste',
        'cpfCnpj' => '11144477735', // CPF de teste válido
        'email' => 'teste@email.com'
    ]);

    echo "Cliente criado:\n";
    print_r($customer);

    $paymentService = new PaymentService($gateway);

    $payment = $paymentService->criarPagamento([
        'customer' => $customer['id'],
        'value' => 100,
        'billingType' => 'PIX',
        'description' => 'Teste PIX'
    ]);

    echo "Pagamento criado:\n";
    print_r($payment);

} catch (Exception $e) {
    echo "ERRO: " . $e->getMessage() . "\n";
}