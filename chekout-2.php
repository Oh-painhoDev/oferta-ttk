<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Configurações da API NikaPay
$token = "ci_carlos_0197d2f11bba7aeab03cbab907e172bc300b9e0c813a";
$secret = "cs_carlos_29a33bd2f834305a29132881913b2d57abb11f2d7910";

// Função para gerar número de pedido único
function generateOrderNumber() {
    return 'ORD-' . time() . '-' . strtoupper(substr(uniqid(), -5));
}

// Resposta padrão
$response = [
    'success' => false,
    'error' => '',
    'qrcode' => '',
    'qrcodeImage' => '',
    'transactionId' => '',
    'expiration' => '',
    'orderNumber' => ''
];

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Método não permitido", 405);
    }

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON inválido", 400);
    }

    // Verifica campos obrigatórios
    $required = ['name', 'email', 'document', 'phone', 'totalCompra'];
    foreach ($required as $field) {
        if (empty($data[$field])) {
            throw new Exception("Campo obrigatório faltando: $field", 400);
        }
    }

    $orderNumber = generateOrderNumber();

    // Monta o payload para a NikaPay
    $payload = [
        'token' => $token,
        'secret' => $secret,
        'amount' => (float)$data['totalCompra'],
        'debtor_name' => trim($data['name']),
        'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
        'debtor_document_number' => preg_replace('/\D/', '', $data['document']),
        'phone' => preg_replace('/\D/', '', $data['phone']),
        'method_pay' => 'pix',
        'postback' => 'https://seusite.com/postback.php',
        'external_reference' => $orderNumber
    ];

    // Requisição CURL para gerar o pagamento PIX
    $ch = curl_init('https://nikapay.com.br/api/wallet/deposit/payment');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json'
        ],
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if (curl_errno($ch)) {
        throw new Exception("Erro na comunicação com o gateway de pagamento: " . curl_error($ch), 500);
    }

    curl_close($ch);

    $apiResponse = json_decode($result, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        error_log("Resposta inválida da API: " . substr($result, 0, 200));
        throw new Exception("Erro no processamento do pagamento", 500);
    }

    // Se a API retornou sucesso
    if ($httpCode === 200 && !empty($apiResponse['idTransaction'])) {
        $response = [
            'success' => true,
            'qrcode' => $apiResponse['qrcode'] ?? '',
            'qrcodeImage' => $apiResponse['qr_code_image_url'] ?? '', // compatível com frontend
            'transactionId' => $apiResponse['idTransaction'],
            'expiration' => $apiResponse['expiration_date'] ?? '',
            'orderNumber' => $orderNumber
        ];
    } else {
        throw new Exception($apiResponse['message'] ?? "Erro ao processar pagamento", $httpCode);
    }

} catch (Exception $e) {
    $response['error'] = $e->getMessage();
    http_response_code($e->getCode() >= 400 ? $e->getCode() : 500);
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
