<?php
// auth_check.php
session_start();

function estaLogado() {
    // Verifica tanto por ID quanto por e-mail para maior segurança
    return isset($_SESSION['usuario_id']) && isset($_SESSION['user_email']);
}

function verificarLogin() {
    if (!estaLogado()) {
        // Guarda a página atual para redirecionar depois do login
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header('Location: auth.php');
        exit;
    }
    
    // Verificação adicional por e-mail (opcional)
    if (!filter_var($_SESSION['user_email'], FILTER_VALIDATE_EMAIL)) {
        logout(); // Força logout se o e-mail for inválido
    }
}

function logout() {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

function getUserEmail() {
    return $_SESSION['user_email'] ?? null;
}

// Função para redirecionamento pós-login
function redirectAfterLogin() {
    if (isset($_SESSION['redirect_url'])) {
        $url = $_SESSION['redirect_url'];
        unset($_SESSION['redirect_url']);
        header("Location: $url");
        exit;
    }
    header('Location: perfil.php'); // Página padrão
    exit;
}
?>