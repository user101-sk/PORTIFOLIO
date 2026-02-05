<?php
header("Content-Type: application/json");

$input = json_decode(file_get_contents("php://input"), true);
$userMessage = $input["message"] ?? "";

$apiKey = "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";

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);

$data = [
    "model" => "gpt-4o-mini",
    "messages" => [
        ["role" => "system", "content" => "Você é um assistente amigável que ajuda usuários em português."],
        ["role" => "user", "content" => $userMessage]
    ]
];

curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$reply = $result["choices"][0]["message"]["content"] ?? "Desculpe, não consegui responder agora.";

echo json_encode(["reply" => $reply]);
