<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politica de Privacidade | Live Climate</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/_site/css/Politica_de_Privacidade.css">
</head>
<body>
  
<header class="header">
<nav class="menu-completo">
  <div class="logo-container">
    <div class="menu-logo">
      <img src="/_site/img/logo.png" alt="Logo da Empresa" />
    </div>
    <a href="index.php" class="logo" title="Voltar à página inicial">Live Climate</a>
  </div>
      <ul>
<?php session_start(); ?>
<?php if (isset($_SESSION['user_name'])): ?>
    <li><a href="fases_da_lua.php">Fases da Lua</a></li>
<?php else: ?>
        <li><a href="auth.php">Fases da Lua</a></li>
<?php endif; ?>

<?php if (isset($_SESSION['user_name'])): ?>
        <li><a href="quiz-lunar.php">Quiz/Feedback</a></li>
<?php else: ?>
        <li><a href="auth.php">Quiz/Feedback</a></li>
<?php endif; ?>

<?php if (isset($_SESSION['user_name'])): ?>
        <li><a href="construcao.html"><?= htmlspecialchars($_SESSION['user_name']) ?></a></li>
        <li><a href="logout.php">Logout</a></li>
<?php else: ?>
        <li><a href="auth.php" class="destaque" >Iniciar Sessão</a></li>
<?php endif; ?>
  </ul>
</nav>
                            <!-- Menu Flutuante -->
<div class="menu-flutuante">
    <button class="menu-botao">
        <i class="fas fa-bars"></i>
    </button>
<div class="menu-links">
        <?php session_start(); ?>
        
        <?php if (isset($_SESSION['user_name'])): ?>
                <a href="fases_da_lua.php">Fases da Lua</a>
        <?php else: ?>
                <a href="auth.php">Fases da Lua</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_name'])): ?>
                <a href="quiz-lunar.php">Quiz/Feedback</a>
        <?php else: ?>
                <a href="auth.php">Quiz/Feedback</a>
        <?php endif; ?>

        <?php if (isset($_SESSION['user_name'])): ?>
                <a href="construcao.html"><?= htmlspecialchars($_SESSION['user_name']) ?></a>

        <?php if ($_SESSION['user_name'] === 'admin'): ?>
                <a href="admin-dashboard.php">Dashboard Admin</a>
            <?php endif; ?>

                <a href="logout.php">Logout</a>
        <?php else: ?>
                <a href="auth.php" class="destaque">Iniciar Sessão</a>
        <?php endif; ?>
</div>
</div>
                            <!-- Fim Menu Flutuante -->
    </header>

<main>
    <!-- Conteúdo da Política -->
    <main class="politica-container">
        <h1><i class="fas fa-shield-alt"></i> Política de Privacidade</h1>
        
        <p><em>Última atualização: [insira data]</em></p>
        
        <h2>1. Coleta de Dados</h2>
        <p>O <strong>Live Climate</strong> pode coletar as seguintes informações:</p>
        <ul>
            <li><strong>Dados de localização</strong> (apenas com sua permissão, para previsões personalizadas)</li>
            <li><strong>Cookies</strong> (para melhorar a experiência de navegação)</li>
            <li><strong>Dados anônimos</strong> (estatísticas de acesso via Google Analytics)</li>
        </ul>
        
        <h2>2. Uso das Informações</h2>
        <p>Seus dados são usados exclusivamente para:</p>
        <ul>
            <li>Fornecer previsões climáticas e fases lunares precisas</li>
            <li>Melhorar o desempenho do site</li>
            <li>Personalizar conteúdo (se optar por criar uma conta)</li>
        </ul>
        
        <h2>3. Compartilhamento</h2>
        <p>Não vendemos ou compartilhamos seus dados pessoais com terceiros, exceto:</p>
        <ul>
            <li>Provedores de serviços essenciais (ex: hospedagem do site)</li>
            <li>Quando exigido por lei</li>
        </ul>
        
        <h2>4. Segurança</h2>
        <p>Utilizamos medidas como:</p>
        <ul>
            <li>Criptografia HTTPS</li>
            <li>Limitação de acesso aos dados</li>
            <li>Revisões periódicas de segurança</li>
        </ul>
        
        <h2>5. Direitos do Usuário</h2>
        <p>Você pode:</p>
        <ul>
            <li>Solicitar acesso ou exclusão dos seus dados</li>
            <li>Desativar cookies nas configurações do navegador</li>
            <li>Revogar permissões de localização</li>
        </ul>
        
        <h2>6. Alterações nesta Política</h2>
        <p>Atualizações serão comunicadas através de:</p>
        <ul>
            <li>Notificação no site</li>
            <li>Alerta no e-mail (para usuários cadastrados)</li>
        </ul>
        
        <h2>7. Contato</h2>
        <p>Dúvidas? Envie um e-mail para: <br>
        <i class="fas fa-envelope"></i> <a href="mailto:liveclimate@vitoraugusto.pt" style="color:#f1c40f;">liveclimate@vitoraugusto.pt</a></p>
        
        <a href="index.php" class="voltar-btn"><i class="fas fa-arrow-left"></i> Voltar ao site</a>
    </main>
