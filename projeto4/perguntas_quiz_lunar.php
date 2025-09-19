<!DOCTYPE html>
<html lang="pt">
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perguntas Quiz Lunar | Live Climate</title>
  <link rel="stylesheet" href="/_site/css/perguntas_quiz_lunar.css">
  <style>
    .btn-nav {
      display: flex;
      justify-content: space-between;
      margin-top: 20px;
    }
    
    .progress-container {
      width: 40vh;
      background-color: #f3f3f3;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    
    .progress-bar {
      height: 10px;
      background-color: #4CAF50;
      border-radius: 5px;
      width: 0%;
      transition: width 0.3s;
    }
  </style>
</head>
<body>
  <div class="particle-background"></div>
  
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

  <div class="conteudo2">
         <!-- Navbar -->


  <!-- Conteúdo -->
<main>
  <div class="quiz-wrapper">
    <div id="page-counter">1/10</div>
    <div class="progress-container">
      <div class="progress-bar" id="progress-bar"></div>
    </div>

    <!-- Cartão único para pergunta + opções -->
    <div class="quiz-card" id="quiz-card">
      <div class="quiz-question-wrapper">
        <div class="info">
          <span class="question" id="question">Pergunta 1</span>
        </div>
      </div>

      <div class="radio-input">
        <div class="option">
          <input type="radio" id="opt1" name="answer">
          <label for="opt1" id="label1" data-index="1">Eclipse Lunar</label>
        </div>

        <div class="option">
          <input type="radio" id="opt2" name="answer">
          <label for="opt2" id="label2" data-index="2">Opção 2</label>
        </div>

        <div class="option">
          <input type="radio" id="opt3" name="answer">
          <label for="opt3" id="label3" data-index="3">Opção 3</label>
        </div>

        <div class="result success" id="success">Correto!</div>
        <div class="result error" id="error">Errado!</div>

        <div class="btn-nav">
          <button id="prev-btn" onclick="prevQuestion()" disabled>⬅ Anterior</button>
          <button id="next-btn" onclick="nextQuestion()">Próxima ➡</button>
        </div>
      </div>
    </div>
    
    <!-- Tela de resultados -->
    <div class="quiz-completed" id="quiz-completed">
      <h2>Quiz Concluído!</h2>
      <div class="score-display" id="score-display"></div>
      <button class="restart-btn" onclick="restartQuiz()">Refazer Quiz</button>
    </div>
  </div>
</main>
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
document.addEventListener('DOMContentLoaded', function() {
    const background = document.querySelector('.particle-background');
    const particleCount = Math.min(100, Math.floor(window.innerWidth / 5));

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        
        // Tamanho entre 1px e 3px
        const size = Math.random() * 2 + 1;
        particle.style.width = `${size}px`;
        particle.style.height = `${size}px`;
        
        // Posição inicial aleatória na tela visível
        particle.style.left = `${Math.random() * 100}%`;
        particle.style.top = `${Math.random() * 150}%`;
        
        // Animação com duração variada
        const duration = Math.random() * 15 + 10;
        const delay = Math.random() * -5; // Começa em momentos diferentes
        particle.style.animation = `float-up ${duration}s linear ${delay}s infinite`;
        
        background.appendChild(particle);
    }
});
    let currentQuestion = 1;
    const totalQuestions = 10;
    let score = 0;
    let userAnswers = Array(totalQuestions).fill(null);

    const questionText = document.getElementById("question");
    const label1 = document.querySelector("label[for='opt1']");
    const label2 = document.querySelector("label[for='opt2']");
    const label3 = document.querySelector("label[for='opt3']");
    const pageCounter = document.getElementById("page-counter");
    const successMsg = document.querySelector(".result.success");
    const errorMsg = document.querySelector(".result.error");
    const prevBtn = document.getElementById("prev-btn");
    const nextBtn = document.getElementById("next-btn");
    const quizCard = document.getElementById("quiz-card");
    const quizCompleted = document.getElementById("quiz-completed");
    const scoreDisplay = document.getElementById("score-display");
    const progressBar = document.getElementById("progress-bar");

 const questions = [
  {
    question: "Qual é a fase da Lua visível durante um eclipse lunar?",
    options: ["Lua Nova", "Lua Cheia", "Lua Veloz"],
    correctIndex: 1
  },
  {
    question: "Qual destas é uma característica da superfície lunar?",
    options: ["Tem rios", "É completamente lisa", "Tem crateras"],
    correctIndex: 2
  },
  {
    question: "Qual é o nome do primeiro homem a pisar na Lua?",
    options: ["Neil Armstrong", "Buzz Aldrin", "Yuri Gagarin"],
    correctIndex: 0
  },
  {
    question: "Em que ano foi o primeiro pouso tripulado na Lua?",
    options: ["1959", "1969", "1972"],
    correctIndex: 1
  },
  {
    question: "Qual é o nome da missão que levou o homem à Lua pela primeira vez?",
    options: ["Apollo 11", "Sputnik 1", "Soyuz 1"],
    correctIndex: 0
  },
  {
    question: "Por que vemos sempre o mesmo lado da Lua?",
    options: ["Ela não gira", "Ela gira mais rápido que a Terra", "Está em rotação sincronizada com a Terra"],
    correctIndex: 2
  },
  {
    question: "Como se chama a parte escura da Lua visível da Terra?",
    options: ["Marés Lunares", "Mares Lunares", "Terras Negras"],
    correctIndex: 1
  },
  {
    question: "A Lua tem atmosfera?",
    options: ["Sim, como a da Terra", "Sim, mas muito fina", "Não, quase nenhuma"],
    correctIndex: 2
  },
  {
    question: "Quantos dias aproximadamente a Lua demora para dar uma volta completa à Terra?",
    options: ["27 dias", "365 dias", "7 dias"],
    correctIndex: 0
  },
  {
    question: "Como se chama o fenómeno em que a Lua parece maior no horizonte?",
    options: ["Lua Azul", "Ilusão Lunar", "Superlua"],
    correctIndex: 1
  }
];

    function loadQuestion() {
      const q = questions[currentQuestion - 1];
      questionText.textContent = q.question;
      label1.textContent = q.options[0];
      label2.textContent = q.options[1];
      label3.textContent = q.options[2];
      document.getElementById("opt1").value = 0;
      document.getElementById("opt2").value = 1;
      document.getElementById("opt3").value = 2;
      pageCounter.textContent = `${currentQuestion}/${totalQuestions}`;
      
      // Atualizar barra de progresso
      progressBar.style.width = `${(currentQuestion / totalQuestions) * 100}%`;

      // Restaurar resposta selecionada anteriormente, se existir
      const previousAnswer = userAnswers[currentQuestion - 1];
      if (previousAnswer !== null) {
        document.getElementById(`opt${previousAnswer + 1}`).checked = true;
      } else {
        document.querySelectorAll('input[name="answer"]').forEach(input => {
          input.checked = false;
        });
      }

      // Ativar/desativar botões de navegação
      prevBtn.disabled = currentQuestion === 1;
      nextBtn.textContent = currentQuestion === totalQuestions ? "Finalizar" : "Próxima ➡";

      // Resetar feedback visual
      document.querySelectorAll('input[name="answer"]').forEach((input) => {
        input.disabled = false;
        const label = document.querySelector(`label[for='${input.id}']`);
        label.classList.remove("correct", "wrong");
      });

      successMsg.classList.remove("show");
      errorMsg.classList.remove("show");
    }

    function checkAnswer() {
      const selected = document.querySelector('input[name="answer"]:checked');
      if (!selected) return false;
      
      const selectedValue = parseInt(selected.value);
      const correctIndex = questions[currentQuestion - 1].correctIndex;
      
      // Armazenar resposta do usuário
      userAnswers[currentQuestion - 1] = selectedValue;
      
      // Verificar se acertou e atualizar pontuação
      if (selectedValue === correctIndex && userAnswers[currentQuestion - 1] !== null) {
        score++;
      }
      
      // Mostrar feedback visual
      document.querySelectorAll('input[name="answer"]').forEach((input) => {
        input.disabled = true;
        const label = document.querySelector(`label[for='${input.id}']`);
        if (parseInt(input.value) === correctIndex) {
          label.classList.add("correct");
        } else if (input.checked) {
          label.classList.add("wrong");
        }
      });

      if (selectedValue === correctIndex) {
        successMsg.classList.add("show");
      } else {
        errorMsg.classList.add("show");
      }
      
      return true;
    }

    function nextQuestion() {
      // Verificar se há resposta selecionada antes de avançar
      if (!document.querySelector('input[name="answer"]:checked') && userAnswers[currentQuestion - 1] === null) {
        alert("Por favor, selecione uma resposta antes de continuar.");
        return;
      }
      
      // Se não tiver verificado a resposta ainda, verifique
      if (userAnswers[currentQuestion - 1] === null) {
        checkAnswer();
      }
      
      if (currentQuestion < totalQuestions) {
        currentQuestion++;
        loadQuestion();
      } else {
        // Quiz completo - mostrar resultados
        showResults();
      }
    }

    function prevQuestion() {
      if (currentQuestion > 1) {
        currentQuestion--;
        loadQuestion();
      }
    }

    function showResults() {
      // Calcular pontuação final
      let finalScore = 0;
      userAnswers.forEach((answer, index) => {
        if (answer === questions[index].correctIndex) {
          finalScore++;
        }
      });
      
      // Mostrar tela de resultados
      quizCard.style.display = "none";
      quizCompleted.style.display = "block";
      
      // Exibir pontuação
      scoreDisplay.innerHTML = `
        <p>Você acertou <strong>${finalScore} de ${totalQuestions}</strong> perguntas!</p>
        <p>${getFeedbackMessage(finalScore)}</p>
      `;
    }

    function getFeedbackMessage(score) {
      const percentage = (score / totalQuestions) * 100;
      
      if (percentage >= 80) {
        return "Excelente! Você realmente conhece bem a Lua! 🌕";
      } else if (percentage >= 60) {
        return "Bom trabalho! Você sabe bastante sobre a Lua. 🌖";
      } else if (percentage >= 40) {
        return "Não foi mal! Continue aprendendo sobre a Lua. 🌗";
      } else {
        return "Você pode melhorar! Que tal estudar mais sobre a Lua? 🌘";
      }
    }

    function restartQuiz() {
      // Resetar quiz
      currentQuestion = 1;
      score = 0;
      userAnswers = Array(totalQuestions).fill(null);
      
      // Mostrar quiz novamente
      quizCard.style.display = "block";
      quizCompleted.style.display = "none";
      
      // Recarregar primeira pergunta
      loadQuestion();
    }

    // Inicializar quiz
    loadQuestion();

    // Adicionar eventos aos radio buttons
    document.querySelectorAll('input[name="answer"]').forEach((input) => {
      input.addEventListener("change", () => {
        checkAnswer();
      });
    });

    // Controle do Menu
    const menuToggle = document.getElementById('menu-toggle');
    const sideMenu = document.getElementById('side-menu');           
    menuToggle.addEventListener('click', () => {
      sideMenu.classList.toggle('ativo'); 
    });
    
    // Controle do Scroll
    window.addEventListener('scroll', () => {
      if (window.scrollY > 100) {
        document.body.classList.add('scrollado');
      } else {
        document.body.classList.remove('scrollado');
      }
    });

    // Controle do Menu Flutuante
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