<?php
require_once __DIR__ . '/../../../../core/Env.php';
Env::load();

class AsaasClient {

    private $apiKey;
    private $baseUrl;

    public function __construct() {
        $config = require __DIR__ . '/../../../../config/payment.php';
        $this->apiKey = $config['asaas']['api_key'];
        $this->baseUrl = $config['asaas']['base_url'];
    }

    public function request($method, $endpoint, $data = []) {

        if (!$data) $data = [];

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $this->baseUrl . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "content-type: application/json",
                "access_token: {$this->apiKey}",
                "User-Agent: boilerplate-php/1.0"
            ],
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false, // útil para localhost
        ]);

        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new Exception("Erro cURL: " . $err);
        }

        if (!$response) {
            throw new Exception("Resposta vazia do Asaas (HTTP code: $httpCode)");
        }

        $data = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("JSON inválido do Asaas: " . $response);
        }

        if (isset($data['errors'])) {
            throw new Exception("Erro Asaas: " . $data['errors'][0]['description']);
        }

        return $data;
    }

    public function post($endpoint, $data = []) {
        return $this->request('POST', $endpoint, $data);
    }

    public function get($endpoint) {
        return $this->request('GET', $endpoint);
    }
}