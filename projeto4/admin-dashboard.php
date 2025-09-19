<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Painel Admin - Dicas Sustentáveis</title>
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
      line-height: 1.6;
      color: var(--text-color);
      background-color: #f5f7fa;
      margin: 0;
      padding: 20px;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
      color: var(--primary-color);
      border-bottom: 2px solid var(--secondary-color);
      padding-bottom: 10px;
      margin-top: 30px;
    }
    
    .btn-voltar {
      display: inline-block;
      background: var(--primary-color);
      color: white;
      padding: 8px 15px;
      text-decoration: none;
      border-radius: 4px;
      margin-bottom: 20px;
      transition: background 0.3s;
    }
    
    .btn-voltar:hover {
      background: var(--dark-color);
    }
    
    .btn-voltar i {
      margin-right: 5px;
    }
    
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    
    table th {
      background-color: var(--primary-color);
      color: white;
      padding: 12px;
      text-align: left;
    }
    
    table td {
      padding: 10px;
      border-bottom: 1px solid var(--border-color);
      vertical-align: middle;
    }
    
    table tr:nth-child(even) {
      background-color: var(--light-color);
    }
    
    table tr:hover {
      background-color: #f0f0f0;
    }
    
    select, input[type="text"] {
      width: 100%;
      padding: 8px;
      border: 1px solid var(--border-color);
      border-radius: 4px;
      box-sizing: border-box;
    }
    
    button {
      background-color: var(--secondary-color);
      color: white;
      border: none;
      padding: 8px 15px;
      border-radius: 4px;
      cursor: pointer;
      transition: background 0.3s;
    }
    
    button:hover {
      background-color: #2980b9;
    }
    
    button[type="submit"] {
      background-color: var(--success-color);
    }
    
    button[type="submit"]:hover {
      background-color: #219955;
    }
    
    .delete-btn {
      background-color: var(--danger-color);
    }
    
    .delete-btn:hover {
      background-color: #c0392b;
    }
    
    .form-group {
      margin-bottom: 15px;
    }
    
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    
    .ql-container {
      border: 1px solid var(--border-color) !important;
      border-radius: 4px;
    }
    
    .ql-toolbar {
      border: 1px solid var(--border-color) !important;
      border-radius: 4px 4px 0 0;
    }
    
    .actions-cell {
      display: flex;
      gap: 5px;
    }
    
    .form-section {
      background: white;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
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
      <i class="fas fa-arrow-right"></i> Avançar
    </a>
  </div>



<?php
  session_start();
  if (!isset($_SESSION['user_email']) || $_SESSION['user_email'] !== 'admin@admin.pt') {
    header("Location: index.php");
    exit;
  }

  $host = "localhost";
  $user = "vitoraug_vitor";
  $pass = "Vi1be2ma3@";
  $dbname = "vitoraug_PAP_2025";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
$conn->exec("SET NAMES utf8mb4");
  $stmt = $conn->query("SELECT * FROM dicas_sustentaveis ORDER BY id");
  $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  ?>

  <div class="form-section">
    <h2>Editar Dicas Sustentáveis</h2>
    <form method="POST" action="editar_dicas.php">
      <table>
        <thead>
          <tr>
            <th>Posição</th>
            <th>Texto Principal</th>
            <th>Texto Destaque</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dados as $index => $dado): ?>
            <tr>
              <td>

                <select name="dicas[<?= $index ?>][posicao]" class="form-control">
                  <option value="esquerda" <?= $dado['posicao'] == 'esquerda' ? 'selected' : '' ?>>Esquerda</option>
                  <option value="direita" <?= $dado['posicao'] == 'direita' ? 'selected' : '' ?>>Direita</option>
                </select>
              </td>
              <td><input type="text" name="dicas[<?= $index ?>][texto_principal]" value="<?= htmlspecialchars($dado['texto_principal']) ?>" class="form-control"></td>
              <td><input type="text" name="dicas[<?= $index ?>][texto_destaque]" value="<?= htmlspecialchars($dado['texto_destaque']) ?>" class="form-control"></td>
            
              <td class="actions-cell">
                <input type="hidden" name="dicas[<?= $index ?>][id]" value="<?= $dado['id'] ?>">
                <form method="POST" action="eliminar_dica.php" onsubmit="return confirm('Tem certeza que deseja eliminar esta dica?');" style="display: inline;">
                  <input type="hidden" name="id" value="<?= $dado['id'] ?>">
                  <button type="submit" class="delete-btn"><i class="fas fa-trash"></i> Eliminar</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <div style="margin-top: 20px;">
        <button type="submit" class="save-btn"><i class="fas fa-save"></i> Guardar Todas as Alterações</button>
      </div>
    </form>
  </div>

  <div class="form-section">
    <h2>Adicionar Nova Dica</h2>
    <form method="POST" action="adicionar_dica.php" id="formAdicionar">
      <div class="form-group">
        <label for="posicao">Posição:</label>
        <select name="posicao" class="form-control" required>
          <option value="esquerda">Esquerda</option>
          <option value="direita">Direita</option>
        </select>
      </div>

      <div class="form-group">
        <label for="texto_principal">Texto Principal:</label>
        <div id="editorPrincipal" style="height: 200px;"></div>
        <input type="hidden" name="texto_principal" id="inputPrincipal">
      </div>

      <div class="form-group">
        <label for="texto_destaque">Texto Destaque:</label>
        <div id="editorDestaque" style="height: 200px;"></div>
        <input type="hidden" name="texto_destaque" id="inputDestaque">
      </div>

      <button type="submit" class="save-btn"><i class="fas fa-plus-circle"></i> Adicionar Dica</button>
    </form>
  </div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const opcoesToolbar = [
      [{ 'font': [] }],
      [{ 'size': ['small', false, 'large', 'huge'] }],
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      ['bold', 'italic', 'underline', 'strike'],
      ['blockquote', 'code-block'],
      [{ 'script': 'sub' }, { 'script': 'super' }],
      [{ 'color': [] }, { 'background': [] }],
      [{ 'list': 'ordered' }, { 'list': 'bullet' }],
      [{ 'indent': '-1' }, { 'indent': '+1' }],
      [{ 'direction': 'rtl' }],
      [{ 'align': [] }],
      ['clean']
    ];

    const quillPrincipal = new Quill('#editorPrincipal', {
      theme: 'snow',
      modules: {
        toolbar: opcoesToolbar
      },
      placeholder: 'Digite o texto principal aqui...'
    });

    const quillDestaque = new Quill('#editorDestaque', {
      theme: 'snow',
      modules: {
        toolbar: opcoesToolbar
      },
      placeholder: 'Digite o texto em destaque aqui...'
    });

    const formAdicionar = document.getElementById('formAdicionar');
    formAdicionar.addEventListener('submit', function () {
      document.querySelector('#inputPrincipal').value = quillPrincipal.root.innerHTML;
      document.querySelector('#inputDestaque').value = quillDestaque.root.innerHTML;
    });
  });
</script>

</body>
</html>