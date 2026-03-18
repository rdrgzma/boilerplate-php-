<?php

require_once __DIR__ . '/gateways/asaas/gateway.php';
// require_once __DIR__ . '/gateways/mercadopago/gateway.php';
// require_once __DIR__ . '/gateways/pagseguro/gateway.php';

class GatewayFactory {

    public static function make($gatewayName) {
        switch (strtolower($gatewayName)) {
            case 'asaas':
                return new AsaasGateway();
            case 'mercadopago':
                // return new MercadoPagoGateway();
                throw new Exception("Mercado Pago ainda não implementado");
            case 'pagseguro':
                // return new PagSeguroGateway();
                throw new Exception("PagSeguro ainda não implementado");
            default:
                throw new Exception("Gateway {$gatewayName} não encontrado");
        }
    }
}