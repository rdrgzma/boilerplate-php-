<?php

require_once __DIR__ . '/factory.php';

class CustomerService {
    private $gateway;

    public function __construct($gatewayName = null) {
        $this->gateway = PaymentGatewayFactory::create($gatewayName);
    }

    public function criarCliente($data) {
        return $this->gateway->createCustomer($data);
    }
}
