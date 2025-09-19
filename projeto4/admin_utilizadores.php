<!DOCTYPE html>
<html lang="pt-PT">
<head>
  <meta charset="UTF-8">
  <title>Admin | utilizadores</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    :root {
      --primary-color: #2c3e50;
      --secondary-color: #3498db;
      --success-color: #27ae60;
      --danger-color: #e74c3c;
      --light-color: #ecf0f1;
      --dark-color: #34495e;
      --text-color: #333;
      --border-color: #ddd;
    }
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f5f7fa;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      width: 90%;
      max-width: 1200px;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }
    h2 {
      color: var(--primary-color);
      border-bottom: 2px solid var(--secondary-color);
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    .botao-voltar {
      margin-bottom: 20px;
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }
    .btn-voltar {
      background: var(--primary-color);
      color: white;
      padding: 8px 15px;
      text-decoration: none;
      border-radius: 5px;
      transition: background 0.3s;
    }
    .btn-voltar:hover {
      background: var(--dark-color);
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
    }
    th, td {
      padding: 12px 15px;
      text-align: center;
      border-bottom: 1px solid var(--border-color);
    }
    th {
      background-color: var(--primary-color);
      color: white;
    }
    tr:nth-child(even) {
      background-color: var(--light-color);
    }
    tr:hover {
      background-color: #f0f0f0;
    }
    .delete-btn {
      background-color: var(--danger-color);
      color: white;
      padding: 6px 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s;
    }
    .delete-btn:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="botao-voltar">
      <a href="index.php" class="btn-voltar">
        <i class="fas fa-house"></i> Home
      </a>
      <a href="admin_envios.php" class="btn-voltar">
        <i class="fas fa-arrow-left"></i> Voltar
      </a>
      <a href="admin_utilizadores.php" class="btn-voltar">
        <i class="fas fa-arrow-right"></i> Avançar
      </a>
    </div>

    <h2>Registros de Utilizadores</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Nome</th>
          
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php
        header('Content-Type: text/html; charset=utf-8');
        $pdo = new PDO(
        "mysql:host=localhost;dbname=vitoraug_PAP_2025;charset=utf8mb4", 
                "vitoraug_vitor", 
                "Vi1be2ma3@"
        );
        $stmt = $pdo->query("SELECT id, email, nome FROM utilizadores");
        foreach ($stmt as $row): ?>
          <tr>
    <td><?= htmlspecialchars($row['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
    <td><?= htmlspecialchars($row['email'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
    <td><?= htmlspecialchars($row['nome'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></td>
          <td>
              <form method="POST" action="delete_utilizadores.php" onsubmit="return confirm('Tem a certeza que deseja excluir o utilizador?');">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <button class="delete-btn" type="submit">Excluir</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
