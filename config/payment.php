<?php

return [
    'default_gateway' => 'asaas',
    'asaas' => [
        'api_key' => $_ENV['ASAAS_API_KEY'] ?? '',
        'base_url' => $_ENV['ASAAS_BASE_URL'] ?? 'https://api.asaas.com/v3'
    ]
];
