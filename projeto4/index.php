<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Simulação Clima | Live Climate</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/_site/css/main_style.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js",></script>
</head>
<body>
    
 <div class="cosmic-bg">
        <div class="stars"></div>
        <div class="nebula"></div> <!-- Efeito de nebulosa sutil -->
    </div>
    
<header class="header" header('Content-Type: text/html; charset=utf-8');>
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
                    <?php if ($_SESSION['user_name'] === 'admin'): ?>
                <a href="testes.php">Teste Admin</a>
            <?php endif; ?>

                <a href="logout.php">Logout</a>
        <?php else: ?>
                <a href="auth.php" class="destaque">Iniciar Sessão</a>
        <?php endif; ?>
        
           <?php if ($_SESSION['user_name'] === 'admin'): ?>
        <button onclick="localStorage.clear(); location.reload();">Resetar Cookies (dev)</button>
         <?php endif; ?>
</div>
</div>
                            <!-- Fim Menu Flutuante -->
    </header>

 
<div class="pagina-container">
    <!-- Banner Esquerdo -->
<?php
header('Content-Type: text/html; charset=UTF-8');

$host = "localhost";
$user = "vitoraug_vitor";
$pass = "Vi1be2ma3@";
$dbname = "vitoraug_PAP_2025";

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
$conn->exec("SET NAMES utf8mb4");
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Banner Esquerdo
    $stmt = $conn->prepare("SELECT * FROM dicas_sustentaveis WHERE posicao = 'esquerda'");
    $stmt->execute();
    $dicas_esquerda = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <aside class="banner-lateral esquerda">
        
        <h3><i class="fas fa-leaf"></i> Dicas Sustentáveis</h3>
        <?php foreach ($dicas_esquerda as $dica): ?>
            <p><?= ($dica['texto_principal']) ?></p>
            <div class="dado-destaque">
                <p><?= ($dica['texto_destaque']) ?></p>
            </div>
        <?php endforeach; ?>
    </aside>

 
    <div class="containerc">
        <h1>Simulação do Clima</h1>

        <div class="local-select">
            <label for="localizacao">Escolhe uma localização:</label>
            <select id="localizacao">
                <option value="lisboa">Lisboa</option>
                <option value="sao_paulo">São Paulo</option>
                <option value="nova_iorque">Nova Iorque</option>
                <option value="toquio">Tóquio</option>
                <option value="reykjavik">Reykjavík</option>
                <option value="cidade_do_cabo">Cidade do Cabo</option>
                <option value="barcelona">Barcelona</option>
            </select>
            <button id="atualizar">🔄 Atualizar</button>
        </div>

        <div class="dados-clima" id="dadosClima">
            <p>Aguardando selecção...</p>
        </div>

        <canvas id="graficoTemperatura" width="600" height="300"></canvas>
    </div>

    <!-- Banner Direito -->
    <?php
    $stmt = $conn->prepare("SELECT * FROM dicas_sustentaveis WHERE posicao = 'direita'");
    $stmt->execute();
    $dicas_direita = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <aside class="banner-lateral direita">
        <h3><i class="fas fa-leaf"></i> Dicas Sustentáveis</h3>
        <?php foreach ($dicas_direita as $dica): ?>
            <p><?= ($dica['texto_principal']) ?></p>
            <div class="dado-destaque">
                <p><?= ($dica['texto_destaque']) ?></p>
            </div>
        <?php endforeach; ?>
    </aside>
