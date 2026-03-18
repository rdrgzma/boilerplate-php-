<?php

// Webhook Asaas
// Recebe notificações de eventos de pagamento

header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON']);
    exit;
}

$event = $data['event'] ?? '';
$payment = $data['payment'] ?? [];

// Log do evento para depuração
// error_log("Asaas Webhook Event: $event - Payment ID: " . ($payment['id'] ?? 'N/A'));

switch ($event) {
    case 'PAYMENT_RECEIVED':
        // Lógica para quando o pagamento é recebido (aguardando compensação)
        updateStatus($payment['id'], 'RECEIVED');
        break;
        
    case 'PAYMENT_CONFIRMED':
        // Lógica para quando o pagamento é confirmado
        updateStatus($payment['id'], 'CONFIRMED');
        break;
        
    case 'PAYMENT_OVERDUE':
        // Lógica para quando o pagamento está atrasado
        updateStatus($payment['id'], 'OVERDUE');
        break;
        
    default:
        // Outros eventos
        break;
}

function updateStatus($paymentId, $status) {
    // Simulação de atualização de status no banco de dados
    // No projeto real, você incluiria o arquivo de conexão e faria o UPDATE
    // error_log("Updating payment $paymentId to status $status");
}

echo json_encode(['status' => 'success']);
