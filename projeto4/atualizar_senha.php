<?php
// Conexão com a base de dados
$pdo = new PDO("mysql:host=localhost;dbname=vitoraug_PAP_2025", "vitoraug_vitor", "Vi1be2ma3@");
$token = $_POST['token'] ?? '';
$senha = $_POST['senha'] ?? '';

// HTML + CSS INICIAL
echo '
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Recuperação de Senha</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Courier New", Courier, monospace;
    }

    body {
      background: linear-gradient(to bottom, #0a0a1a, #1a0033);
      color: #f5f3ce;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden;
    }

    .container {
      background: linear-gradient(135deg, #0f0c29dd, #302b63dd);
      border: 1px solid #3c256e;
      border-radius: 15px;
      padding: 2rem;
      max-width: 400px;
      width: 90%;
      box-shadow: 0 0 30px rgba(59, 35, 110, 0.6);
      backdrop-filter: blur(5px);
      text-align: center;
    }

    h2 {
      color: #f1c40f;
      margin-bottom: 15px;
      text-shadow: 0 0 10px rgba(245, 243, 206, 0.3);
    }

    p {
      font-size: 0.95rem;
      margin-bottom: 20px;
    }

    a.btn {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 15px;
      background: linear-gradient(90deg, #00b4d8, #0083a3);
      color: white;
      font-weight: bold;
      text-decoration: none;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    a.btn:hover {
      background: linear-gradient(90deg, #00c6eb, #0095b6);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
  <div class="container">
';

if (empty($token) || empty($senha)) {
    echo "<h2>Erro</h2>";
    echo "<p>Token ou senha ausente.</p>";
    echo '<a href="auth.php" class="btn">Voltar para o Login</a>';
    exit('</div></body></html>');
}

// Consulta o banco procurando o token
$stmt = $pdo->prepare("SELECT * FROM utilizadores WHERE token_recuperacao = ?");
$stmt->execute([$token]);
$utilizadores = $stmt->fetch();

if ($utilizadores) {
    // Atualiza a senha
    $novaHash = password_hash($senha, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE utilizadores SET senha = ?, token_recuperacao = NULL, token_expira = NULL WHERE id = ?");
    $stmt->execute([$novaHash, $utilizadores['id']]);

    echo "<h2>Sucesso!</h2>";
    echo "<p>Senha atualizada com sucesso. Agora você pode fazer login normalmente.</p>";
} else {
    echo "<h2>Token inválido</h2>";
    echo "<p>Token inválido ou expirado. Tente novamente solicitando uma nova recuperação.</p>";
}

// Botão de retorno
echo '<a href="auth.php" class="btn">Voltar para o Login</a>';
echo '</div></body></html>';
?>