</div>


  <section class="conteudo-3" id="conteudo3">
  <h2 class="titulo-secao">Exploração</h2>
  
  <div class="carrossel-container">
    <!-- Botões de navegação -->
    <button class="carrossel-btn anterior" aria-label="Slide anterior">
      <i class="fas fa-chevron-left"></i>
    </button>
    
    <div class="carrossel">
      <!-- Cards (adicione quantos quiser) -->
      <div class="card">
        <div class="card-icon"><i class="fas fa-moon"></i></div>
        <h3>Água: O Sangue da Terra</h3>
        <p>Cada gota que escorre sem cuidado é um rio que nunca voltará.
          A água que hoje evapora sob o sol é a mesma que os dinossauros beberam há milhões de anos. Nós não criamos água, apenas a emprestamos das futuras gerações. Se o ciclo da vida tem um segredo, ele se chama preservação.</p>
        <!-- Botão VISÍVEL inicialmente -->
  <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="Apenas 0,5% da água do planeta é doce e disponível para consumo humano. (ONU, 2023)">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
        </div>

      <div class="card">
        <div class="card-icon"><i class="fas fa-cloud-showers-heavy"></i></div>
        <h3>Oxigênio: A Moeda Invisível</h3>
        <p>Respirar é o primeiro ato de vida e o último. Cada folha que dança ao vento é um pulmão verde trabalhando silenciosamente para nos manter vivos. Quando uma árvore cai, não é apenas madeira que se perde – são incontáveis respiros roubados do amanhã.</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="1 hectare de floresta produz oxigênio para 800 pessoas por dia. Quantos hectares você já protegeu hoje?">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
      </div>
      
            <div class="card">
        <div class="card-icon"><i class="fas fa-tint"></i></div>
        <h3>Água: O Ouro Azul</h3>
        <p>Cada gota que escorre sem propósito é um tesouro líquido perdido. Rios não são canais, são veias da Terra. Quando secam, deixam cicatrizes no planeta e na humanidade. Sua próxima garrafa de água pode ser a última de alguém.</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="São necessários 7.000 litros de água para produzir 1 calça jeans. Quantas vezes você reutiliza as suas?">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
      </div>
      
      <div class="card">
        <div class="card-icon"><i class="fas fa-temperature-low"></i></div>
        <h3>Plantas: Os Seres Mais Generosos</h3>
        <p>Elas não falam, mas ensinam. Não correm, mas conquistam a Terra. Alimentam, curam, abrigam e ainda nos presenteiam com flores. Enquanto os humanos debatem sobre economia, as plantas já dominaram a arte da sustentabilidade há 470 milhões de anos.</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="90% dos remédios tradicionais vêm de extratos vegetais. (OMS)">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
      </div>
      
      <div class="card">
        <div class="card-icon"><i class="fas fa-temperature-low"></i></div>
        <h3>Camada de Ozônio: O Escudo Frágil</h3>
        <p>Uma fina capa de gás, mais delicada que a asa de uma borboleta, é tudo que nos separa da radiação mortal do cosmos. Quando um spray de desodorante parece inofensivo, lembre-se: foi com pequenos gestos que perfuramos nosso próprio escudo celestial.</p>
        <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="O buraco na camada de ozônio está se recuperando e pode fechar completamente até 2060, graças à proibição dos CFCs. (NASA, 2022)">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  

  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
      </div>
      
<div class="card">
        <div class="card-icon"><i class="fas fa-spider"></i></div>
        <h3>Biodiversidade: A Rede Que Nos Sustenta</h3>
        <p>Cada espécie extinta é um fio rompido no tecido da vida. Abelhas não são apenas insetos – são arquitetas da nossa comida. Quando perdemos um animal, perdemos um elo de uma corrente que nos mantém de pé.</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="1 em cada 3 garfos de comida que você leva à boca existe graças aos polinizadores. Quantos pesticidas você evitou hoje?">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
      </div>
      
<div class="card">
        <div class="card-icon"><i class="fas fa-wine-bottle"></i></div>
        <h3>Plástico: O Falso Descanso</h3>
        <p>Aquela garrafa que você usou por 5 minutos vai assombrar o planeta por 500 anos. Plástico não desaparece – apenas se fragmenta em pedaços invisíveis que voltam para seu prato, seu sangue, seu futuro.</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="1 milhão de garrafas plásticas são compradas a cada minuto no mundo. Quantas você recusou esta semana?">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
</div>

<div class="card">
        <div class="card-icon"><i class="fas fa-seedling"></i></div>
        <h3>Solo: A Pele da Terra</h3>
        <p>Debaixo dos seus pés está um universo vivo. Um punhado de terra saudável contém mais organismos que pessoas no planeta. Quando envenenamos o solo, matamos não apenas plantas, mas toda uma civilização microscópica que nos alimenta.</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="24 bilhões de toneladas de solo fértil são perdidos por ano. Quantas árvores você plantou para frear isso?">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
</div>

<div class="card">
        <div class="card-icon"><i class="fas fa-clock"></i></div>
        <h3>Crise Climática: O Relógio Que Acelera</h3>
        <p>O planeta não está esquentando – está febril. Cada grau a mais é uma catástrofe em câmera lenta. As estações já não são estações, são sinais de socorro. O futuro não é amanhã: está sendo decidido agora, no seu consumo, no seu voto, no seu silêncio.</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="Os últimos 7 anos foram os mais quentes já registrados. Quantos eletrodomésticos você desligou hoje?">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
