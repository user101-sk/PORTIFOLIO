<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Feedback | Live Climate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

 <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Courier New', Courier, monospace;
  }

  body {
    background: radial-gradient(circle at top left, #0f0c29, #302b63, #000000);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 1rem;
    color: #f5f3ce;
  }

form {
  background-color: rgba(255, 255, 255, 0.15); /* branco translúcido */
  padding: 2rem;
  border-radius: 16px;
  box-shadow: 0 8px 32px 0 rgba(59, 35, 110, 0.37);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.25);
  width: 100%;
  max-width: 420px;
  position: relative;
  z-index: 1;
  color: #2c3e50;
}

  h2 {
    text-align: center;
    margin-bottom: 1.5rem;
    color: #f1c40f;
    text-shadow: 0 0 8px rgba(241, 196, 15, 0.3);
  }

  input, textarea {
    width: 100%;
    padding: 0.75rem;
    margin-bottom: 1rem;
    background-color: #ffffff;
    color: black;
    border: 1px solid #3c256e;
    border-radius: 10px;
    transition: 0.3s;
    font-size: 1rem;
  }

  input::placeholder, textarea::placeholder {
    color: black;
  }

  input:focus, textarea:focus {
    border-color: #f1c40f;
    outline: none;
    box-shadow: 0 0 5px rgba(241, 196, 15, 0.5);
  }

  textarea {
    height: 120px;
    resize: vertical;
  }

  button {
    background: linear-gradient(90deg, #3c256e, #031154);
    color: white;
    padding: 0.75rem;
    border: none;
    border-radius: 10px;
    width: 100%;
    font-size: 1rem;
    cursor: pointer;
    font-weight: bold;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  }

  button:hover {
    background: linear-gradient(90deg, #4a3b8a, #1a2b6b);
    transform: translateY(-2px);
  }

  a {
    display: block;
    text-align: center;
    margin-top: 1rem;
    color: #f1c40f;
    text-decoration: none;
    font-size: 0.95rem;
    transition: 0.3s;
  }

  a:hover {
    text-decoration: underline;
    color: #ffe780;
  }

  p {
    margin-top: 1rem;
    text-align: center;
    color: #2ecc71;
    font-weight: bold;
  }
</style>

</head>
<body>
  <form action="enviar.php" method="POST">
    <h2>Formulário de Relatório</h2>

    <input type="text" name="nome" placeholder="Seu nome" required>
    <input type="email" name="email" placeholder="Seu e-mail" required>
    <textarea name="relatorio" placeholder="Escreva seu relatório aqui" required></textarea>

    <button type="submit"><i class="fas fa-paper-plane"></i> Enviar</button>
    <a href="index.php"><i class="fas fa-arrow-left"></i> Voltar ao site</a>

    <?php if (isset($_GET['msg'])): ?>
      <p><?php echo htmlspecialchars($_GET['msg']); ?></p>
    <?php endif; ?>
  </form>
</body>
</html>
