<?php
require_once __DIR__ . '/factory.php';

class CustomerService {

    private $gateway;

    public function __construct($gatewayName = null) {
        if (!$gatewayName) {
            $config = require __DIR__ . '/../../config/payment.php';
            $gatewayName = $config['default_gateway'];
        }
        $this->gateway = GatewayFactory::make($gatewayName);
    }

    public function create($data) {
        if (empty($data['name']) || empty($data['cpfCnpj'])) {
            throw new Exception("Dados do cliente inválidos");
        }
        return $this->gateway->createCustomer($data);
    }

    // para compatibilidade com seu teste
    public function criarCliente($data) {
        return $this->create($data);
    }
}