</div>

<div class="card">
        <div class="card-icon"><i class="fas fa-cloud-showers-heavy"></i></div>
        <h3>titulo</h3>
        <p>texto principal</p>
       <button class="dado-btn" onclick="mostrarDado(this)" 
    data-dado="oculto">
    <i class="fas fa-info-circle"></i> Dado Importante
  </button>
  
  <!-- Div INVISÍVEL inicialmente -->
  <div class="dado-extra" style="display: none;"></div>
</div>

      
    </div>
    
    <button class="carrossel-btn proximo" aria-label="Próximo slide">
      <i class="fas fa-chevron-right"></i>
    </button>
  </div>
  
  <!-- Indicadores de slide -->
  <div class="carrossel-indicadores"></div>
</section>

  <section class="consciencia">
  <h2>Consciência Ambiental</h2>
  <p>🌎 Pequenas ações no dia a dia fazem uma grande diferença para a atmosfera e o clima. Reduz o consumo de plástico, economiza energia, e apoia práticas sustentáveis!</p>
</section>

 <div id="avisoSimulacao" class="popup-simulacao">
  <div class="popup-conteudo">
    <h2>ℹ️ Aviso Importante</h2>
    <p>Este site é uma <strong class="destaque-azul">simulação</strong> criada para fins educativos. Os dados apresentados são <strong class="destaque-azul">meramente ilustrativos</strong> e não representam informações meteorológicas reais.</p>
    <button id="fecharAviso">Entendi</button>
  </div>
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
<p><i class="fas fa-user-astronaut"></i> <strong class="destaque-azul">Desenvolvido por:</strong> Vitor Augusto Siqueira</p>
<p><i class="fas fa-school"></i> <strong class="destaque-azul">Profissional:</strong> Tecnico de Informática-sistemas</p>
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
  <!-- Pop-up de Cookies -->
<div class="popup-cookie" id="popupCookie">
  <div class="popup-conteudo2">
    <p>🌕 <strong class="destaque-azul">Olá, explorador!</strong> Nosso site usa cookies para melhorar sua experiência. Ao continuar, você concorda com nossa <a href="Politica_de_Privacidade.php">Política de Privacidade</a>.</p>
    <div class="popup-botoes">
      <button class="popup-btn" id="btnAceitar">Aceitar</button>
      <button class="popup-btn" id="btnRecusar">Recusar</button>
    </div>
  </div>
</div>




  <script>
  // script.js