</main>
  <footer class="site-footer">
  <div class="footer-container">
    <!-- Seção de Informações -->
    <div class="footer-section">
      <h3>Sobre Nós</h3>
      <p>Site educativo desenvolvido para meu PAP de 2025, 
        explorando as fases da Lua e os fenómenos climáticos na Terra.
    </p>
    <div class="creditos">
    <p><i class="fas fa-user-astronaut"></i> <strong>Desenvolvido por:</strong> Vitor Augusto Siqueira</p>
  
    <p><i class="fas fa-school"></i> <strong>Profissional:</strong> Tecnico de Informática-sistemas</p>
  </div>
    </div>

    <!-- Links Úteis -->
    <div class="footer-section">
      <h3>Links Rápidos</h3>
      <ul class="footer-links">
        <li><a href="index.php">Página Inicial</a></li>
        <li><a href="Politica_de_Privacidade.php">Política de Privacidade</a></li>
      </ul>
    </div>

    <!-- Contatos -->
    <div class="footer-section">
      <h3>Contato</h3>
      <ul class="contact-info">
        <li><i class="fas fa-map-marker-alt"></i>Av. Principal, 1234 - Cidade</li>
        <li><i class="fas fa-phone"></i>000000000000</li>
        <li><i class="fas fa-envelope"></i>liveclimate@vitoraugusto.pt</li>
      </ul>
    </div>
  <!-- Redes Sociais -->
    <div class="footer-section">
      <h3>Redes Sociais</h3>
      <div class="social-links">
        <a href="https://x.com/Live_Climate101" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
        <a href="https://www.instagram.com/live_climate/" target="_blank"><i class="fab fa-instagram"></i></a>
      </div>
      
    </div>
  </div>

  <!-- Copyright -->
  <div class="copyright">
    <p>&copy; 2025 Live Climate. Todos os direitos reservados.</p>
    <div class="legal-links">
      <a href="Politica_de_Privacidade.php">Política de Privacidade</a>
          <a href="termos_de_uso.php">Termos de Uso</a>
      <a href="Mapa_do_Site.php">Mapa do Site</a>
      <p style="margin-top: 6px;">
    <a href="https://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px"
            src="https://jigsaw.w3.org/css-validator/images/vcss-blue"
            alt="CSS válido!" />
    </a>
</p>
    </div>
  </div>
</footer>
<script>        // Controle do Scroll
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                document.body.classList.add('scrollado');
            } else {
                document.body.classList.remove('scrollado');
            }
        });

        // Controle do Menu Flutuante (mesmo código anterior)
        const menuBotao = document.querySelector('.menu-botao');
        const menuLinks = document.querySelector('.menu-links');
        
        menuBotao.addEventListener('click', (e) => {
            e.stopPropagation();
            menuLinks.classList.toggle('mostrar');
            menuBotao.querySelector('i').style.transform = menuLinks.classList.contains('mostrar') 
                ? 'rotate(90deg)' 
                : 'rotate(0deg)';
        });

        document.addEventListener('click', (e) => {
            if (!e.target.closest('.menu-flutuante')) {
                menuLinks.classList.remove('mostrar');
                menuBotao.querySelector('i').style.transform = 'rotate(0deg)';
            }
        });</script>
</body>
</html>