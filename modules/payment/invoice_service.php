<?php

require_once __DIR__ . '/factory.php';

class InvoiceService {
    private $gateway;

    public function __construct($gatewayName = null) {
        $this->gateway = PaymentGatewayFactory::create($gatewayName);
    }

    public function emitirNota($paymentId) {
        if (method_exists($this->gateway, 'createInvoice')) {
            return $this->gateway->createInvoice($paymentId);
        }
        
        return [
            'status' => 400,
            'body' => ['error' => 'Invoice emission not supported by this gateway.']
        ];
    }
}
