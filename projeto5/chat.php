<?php 
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
$messages = $input["messages"] ?? [];

// chave e endpoint Groq
$apiKey = "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";
$endpoint = "https://api.groq.com/openai/v1/chat/completions";

$ch = curl_init($endpoint);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);

// Mensagem de sistema para garantir o comportamento do assistente
$system_message = ["role" => "system", "content" => "Você é um assistente amigável que responde em português e ajuda clientes. Mantenha as respostas concisas e úteis."];

$data = [
    "model" => "llama-3.3-70b-versatile",
    "messages" => array_merge([$system_message], $messages),
    "temperature" => 0.7,
    "max_tokens" => 512
];

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);

// --- Tratamento de Erro Otimizado ---

if (curl_errno($ch)) {
    // Erro de cURL (ex: falha de rede)
    $error_msg = "Erro na comunicação cURL: " . curl_error($ch);
    http_response_code(500); // Define o código HTTP para erro interno
    echo json_encode(["reply" => $error_msg]);
    curl_close($ch);
    exit;
}

$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$result = json_decode($response, true);

if ($http_code != 200) {
    // Erro da API (ex: chave inválida, limite excedido)
    $error_detail = isset($result["error"]["message"]) ? $result["error"]["message"] : "Detalhes desconhecidos.";
    $reply = "Erro da API (Status {$http_code}): " . $error_detail;
} elseif (isset($result["choices"][0]["message"]["content"])) {
    // Resposta bem-sucedida
    $reply = $result["choices"][0]["message"]["content"];
} else {
    // Resposta não esperada
    $reply = "Erro de formato inesperado da resposta: " . $response;
}

echo json_encode(["reply" => $reply]);

?>