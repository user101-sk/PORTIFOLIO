<?php
$token = $_GET['token'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title>Atualizar Senha</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Courier New', Courier, monospace;
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

    label {
      display: block;
      margin: 15px 0 5px;
      font-weight: bold;
      color: #f5f3ce;
      text-align: left;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: none;
      background: #2a2352;
      color: #ffffff;
      margin-bottom: 20px;
    }

    input[type="password"]::placeholder {
      color: #cccccc;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 15px;
      background: linear-gradient(90deg, #00b4d8, #0083a3);
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    button:hover {
      background: linear-gradient(90deg, #00c6eb, #0095b6);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .token-info {
      margin-top: 15px;
      font-size: 0.8rem;
      color: #a2d2ff;
      word-wrap: break-word;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Redefinir Senha</h2>
    <form action="atualizar_senha.php" method="POST">
      <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">
      <label for="senha">Nova Senha:</label>
      <input type="password" id="senha" name="senha" placeholder="Digite sua nova senha" required>
      <button type="submit">Atualizar Senha</button>
    </form>
    <div class="token-info">
     
    </div>
  </div>
</body>
</html>
