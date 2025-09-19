<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400;600;700&display=swap" rel="stylesheet">
  <title>Solicitar Redefinição de Senha</title>
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

    p {
      font-size: 0.95rem;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
      color: #f5f3ce;
      text-align: left;
    }

    input[type="email"] {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: none;
      background: #2a2352;
      color: #ffffff;
      margin-bottom: 20px;
    }

    input[type="email"]::placeholder {
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
  </style>
</head>
<body>
  <div class="container">
    <h2>Esqueceu sua senha?</h2>
    <p>Digite seu e-mail para receber um link de redefinição.</p>
    <form action="enviar_token.php" method="POST">
      <label for="email">E-mail:</label>
      <input type="email" id="email" name="email" placeholder="seuemail@exemplo.com" required>
      <button type="submit">Redefinir Senha</button>
    </form>
  </div>
</body>
</html>
