<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politica de Cookies | Live Climate</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/_site/css/politica_cookies.css">
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

 <!-- Conteúdo da Política -->
    <main class="cookies-container">
        <h1><i class="fas fa-cookie-bite"></i> Política de Cookies</h1>
        <p><em>Última atualização: 16/05/2025</em></p>

        <h2>O que são cookies?</h2>
        <p>Cookies são pequenos arquivos armazenados no seu dispositivo quando você visita nosso site. Eles nos ajudam a:</p>
        <ul>
            <li>Lembrar suas preferências (ex.: idioma)</li>
            <li>Melhorar a velocidade e segurança do site</li>
            <li>Entender como os visitantes interagem com nosso conteúdo sobre clima e fases lunares</li>
        </ul>

        <h2>Tipos de cookies que utilizamos</h2>
        
        <div class="cookie-type">
            <h3><i class="fas fa-robot"></i> Cookies Essenciais</h3>
            <p><strong>Função:</strong> Garantem o funcionamento básico do site (ex.: login).</p>
            <p><strong>Exemplo:</strong> Manter sua sessão ativa enquanto explora as fases da Lua.</p>
        </div>

        <div class="cookie-type">
            <h3><i class="fas fa-chart-line"></i> Cookies de Desempenho</h3>
            <p><strong>Função:</strong> Coletam dados anônimos sobre como você usa o site (ex.: páginas mais visitadas).</p>
            <p><strong>Exemplo:</strong> Saber se a seção "Eclipse Lunar" é a mais acessada.</p>
        </div>

        <div class="cookie-type">
            <h3><i class="fas fa-bullseye"></i> Cookies de Marketing</h3>
            <p><strong>Função:</strong> Exibir anúncios relevantes (usamos apenas se você ativar).</p>
            <p><strong>Exemplo:</strong> Mostrar promoções de telescópios para entusiastas da astronomia.</p>
        </div>

        <h2>Como gerenciar cookies</h2>
        <p>Você pode controlar/desativar cookies nas configurações do seu navegador:</p>
        <ul>
            <li><a href="https://support.google.com/chrome/answer/95647" target="_blank">Chrome</a></li>
            <li><a href="https://support.mozilla.org/pt-BR/kb/desativar-cookies-sites-terceiros" target="_blank">Firefox</a></li>
            <li><a href="https://support.apple.com/pt-br/guide/safari/sfri11471/mac" target="_blank">Safari</a></li>
        </ul>
        <p><strong>Atenção:</strong> Desativar cookies essenciais pode afetar a funcionalidade do site.</p>

        <h2>Cookies de terceiros</h2>
        <p>Alguns serviços integrados (como Google Analytics) usam seus próprios cookies. Veja suas políticas:</p>
        <ul>
            <li><a href="https://policies.google.com/technologies/cookies" target="_blank">Google</a></li>
            <li><a href="https://www.facebook.com/policies/cookies/" target="_blank">Facebook Pixel</a> (se aplicável)</li>
        </ul>

        <h2>Alterações nesta política</h2>
        <p>Atualizações serão comunicadas através de:</p>
        <ul>
            <li>Banner no site por 7 dias</li>
            <li>E-mail (para usuários cadastrados)</li>
        </ul>

        <h2>Contato</h2>
        <p>Dúvidas? Envie um e-mail para: <br>
        <i class="fas fa-envelope"></i> <a href="mailto:liveclimate@vitoraugusto.pt" style="color:#f1c40f;">liveclimate@vitoraugusto.pt</a></p>

        <a href="index.php" class="voltar-btn"><i class="fas fa-arrow-left"></i> Voltar ao site</a>
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