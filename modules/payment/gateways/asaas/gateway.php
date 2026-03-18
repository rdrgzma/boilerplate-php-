<?php
require_once __DIR__ . '/client.php';

class AsaasGateway {

    private $client;

    public function __construct() {
        $this->client = new AsaasClient();
    }

    public function createCustomer($data) {
        if (!$data) throw new Exception("Dados do cliente ausentes");
        return $this->client->post('/customers', $data);
    }

    public function createPayment($data) {
        if (!$data) throw new Exception("Dados do pagamento ausentes");
        return $this->client->post('/payments', [
            'customer' => $data['customer'],
            'billingType' => $data['billingType'], // PIX | CREDIT_CARD | BOLETO
            'value' => $data['value'],
            'dueDate' => $data['dueDate'] ?? date('Y-m-d'),
            'description' => $data['description'] ?? 'Pagamento teste'
        ]);
    }

    public function getPayment($id) {
        return $this->client->get('/payments/' . $id);
    }

    public function refund($id) {
        return $this->client->post('/payments/' . $id . '/refund', []);
    }

    public function createInvoice($paymentId) {
        return $this->client->post('/invoices', ['payment' => $paymentId]);
    }
}