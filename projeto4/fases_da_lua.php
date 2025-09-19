
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fases da Lua | Live Climate</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="/_site/css/fases_da_lua.css">
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
    
  <main class="main-content">
    <div class="moon-container" onclick="togglePhases()">
      <div class="moon"></div>
      <div id="moon-description-overlay" class="hidden">
  <p id="moon-description-text"></p>
</div>
<div class="moon-phases hidden">
  <button data-description="A Lua Nova marca o início do ciclo lunar, quando a Lua não é visível da Terra."><span class="emoji">🌑</span><span class="tooltip">Lua Nova</span></button>
  <button data-description="A fase em que a Lua começa a crescer, mas ainda aparece como um fino arco."><span class="emoji">🌒</span><span class="tooltip">Crescente Côncava</span></button>
  <button data-description="A Lua está a meio caminho para ficar cheia, metade dela está visível."><span class="emoji">🌓</span><span class="tooltip">Quarto Crescente</span></button>
  <button data-description="Mais de metade da Lua é visível, mas ainda não está cheia."><span class="emoji">🌔</span><span class="tooltip">Crescente Convexa</span></button>
  <button data-description="A Lua Cheia ocorre quando a face da Lua está completamente iluminada."><span class="emoji">🌕</span><span class="tooltip">Lua Cheia</span></button>
  <button data-description="A Lua começa a minguar, mas ainda está maioritariamente visível."><span class="emoji">🌖</span><span class="tooltip">Minguante Convexa</span></button>
  <button data-description="Apenas metade da Lua é visível novamente, mas agora está a decrescer."><span class="emoji">🌗</span><span class="tooltip">Quarto Minguante</span></button>
  <button data-description="Última fase antes da Lua desaparecer novamente."><span class="emoji">🌘</span><span class="tooltip">Minguante Côncava</span></button>
</div>  

  </main>
<div class="containerg">
    <h1><i class="fas fa-moon"></i> Informações Lunares</h1>

    <!-- Seção 1 -->
    <section>
      <h2><i class="fas fa-flask"></i> Dados Científicos</h2>
      <div class="card">
        <ul>
          <li><strong>Composição:</strong> Crosta rica em silicatos, manto com olivina e pequeno núcleo metálico.</li>
          <li><strong>Gravidade:</strong> Apenas 16.6% da gravidade terrestre (1.62 m/s²).</li>
          <li><strong>Temperaturas:</strong> Extremas (-173°C à noite / +127°C durante o dia).</li>
          <li><strong>Rotação síncrona:</strong> Período orbital = período rotacional (27.3 dias).</li>
          <li><strong>Fases lunares:</strong> Ciclo completo a cada 29.5 dias (mês sinódico).</li>
          <li><strong>Influência nas marés:</strong> Força gravitacional 2.2x maior que a do Sol.</li>
        </ul>
      </div>
    </section>

    <!-- Seção 2 - Glossário -->
    <section>
      <h2><i class="fas fa-book-open"></i> Glossário Lunar</h2>
      <div class="card">
        <table class="glossary-table">
          <thead>
            <tr>
              <th>Termo</th>
              <th>Definição</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Albedo</strong></td>
              <td>Refletividade da superfície lunar (média de 0.12 - muito baixa).</td>
            </tr>
            <tr>
              <td><strong>Apogeu</strong></td>
              <td>Ponto orbital mais distante da Terra (~405,500 km).</td>
            </tr>
            <tr>
              <td><strong>Perigeu</strong></td>
              <td>Ponto orbital mais próximo (~363,300 km).</td>
            </tr>
            <tr>
              <td><strong>Maria Lunar</strong></td>
              <td>Planícies basálticas escuras formadas por erupções vulcânicas antigas.</td>
            </tr>
            <tr>
              <td><strong>Rególito</strong></td>
              <td>Camada de poeira e fragmentos rochosos que cobre toda a superfície.</td>
            </tr>
            <tr>
              <td><strong>Lua Azul</strong></td>
              <td>Segunda lua cheia em um mesmo mês civil (ocorre a cada 2-3 anos).</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- Seção 3 -->
    <section>
      <h2><i class="fas fa-history"></i> Marcos Históricos</h2>
      <div class="card">
        <ul>
          <li><strong>1609:</strong> Galileu Galilei faz as primeiras observações telescópicas detalhadas.</li>
          <li><strong>1959:</strong> Luna 2 (URSS) é o primeiro objeto humano a atingir a Lua.</li>
          <li><strong>1969:</strong> Apollo 11 - Neil Armstrong e Buzz Aldrin pisam na superfície.</li>
          <li><strong>2024:</strong> Programa Artemis da NASA planeia regresso com equipe diversificada.</li>
          <li><strong>Fato crucial:</strong> A Lua afasta-se 3.8 cm/ano devido à transferência de energia de maré.</li>
        </ul>
      </div>
    </section>

    <!-- Seção 4 -->
    <section>
      <h2><i class="fas fa-cloud-sun-rain"></i> Influência Climática</h2>
      <div class="card">
        <ul>
          <li><strong>Marés oceânicas:</strong> Modulam correntes marinhas que regulam o clima global.</li>
          <li><strong>Iluminação noturna:</strong> Afeta comportamentos de espécies noturnas.</li>
          <li><strong>Ciclos agrícolas:</strong> Tradições de plantio por fases lunares (eficácia controversa).</li>
          <li><strong>Pesquisa atual:</strong> Estudos investigam correlações entre fases lunares e padrões de chuva.</li>
        </ul>
      </div>
    </section>
  </div>
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
            if (window.scrollY > 10) {
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
        // Mostrar descrição na lua
        function togglePhases() {
  const container = document.querySelector('.moon-container');
  const phases = document.querySelector('.moon-phases');

  container.classList.toggle('show-phases');
  phases.classList.toggle('hidden');
}

// Mostrar descrição na lua
document.querySelectorAll('.moon-phases button').forEach(button => {
  button.addEventListener('click', e => {
    e.stopPropagation();

    const description = button.getAttribute('data-description');
    const overlay = document.getElementById('moon-description-overlay');
    const text = document.getElementById('moon-description-text');

    text.textContent = description;
    overlay.classList.remove('hidden');

    // Opcional: esconder descrição após alguns segundos
    setTimeout(() => {
      overlay.classList.add('hidden');
    }, 7000); // 7 segundos
  });
});

// Controle da seta
function showArrow(targetElement) {
  const arrow = document.getElementById('seta-indicativa');
  
  // Posiciona a seta relativa ao elemento alvo
  if(targetElement) {
    const rect = targetElement.getBoundingClientRect();
    arrow.style.left = `${rect.left + rect.width/2}px`;
    arrow.style.bottom = `${window.innerHeight - rect.top + 20}px`;
  }

  // Mostra/Esconde periodicamente
  let visible = true;
  setInterval(() => {
    arrow.style.opacity = visible ? 1 : 0;
    visible = !visible;
  }, 4000);

  // Remove após clique
  arrow.addEventListener('click', () => {
    arrow.classList.add('hidden');
  });
}

// Inicia a animação (passe o elemento alvo como parâmetro)
window.addEventListener('load', () => {
  // Exemplo: apontar para a Lua
  const moonContainer = document.querySelector('.moon-container');
  showArrow(moonContainer);
});
    </script>
    
</body>
</html>