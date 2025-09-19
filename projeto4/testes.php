<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/_site/css/testes.css">
  <title>Clube Root Secreto</title>
  
</head>
<body>
  <h1>🛡️ Clube Root Secreto 🛡️</h1>
  <div class="terminal" id="terminal">
    <div class="output-line">root@clube:~$ Bem-vindo, Vitu.</div>
    <div class="output-line">root@clube:~$ Digite um comando...</div>
  </div>
  <div class="input-area">
    <input type="text" id="comando" placeholder="ex: listar_membros">
    <button onclick="executarComando()">Executar</button>
  </div>

  <script>
    const terminal = document.getElementById('terminal');
    const input = document.getElementById('comando');

    const comandos = {
      "listar_membros": "- Vitu\n- admin_estagio\n- caféinator9000",
      "ativar_cafe": "☕ Máquina de café ligada. Força máxima.",
      "derrubar_chefe": "⚠️ Falha: Proteção anti-estagiário ativada.",
      "regras": "1. Nunca admitir que o clube existe.\n2. Sempre manter o terminal estiloso.\n3. Café é prioridade.",
      "root_root": "Acesso total concedido. Bem-vindo ao caos, Vitu."
    };

    function executarComando() {
      const cmd = input.value.trim();
      let resposta = comandos[cmd] || `Comando '${cmd}' não reconhecido.`;
      const linha = document.createElement('div');
      linha.className = 'output-line';
      linha.textContent = `root@clube:~$ ${cmd}\n${resposta}`;
      terminal.appendChild(linha);
      terminal.scrollTop = terminal.scrollHeight;
      input.value = '';
    }
  </script>
</body>
</html>
