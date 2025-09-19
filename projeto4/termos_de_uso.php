
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termos de Uso | Live Climate</title>
    <link rel="stylesheet" href="/_site/css/termos_de_uso.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

    <!-- Conteúdo dos Termos -->
    <main class="termos-container">
        <h1><i class="fas fa-file-contract"></i> Termos de Uso</h1>
        <p><em>Última atualização: [insira data]</em></p>

        <h2>1. Aceitação dos Termos</h2>
        <p>Ao acessar o site <strong>Live Climate</strong>, você concorda com estes termos. Se não concordar, não utilize nossos serviços.</p>

        <h2>2. Uso do Site</h2>
        <p>Você pode:</p>
        <ul>
            <li>Consultar informações sobre fases da Lua e clima gratuitamente.</li>
            <li>Compartilhar conteúdo (desde que cite a fonte).</li>
        </ul>
        <p><strong>Não pode:</strong></p>
        <ul>
            <li>Usar dados para fins comerciais sem autorização.</li>
            <li>Modificar/copiar código-fonte do site.</li>
        </ul>

        <h2>3. Precisão dos Dados</h2>
        <p>As previsões são baseadas em APIs públicas (ex: OpenWeatherMap) e podem ter variações. Não nos responsabilizamos por decisões tomadas com base nessas informações.</p>

        <h2>4. Contas de Usuário</h2>
        <p>Caso cadastre uma conta:</p>
        <ul>
            <li>Você é responsável por manter sua senha segura.</li>
            <li>Não compartilhe sua conta com terceiros.</li>
        </ul>

        <h2>5. Propriedade Intelectual</h2>
        <p>Todo conteúdo (textos, gráficos, logos) pertence ao <strong>Live Climate</strong>, exceto:</p>
        <ul>
            <li>Dados climáticos de fontes externas.</li>
            <li>Ícones do Font Awesome.</li>
        </ul>

        <h2>6. Limitação de Responsabilidade</h2>
        <p>Não somos responsáveis por:</p>
        <ul>
            <li>Danos causados por interrupções no site.</li>
            <li>Ações de terceiros que usem nossos dados de forma inadequada.</li>
        </ul>

        <h2>7. Alterações nos Termos</h2>
        <p>Atualizações serão comunicadas por:</p>
        <ul>
            <li>Notificação no site por 7 dias.</li>
            <li>E-mail (para usuários cadastrados).</li>
        </ul>

        <h2>8. Lei Aplicável</h2>
        <p>Estes termos são regidos pelas leis do <strong>Brasil</strong>. Eventuais disputas serão resolvidas no foro de [sua cidade].</p>

        <h2>9. Contato</h2>
        <p>Dúvidas? Envie um e-mail para: <br>
        <i class="fas fa-envelope"></i> <a href="mailto:liveclimate@vitoraugusto.pt">liveclimate@vitoraugusto.pt</a></p>

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