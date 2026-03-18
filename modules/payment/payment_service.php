<?php
require_once __DIR__ . '/factory.php';

class PaymentService {

    private $gateway;

    public function __construct($gatewayName = null) {
        if (!$gatewayName) {
            $config = require __DIR__ . '/../../config/payment.php';
            $gatewayName = $config['default_gateway'];
        }
        $this->gateway = GatewayFactory::make($gatewayName);
    }

    public function criarPagamento($data) {
        if (empty($data['customer']) || empty($data['value']) || empty($data['billingType'])) {
            throw new Exception("Dados do pagamento inválidos");
        }
        return $this->gateway->createPayment($data);
    }
}
