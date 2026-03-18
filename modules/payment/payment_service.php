<?php

require_once __DIR__ . '/factory.php';

class PaymentService {
    private $gateway;

    public function __construct($gatewayName = null) {
        $this->gateway = PaymentGatewayFactory::create($gatewayName);
    }

    public function criarPagamento($data) {
        return $this->gateway->createPayment($data);
    }
}
