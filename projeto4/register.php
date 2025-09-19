<?php
// Database configuration
$host = "localhost";
$user = "vitoraug_vitor";
$pass = "Vi1be2ma3@";
$dbname = "vitoraug_PAP_2025";


// Enable error reporting for debugging (remove in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Set content type to JSON for API-like response
header('Content-Type: application/json');

// Check if request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido. Use POST.']);
    exit();
}

// Validate
$required_fields = ['nome', 'email', 'senha'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        http_response_code(400);
        echo json_encode(['error' => 'Todos os campos são obrigatórios.']);
        exit();
    }
}

// Validar CAPTCHA
if (empty($_POST['g-recaptcha-response'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Verificação CAPTCHA não concluída.']);
    exit();
}

$captcha_response = $_POST['g-recaptcha-response'];
$secret_key = '6LcSkGorAAAAAFpI5zrtW2M31tg3_cAedeKQC1oX';

$verify_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret_key}&response={$captcha_response}");
$response_data = json_decode($verify_response);


if (!$response_data->success) {
    http_response_code(400);
    echo json_encode(['error' => 'Falha na verificação do CAPTCHA.']);
    exit();
}


// Sanitize and validate input
$nome = trim(filter_var($_POST['nome'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['error' => 'E-mail inválido.']);
    exit();
}

if (strlen($_POST['senha']) < 8) {
    http_response_code(400);
    echo json_encode(['error' => 'A senha deve ter pelo menos 8 caracteres.']);
    exit();
}

$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

// Database connection with error handling
try {
    $conn = new mysqli($host, $user, $pass, $dbname);
    
    if ($conn->connect_error) {
        throw new Exception("Erro na conexão: " . $conn->connect_error);
    }

    // Set charset to utf8mb4 for proper encoding
    $conn->set_charset("utf8mb4");

    // Check if email already exists using prepared statement
    $sql_check = "SELECT id FROM utilizadores WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    
    if (!$stmt_check) {
        throw new Exception("Erro na preparação da consulta: " . $conn->error);
    }
    
    $stmt_check->bind_param("s", $email);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        http_response_code(409);
        echo json_encode(['error' => 'Este e-mail já está registado.']);
        $stmt_check->close();
        $conn->close();
        exit();
    }

    $stmt_check->close();

    // Insert new user with prepared statement
    $sql = "INSERT INTO utilizadores (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        throw new Exception("Erro na preparação da consulta: " . $conn->error);
    }
    
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        // Get the newly created user ID
        $user_id = $stmt->insert_id;
        
        http_response_code(201);
        echo json_encode([
            'success' => 'Registo efetuado com sucesso!',
            'user_id' => $user_id
        ]);
    } else {
        throw new Exception("Erro ao registar: " . $stmt->error);
    }

    $stmt->close();
    $conn->close();

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
    exit();
}
?>