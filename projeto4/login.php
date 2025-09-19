<?php
header('Content-Type: application/json');

// Configurações do banco de dados
$host = "localhost";
$user = "vitoraug_vitor";
$pass = "Vi1be2ma3@";
$dbname = "vitoraug_PAP_2025";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';
    
    if (empty($email) || empty($senha)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'E-mail e senha são obrigatórios']);
        exit;
    }
    
    $stmt = $conn->prepare("SELECT id, nome, email, senha FROM utilizadores WHERE email = :email LIMIT 1");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$user || !password_verify($senha, $user['senha'])) {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'E-mail ou senha incorretos']);
        exit;
    }
    
session_start();
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['user_name'] = $user['nome'];

//Verificar se é o admin pelo email
if ($user['email'] === 'admin@admin.pt') {
    $redirect = 'index.php';
} else {
    $redirect = 'index.php';
}

echo json_encode([
    'success' => true,
    'message' => 'Login realizado com sucesso',
    'redirect' => $redirect
]);

    
} catch(PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Erro no servidor',
        'error' => $e->getMessage() // Remova em produção
    ]);
}
?>