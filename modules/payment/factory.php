<?php

require_once __DIR__ . '/gateways/asaas/gateway.php';

class PaymentGatewayFactory {
    public static function create($gatewayName = null) {
        if ($gatewayName === null) {
            $config = require __DIR__ . '/../../config/payment.php';
            $gatewayName = $config['default_gateway'];
        }

        switch (strtolower($gatewayName)) {
            case 'asaas':
                return new AsaasGateway();
            case 'mercadopago':
                // return new MercadoPagoGateway();
                throw new Exception("Mercado Pago gateway not implemented yet.");
            case 'pagseguro':
                // return new PagSeguroGateway();
                throw new Exception("PagSeguro gateway not implemented yet.");
            default:
                throw new Exception("Gateway $gatewayName not supported.");
        }
    }
}