document.addEventListener('DOMContentLoaded', () => {
    const cosmicBg = document.querySelector('.cosmic-bg');
    
    // Adiciona partículas móveis
    for (let i = 0; i < 50; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        // Posição e tamanho aleatórios
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 100}%`;
        particle.style.width = `${Math.random() * 20}px`;
        particle.style.height = particle.style.width;
        particle.style.opacity = Math.random() * 0.5;
        
        // Animação única para cada partícula
        particle.style.animation = `float ${5 + Math.random() * 15}s linear infinite`;
        
        cosmicBg.appendChild(particle);
    }
});



document.addEventListener('DOMContentLoaded', function() {
  // Elementos do DOM
  const popupCookie = document.getElementById('popupCookie');
  const btnAceitar = document.getElementById('btnAceitar');
  const btnRecusar = document.getElementById('btnRecusar');
  
  // Verifica o status atual com fallback seguro
  const cookieStatus = localStorage.getItem('cookieConsent');
  console.log('Status atual do cookie:', cookieStatus); // Para debug

  // Configuração inicial do popup
  popupCookie.style.display = 'none'; // Garante que comece oculto

  // Verifica se deve mostrar o popup
  if (cookieStatus === null || cookieStatus === undefined || cookieStatus === '') {
    console.log('Mostrando popup para novo usuário...');
    setTimeout(() => {
      popupCookie.style.display = 'block';
    }, 3000);
  }

  // Evento de aceitação
  btnAceitar.addEventListener('click', function() {
    console.log('Usuário aceitou os cookies');
    localStorage.setItem('cookieConsent', 'accepted');
    // Adiciona timestamp para controle
    localStorage.setItem('cookieConsentTimestamp', Date.now().toString());
    popupCookie.style.display = 'none';
    
    // Aqui você pode adicionar a inicialização dos cookies de terceiros, se necessário
  });

  // Evento de recusa
  btnRecusar.addEventListener('click', function() {
    console.log('Usuário recusou os cookies');
    localStorage.setItem('cookieConsent', 'rejected');
    localStorage.setItem('cookieConsentTimestamp', Date.now().toString());
    popupCookie.style.display = 'none';
    
    // Aqui você pode bloquear os cookies de terceiros, se necessário
  });

  // Verificação extra de segurança
  window.addEventListener('storage', function(event) {
    if (event.key === 'cookieConsent') {
      console.log('Status de cookie alterado em outra aba:', event.newValue);
      if (event.newValue === 'accepted' || event.newValue === 'rejected') {
        popupCookie.style.display = 'none';
      }
    }
  });
});

const dadosSimulados = {
  lisboa: {
    cidade: "Lisboa",
    previsao: [
      {
        dia: "Hoje",
        temperaturaMax: 25,
        temperaturaMin: 18,
        humidade: 60,
        precipitacao: "0 mm (sem chuva)",
        qualidadeAr: "Boa",
        qualidadeAgua: "Excelente",
        ozono: "Estável"
      },
      {
        dia: "Amanhã",
        temperaturaMax: 26,
        temperaturaMin: 19,
        humidade: 58,
        precipitacao: "2 mm (chuva fraca)",
        qualidadeAr: "Moderada",
        qualidadeAgua: "Excelente",
        ozono: "Estável"
        
      },
      {
        dia: "Depois de amanhã",
        temperaturaMax: 27,
        temperaturaMin: 20,
        humidade: 65,
        precipitacao: "5 mm (chuva moderada)",
        qualidadeAr: "Boa",
        qualidadeAgua: "Boa",
        ozono: "Reduzida"
      }
    ],
    alerta: "Respirar ar puro faz bem à saúde e reduz doenças respiratórias.",
    variacaoTemperatura: [18, 19, 21, 22, 24, 26, 25, 23, 21]
  },
  
  sao_paulo: {
    cidade: "São Paulo",
    previsao: [
      {
        dia: "Hoje",
        temperaturaMax: 31,
        temperaturaMin: 25,
        humidade: 70,
        precipitacao: "1 mm (posivel chuva)",
        qualidadeAr: "Moderada",
        qualidadeAgua: "Razoável",
        ozono: "Levemente reduzida"
      },
      {
        dia: "Amanhã",
        temperaturaMax: 30,
        temperaturaMin: 24,
        humidade: 72,
        precipitacao: "8 mm (chuva forte)",
        qualidadeAr: "Ruim",
        qualidadeAgua: "Razoável",
        ozono: "Baixa"
      },
      {
        dia: "Depois de amanhã",
        temperaturaMax: 28,
        temperaturaMin: 22,
        humidade: 68,
        precipitacao: "0 mm (céu limpo)",
        qualidadeAr: "Boa",
        qualidadeAgua: "Boa",
        ozono: "Recuperação lenta"
      }
    ],
    alerta: "Evita actividades físicas intensas ao ar livre durante picos de poluição.",
    variacaoTemperatura: [25, 26, 28, 30, 31, 30, 29, 27, 24]
  },barcelona: {
  cidade: "Barcelona",
  previsao: [
    {
      dia: "Hoje",
      temperaturaMax: 22,
      temperaturaMin: 17,
      humidade: 55,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Excelente",
      ozono: "Estável",
      vento: 9
    },
    {
      dia: "Amanhã",
      temperaturaMax: 24,
      temperaturaMin: 18,
      humidade: 58,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Excelente",
      ozono: "Reduzida",
      vento: 10
    },
    {
      dia: "Depois de amanhã",
      temperaturaMax: 31,
      temperaturaMin: 21,
      humidade: 65,
      precipitacao: "1 mm (chuva leve)",
      qualidadeAr: "Moderada",
      qualidadeAgua: "Boa",
      ozono: "Estável",
      vento: 12
    }
  ],
  alerta: "Aproveita o bom tempo, mas protege-te dos raios UV.",
  variacaoTemperatura: [17, 18, 20, 22, 24, 27, 30, 31, 20]
},cidade_do_cabo: {
  cidade: "Cidade do Cabo",
  previsao: [
    {
      dia: "Hoje",
      temperaturaMax: 26,
      temperaturaMin: 19,
      humidade: 35,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Razoável",
      ozono: "Estável",
      vento: 10
    },
    {
      dia: "Amanhã",
      temperaturaMax: 28,
      temperaturaMin: 20,
      humidade: 65,
      precipitacao: "8 mm (chuva forte)",
      qualidadeAr: "Moderada",
      qualidadeAgua: "Boa",
      ozono: "Baixa",
      vento: 20
    },
    {
      dia: "Depois de amanhã",
      temperaturaMax: 25,
      temperaturaMin: 18,
      humidade: 40,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Razoável",
      ozono: "Estável",
      vento: 14
    }
  ],
  alerta: "A água é um recurso escasso — utiliza com consciência!",
  variacaoTemperatura: [18, 19, 20, 22, 24, 26, 28, 25, 20]
},reykjavik: {
  cidade: "Reykjavík",
  previsao: [
    {
      dia: "Hoje",
      temperaturaMax: 3,
      temperaturaMin: -1,
      humidade: 70,
      precipitacao: "1 mm (neve leve)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Boa",
      ozono: "Estável",
      vento: 15
    },
    {
      dia: "Amanhã",
      temperaturaMax: 1,
      temperaturaMin: -4,
      humidade: 28,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Excelente",
      ozono: "Estável",
      vento: 12
    },
    {
      dia: "Depois de amanhã",
      temperaturaMax: 0,
      temperaturaMin: -5,
      humidade: 60,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Boa",
      ozono: "Estável",
      vento: 35
    }
  ],
  alerta: "Protege-te contra o frio intenso e ventos fortes.",
  variacaoTemperatura: [-5, -4, -2, 0, 1, 2, 3, 2, -1]
},
 toquio: {
  cidade: "Tóquio",
  previsao: [
    {
      dia: "Hoje",
      temperaturaMax: 34,
      temperaturaMin: 28,
      humidade: 60,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Boa",
      ozono: "Estável",
      vento: 10
    },
    {
      dia: "Amanhã",
      temperaturaMax: 36,
      temperaturaMin: 29,
      humidade: 78,
      precipitacao: "2 mm (chuva leve)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Boa",
      ozono: "Reduzida",
      vento: 12
    },
    {
      dia: "Depois de amanhã",
      temperaturaMax: 33,
      temperaturaMin: 27,
      humidade: 85,
      precipitacao: "0 mm (sem chuva)",
      qualidadeAr: "Boa",
      qualidadeAgua: "Excelente",
      ozono: "Estável",
      vento: 14
    }
  ],
  alerta: "Fica atento a mudanças rápidas no tempo durante o verão japonês.",
  variacaoTemperatura: [27, 28, 30, 32, 34, 36, 35, 33, 30]
},
  nova_iorque: {
    cidade: "Nova Iorque",
    previsao: [
      {
        dia: "Hoje",
        temperaturaMax: 17,
        temperaturaMin: 10,
        humidade: 55,
        precipitacao: "3 mm (chuva leve)",
        qualidadeAr: "Boa",
        qualidadeAgua: "Boa",
        ozono: "Estável"
      },
      {
        dia: "Amanhã",
        temperaturaMax: 20,
        temperaturaMin: 12,
        humidade: 52,
        precipitacao: "0 mm (sem chuva)",
        qualidadeAr: "Boa",
        qualidadeAgua: "Excelente",
        ozono: "Estável"
      },
      {
        dia: "Depois de amanhã",
        temperaturaMax: 22,
        temperaturaMin: 14,
        humidade: 60,
        precipitacao: "1 mm (possibilidade de chuva à noite)",
        qualidadeAr: "Moderada",
        qualidadeAgua: "Boa",
        ozono: "Estável"
      }
    ],
    alerta: "Conservar água e energia ajuda a proteger o ambiente e a nossa saúde.",
    variacaoTemperatura: [10, 12, 14, 15, 16, 15, 13, 11, 8]
  }
};

    const select = document.getElementById("localizacao");
    const btnAtualizar = document.getElementById("atualizar");
    const divDados = document.getElementById("dadosClima");
    const ctx = document.getElementById("graficoTemperatura").getContext("2d");

    let grafico;
function gerarMensagemAmbiental(dia) {
  // Verifica condições específicas para associar uma mensagem
  if (dia.qualidadeAr.toLowerCase().includes("ruim")) {
    return "🚫 Evita queimar lixo ou usar carros desnecessariamente. Cada ação conta para melhorar a qualidade do ar.";
  }

  if (dia.precipitacao.toLowerCase().includes("chuva forte")) {
    return "💧 Recolher água da chuva é uma forma inteligente de poupar e preservar recursos hídricos.";
  }

  if (dia.ozono.toLowerCase().includes("baixa") || dia.ozono.toLowerCase().includes("reduzida")) {
    return "🧴 Usa protetor solar mesmo em dias nublados. A camada de ozono está enfraquecida.";
  }

  if (dia.qualidadeAgua.toLowerCase().includes("razoável")) {
    return "🚿 Evita o desperdício de água potável. Cada gota importa para o equilíbrio ambiental.";

  }
  if (dia.temperaturaMax >= 30) {
  return "🔥 Altas temperaturas aumentam o risco de incêndios florestais. Evita fazer fogueiras ou queimar lixo ao ar livre.";
}
if (dia.temperaturaMin <= 5) {
  return "❄️ Temperaturas baixas exigem atenção especial com aquecimento. Usa energia de forma eficiente e segura.";
}
if (dia.vento && dia.vento >= 30) {
  return "🌬️ Ventos fortes podem causar quedas de árvores ou danos. Mantém-te atento às previsões e protege espaços exteriores.";
}
if (dia.humidade <= 30) {
  return "💨 O ar seco pode afetar a respiração. Hidrata-te bem e evita esforços físicos prolongados.";
}
if (dia.humidade >= 80) {
  return "🌫️ Humidade alta favorece mofo e desconforto. Ventila bem os espaços e evita acumular roupas húmidas.";
}
if (
  dia.precipitacao.toLowerCase().includes("sem chuva") &&
  dia.qualidadeAr.toLowerCase().includes("boa") &&
  dia.ozono.toLowerCase().includes("estável")
) {
  return "🌞 Hoje o clima está ideal! Aproveita para caminhar, andar de bicicleta ou plantar uma árvore.";
}
  // Mensagem padrão caso nada crítico esteja presente
  return "🌱 Pequenas ações como reciclar e poupar energia ajudam a proteger a atmosfera e o clima.";
}
    
function mostrarDados(local) {
  const dados = dadosSimulados[local];
  function interpolarTemperaturas(originais) {
  const total = 24;
  const resultado = Array(total).fill(null);

  const passo = Math.floor(total / (originais.length - 1));
  
  for (let i = 0; i < originais.length - 1; i++) {
    const inicio = i * passo;
    const fim = (i + 1) * passo;
    const delta = (originais[i + 1] - originais[i]) / passo;

    for (let j = 0; j < passo; j++) {
      resultado[inicio + j] = +(originais[i] + delta * j).toFixed(1);
    }
  }

  // Preenche o último valor
  resultado[23] = originais[originais.length - 1];

  return resultado;
}

const temperaturasInterpoladas = interpolarTemperaturas(dados.variacaoTemperatura);


let previsaoHTML = `<h2>Clima em ${dados.cidade}</h2>`;
dados.previsao.forEach(dia => {
  let tema = "neutro";
  let icone = `<i class="fas fa-cloud icone-tempo"></i>`; // padrão

  if (dia.precipitacao.includes("sem chuva")) {
    tema = "sol";
    icone = `<i class="fas fa-sun icone-tempo"></i>`;
  } else if (dia.precipitacao.includes("chuva fraca") || dia.precipitacao.includes("chuva leve")) {
    tema = "nublado";
    icone = `<i class="fas fa-cloud-sun icone-tempo"></i>`;
  } else if (dia.precipitacao.includes("chuva forte") || dia.precipitacao.includes("moderada")) {
    tema = "chuva";
    icone = `<i class="fas fa-cloud-showers-heavy icone-tempo"></i>`;
  }

  const mensagem = gerarMensagemAmbiental(dia);

previsaoHTML += `
  <div class="previsao-card ${tema}">
    ${icone}
    <div class="previsao-info">
      <h3>${dia.dia}</h3>
      <ul>
        <li><strong>Temperatura:</strong> ${dia.temperaturaMin}°C - ${dia.temperaturaMax}°C</li>
        <li><strong>Humidade:</strong> ${dia.humidade}%</li>
        <li><strong>Precipitação:</strong> ${dia.precipitacao}</li>
        <li><strong>Qualidade do ar:</strong> ${dia.qualidadeAr}</li>
        <li><strong>Qualidade da água:</strong> ${dia.qualidadeAgua}</li>
        <li><strong>Camada de ozono:</strong> ${dia.ozono}</li>
      </ul>
      <p style="font-size:0.9em; color:#ffffff; margin-top:10px;">♻️ <em>${mensagem}</em></p>
    </div>
  </div>
`;
});

  previsaoHTML += `
    <div class="alerta">
      ⚠️ <em>${dados.alerta}</em>
    </div>
  `;
  divDados.innerHTML = previsaoHTML;

  const horas = Array.from({ length: 24 }, (_, i) => `${i.toString().padStart(2, '0')}h`);


  if (grafico) grafico.destroy();

  grafico = new Chart(ctx, {
    type: "line",
    data: {
      labels: horas,
      datasets: [{
        label: "Temperatura ao longo do dia (°C)",
        data: temperaturasInterpoladas,
        borderColor: "#00ffff",
        backgroundColor: "rgba(0, 255, 255, 0.1)",
        fill: true,
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { labels: { color: "#fff" } }
      },
      scales: {
        x: { ticks: { color: "#ccc" } },
        y: { ticks: { color: "#ccc" } }
      }
    }
  });
}

    // Atualiza ao mudar ou clicar
    select.addEventListener("change", () => mostrarDados(select.value));
    btnAtualizar.addEventListener("click", () => mostrarDados(select.value));
    

    // Inicializa com Lisboa
    mostrarDados("lisboa");
    adicionarNuvens();
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
             adicionarAnimacaoChuva();
             adicionarNuvens();
        });

        const mensagens = [
  "🌍 Reduzir as emissões é proteger o nosso futuro.",
  "💧 Conservar água ajuda a preservar os nossos ecossistemas.",
  "🌬️ A qualidade do ar afeta diretamente a nossa saúde.",
  "☀️ Usar energias renováveis é investir num planeta limpo.",
  "🌱 Plantar uma árvore hoje é respirar melhor amanhã."
];

// Aviso de simulação
window.addEventListener('load', () => {
  const popup = document.getElementById("avisoSimulacao");
  const fechar = document.getElementById("fecharAviso");

  fechar.addEventListener("click", () => {
    popup.style.display = "none";
  });
});

  document.addEventListener('DOMContentLoaded', () => {
    const carrossel = document.querySelector('.carrossel');
    const cards = document.querySelectorAll('.card');
    const btnAnterior = document.querySelector('.anterior');
    const btnProximo = document.querySelector('.proximo');
    const indicadores = document.querySelector('.carrossel-indicadores');
    let currentIndex = 0;

    // Cria indicadores
    cards.forEach((_, index) => {
      const indicador = document.createElement('span');
      indicador.addEventListener('click', () => pularParaCard(index));
      indicadores.appendChild(indicador);
    });

    // Atualiza carrossel
    function atualizarCarrossel() {
      const cardWidth = cards[0].offsetWidth + 20; // Largura do card + gap
      carrossel.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
      
      // Atualiza indicadores
      document.querySelectorAll('.carrossel-indicadores span').forEach((span, index) => {
        span.classList.toggle('ativo', index === currentIndex);
      });
    }

    // Navegação
    btnProximo.addEventListener('click', () => {
      if (currentIndex < cards.length - 1) {
        currentIndex++;
        atualizarCarrossel();
      }
    });

    btnAnterior.addEventListener('click', () => {
      if (currentIndex > 0) {
        currentIndex--;
        atualizarCarrossel();
      }
    });

    function pularParaCard(index) {
      currentIndex = index;
      atualizarCarrossel();
    }

    // Toque para mobile
    let touchStartX = 0;
    let touchEndX = 0;

    carrossel.addEventListener('touchstart', (e) => {
      touchStartX = e.changedTouches[0].screenX;
    });

    carrossel.addEventListener('touchend', (e) => {
      touchEndX = e.changedTouches[0].screenX;
      handleSwipe();
    });

    function handleSwipe() {
      if (touchEndX < touchStartX && currentIndex < cards.length - 1) {
        currentIndex++; // Swipe para esquerda
      } else if (touchEndX > touchStartX && currentIndex > 0) {
        currentIndex--; // Swipe para direita
      }
      atualizarCarrossel();
    }

    // Inicializa
    atualizarCarrossel();
  });
function mostrarDado(botao) {
  const dado = botao.getAttribute('data-dado');

  // Remover overlay antigo, se existir
  const existente = document.getElementById("overlayDado");
  if (existente) existente.remove();

  // Criar overlay
  const overlay = document.createElement("div");
  overlay.id = "overlayDado";
  overlay.style.position = "fixed";
  overlay.style.top = "0";
  overlay.style.left = "0";
  overlay.style.width = "100%";
  overlay.style.height = "100%";
  overlay.style.backgroundColor = "rgba(0, 0, 0, 0.6)";
  overlay.style.display = "flex";
  overlay.style.justifyContent = "center";
  overlay.style.alignItems = "center";
  overlay.style.zIndex = "9999";

  // Caixa de estilo igual aos cards
  const caixa = document.createElement("div");
  caixa.className = "caixa-dado";
  caixa.style.background = "rgba(26, 41, 128, 0.9)";
  caixa.style.borderRadius = "15px";
  caixa.style.padding = "25px";
  caixa.style.boxShadow = "0 8px 20px rgba(0, 0, 0, 0.3)";
  caixa.style.border = "1px solid #3c256e";
  caixa.style.maxWidth = "400px";
  caixa.style.color = "#f5f3ce";
  caixa.style.textAlign = "center";
  caixa.style.fontSize = "1rem";
  caixa.style.animation = "fadeInOverlay 0.3s ease";
  caixa.innerHTML = `<p style="color: #bdc3c7;">${dado}</p>`;

  // Impede fechar ao clicar no texto
  caixa.addEventListener("click", (e) => e.stopPropagation());

  overlay.appendChild(caixa);

  // Fecha ao clicar fora da caixa
 overlay.addEventListener("click", () => {
  const caixa = overlay.querySelector(".caixa-dado");
  caixa.style.animation = "fadeOutOverlay 0.3s ease forwards";

  // Espera a animação terminar antes de remover
  setTimeout(() => {
    overlay.remove();
  }, 300); // mesmo tempo da animação
});

  document.body.appendChild(overlay);
}

function adicionarAnimacaoChuva() {
  // pega todos os cards com classe "chuva"
  document.querySelectorAll('.previsao-card.chuva').forEach(card => {
    // evita duplicação
    if (card.querySelector('.gota')) return;

    for (let i = 0; i < 25; i++) {
      const gota = document.createElement('div');
      gota.classList.add('gota');
      gota.style.left = `${Math.random() * 100}%`;
      gota.style.top = `${Math.random() * 100}%`;
      gota.style.animationDelay = `${Math.random() * 2}s`;
      card.appendChild(gota);
    }
  });
}

function adicionarAnimacaoChuva() {
  const cards = document.querySelectorAll('.previsao-card.chuva');
  cards.forEach(card => {
    // Evita duplicar gotas
    if (card.querySelector('.gota')) return;

    for (let i = 0; i < 30; i++) {
      const gota = document.createElement('div');
      gota.classList.add('gota');
      gota.style.left = `${Math.random() * 100}%`;
      gota.style.animationDelay = `${Math.random() * 2}s`;
      card.appendChild(gota);
    }
  });
}

function adicionarNuvens() {
  const cards = document.querySelectorAll('.previsao-card.nublado');
  cards.forEach(card => {
    if (card.querySelector('.nuvem')) return;

    for (let i = 0; i < 4; i++) {
      const nuvem = document.createElement('div');
      nuvem.classList.add('nuvem');
      
      // Tamanho aleatório
      nuvem.style.width = `${40 + Math.random() * 60}px`;
      nuvem.style.height = `${20 + Math.random() * 30}px`;
      
      // Posiciona no lado esquerdo (fora da tela) com altura aleatória
      nuvem.style.left = `-100px`;
      nuvem.style.top = `${10 + Math.random() * 70}%`;
      
      // Velocidade e tempo de início variados
      nuvem.style.animationDelay = `${Math.random() * 5}s`;
      nuvem.style.animationDuration = `${15 + Math.random() * 15}s`;
      
      card.appendChild(nuvem);
    }
  });
}
  </script>
</body>
</html>
