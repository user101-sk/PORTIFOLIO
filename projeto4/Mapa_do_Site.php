<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Animação de Lua com efeitos realistas">
    <title>Mapa do Site | Live Climate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/_site/css/Mapa_do_Site.css">
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
    
<!-- Conteúdo do Mapa -->
    <main class="mapa-container">
        <h1><i class="fas fa-sitemap"></i> Mapa do Site</h1>
        
        <div class="mapa-categoria">
            <h2>🌍 Navegação Principal</h2>
            <ul class="mapa-links">
<li><a href="index.php"><i class="fas fa-home"></i> Página Inicial</a></li>

   <?php if (isset($_SESSION['user_name'])): ?>
            <li><a href="quiz-lunar.php"><i class="fas fa-moon"></i>Fases da Lua</a></li>
        <?php else: ?>
            <li></li><a href="auth.php"><i class="fas fa-moon"></i>Fases da Lua</a></li>
        <?php endif; ?>
                
        <li><a href="index.php"><i class="fas fa-cloud-sun-rain"></i> Previsão Climática</a></li>
        
           <?php if (isset($_SESSION['user_name'])): ?>
            <li><a href="quiz-lunar.php"><i class="fas fa-solid fa-dice"></i> Quiz Lunar/Feedback</a></li>
        <?php else: ?>
            <li></li><a href="auth.php"><i class="fas fa-solid fa-dice"></i> Quiz Lunar/Feedback</a></li>
        <?php endif; ?>
        
            </ul>
        </div>

        <div class="mapa-categoria">
            <h2>📚 Informações Científicas</h2>
            <ul class="mapa-links">
                <?php if (isset($_SESSION['user_name'])): ?>
            <li><a href="fases_da_lua.php"><i class="fas fa-book"></i> Glossário Lunar</a></li>
        <?php else: ?>
            <li></li><a href="auth.php"><i class="fas fa-book"></i> Glossário Lunar</a></li>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['user_name'])): ?>
            <li><a href=fases_da_lua.php"><i class="fas fa-chart-line"></i> Dados Históricos</a></li>
        <?php else: ?>
            <li></li><a href="auth.php"><i class="fas fa-chart-line"></i> Dados Históricos</a></li>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['user_name'])): ?>
            <li><a href="fases_da_lua.php"><i class="fas fa-question-circle"></i> Como a Lua Afeta o Clima?</a></li>
        <?php else: ?>
            <li></li><a href="auth.php"><i class="fas fa-question-circle"></i> Como a Lua Afeta o Clima?</a></li>
        <?php endif; ?>
        
            </ul>
        </div>

        <div class="mapa-categoria">
            <h2>🔍 Termos Legais</h2>
            <ul class="mapa-links">
                <li><a href="Politica_de_Privacidade.php"><i class="fas fa-shield-alt"></i> Política de Privacidade</a></li>
                <li><a href="termos_de_uso.php"><i class="fas fa-file-contract"></i> Termos de Uso</a></li>
                <li><a href="politica_cookies.php"><i class="fas fa-cookie-bite"></i> Política de Cookies</a></li>
            </ul>
        </div>

        <div class="mapa-categoria">
            <h2>📱 Redes Sociais</h2>
            <ul class="mapa-links">
         <li></li><a href="https://x.com/Live_Climate101" target="_blank"><i class="fa-brands fa-x-twitter"></i>X</a></li>
        <li><a href="https://www.instagram.com/live_climate/"><i class="fab fa-instagram"></i> Instagram</a></li>

            </ul>
        </div>
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

  <script>
        // Controle do Scroll
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
        });
    </script>
</body>
</html>