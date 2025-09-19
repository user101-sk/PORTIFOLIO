<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <title>Autenticação | Live Climate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="/_site/css/auth.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<header class="header">
  <nav class="menu-completo">
    <div class="logo-container">
      <a href="/" class="menu-logo"> <!-- Adicione esta tag <a> -->
        <img src="/_site/img/logo.png" alt="Logo da Empresa" />
      </a>
    </div>
  </nav>
</header>
  <!-- Container Principal -->
  <main class="auth-container">

    <!-- Card de Login -->
<div class="auth-card" id="loginCard">
    <div class="auth-card">
      
      <h2>Login</h2>
      <form class="auth-form" id="loginForm" method="POST" action="login.php">
   <div class="form-group">
    <label for="loginEmail">E-mail:</label>
    <input type="email" id="loginEmail" name="email" required>
    <div class="error-message" id="emailError">E-mail inválido</div>
  </div>
        
        <div class="form-group">
    <label for="loginPassword">Senha:</label>
    <input type="password" id="loginPassword" name="senha" required minlength="6">
    <div class="error-message" id="passwordError">Mínimo 6 caracteres</div>
  </div>
  
  
<div id="auth-error" class="error-message show" style="display: none;">
  <img id="error-gif" src="/_site/img/ops.gif" alt="Erro" style="height: 40px; vertical-align: middle; margin-right: 10px;">
  <span id="error-text"></span>
</div>
          
          
  <button type="submit"><i class="fas fa-sign-in-alt"></i> Entrar</button>

        
        <div class="auth-links">
            <p>Não tem uma conta? <a href="#" onclick="mostrarRegistro()">Registre-se</a></p>
          <a href="esqueci_senha.php" id="forgotPassword">Esqueceu a senha?</a>
        </div>
      </form>
    </div>
    </div>

    <!-- Card de Registro -->
     <div class="auth-card" id="registerCard" style="display:none;">
    <div class="auth-card">
      <h2>Registrar</h2>
      <form action="register.php" method="POST" class="auth-form" id="registerForm">
        <div class="form-group">
          <label for="regName">Nome Completo:</label>
          <input type="text" id="regName" required>
          <div class="error-message" id="nameError">Campo obrigatório</div>
        </div>
        
        <div class="form-group">
          <label for="regEmail">E-mail:</label>
          <input type="email" id="regEmail" required>
          <div class="error-message" id="regEmailError">E-mail inválido</div>
        </div>
        
        <div class="form-group">
          <label for="regPassword">Senha:</label>
          <input type="password" id="regPassword" required minlength="6">
          <div class="error-message" id="regPasswordError">Mínimo 6 caracteres</div>
        </div>
        
        <div class="form-group">
          <label for="regConfirm">Confirmar Senha:</label>
          <input type="password" id="regConfirm" required>
          <div class="error-message" id="confirmError">Senhas não coincidem</div>
        </div>
         <div class="g-recaptcha" 
         data-sitekey="6LcSkGorAAAAAFIOmIi277m8A0llp6OO-lo8E8tY"
         data-theme="dark"
        
        style="margin: 0 auto; display: table;"></div>

        <button type="submit"><i class="fas fa-user-plus"></i> Criar Conta</button>
        
        <div class="auth-links">
            <p>Já tem uma conta? <a href="#" onclick="mostrarLogin()">Fazer Login</a></p>
          <p>Ao registrar, você concorda com nossos <a href="termos_de_uso.php">Termos</a>.</p>
        </div>
      </form>
    </div>
    </div>
  </main>

  <footer class="site-footer">

  <!-- Copyright -->
  <div class="copyright">
    <p>&copy; 2025 Live Climate. Todos os direitos reservados.</p>
    <div class="legal-links">
      <a href="Politica_de_Privacidade.php">Política de Privacidade</a>
          <a href="termos_de_uso.php">Termos de Uso</a>
      <a href="Mapa_do_Site.php">Mapa do Site</a>
      <p>
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
function mostrarRegistro() {
  document.getElementById('loginCard').style.display = 'none';
  document.getElementById('registerCard').style.display = 'block';
}

function mostrarLogin() {
  document.getElementById('registerCard').style.display = 'none';
  document.getElementById('loginCard').style.display = 'block';
}

document.addEventListener('DOMContentLoaded', function () {
    
    // Validação de email
    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Funções auxiliares de erro
    function showError(errorId, inputId) {
        document.getElementById(errorId).style.display = 'block';
        document.getElementById(inputId).classList.add('invalid');
    }

    function resetErrors() {
        document.querySelectorAll('.error-message').forEach(el => {
            el.style.display = 'none';
        });
        document.querySelectorAll('input').forEach(el => {
            el.classList.remove('invalid');
        });
    }

    // Validação em tempo real para todos os inputs
    document.querySelectorAll('input').forEach(input => {
        input.addEventListener('input', function() {
            this.classList.remove('invalid');
            const errorId = this.id + 'Error';
            if (document.getElementById(errorId)) {
                document.getElementById(errorId).style.display = 'none';
            }
        });
    });

    // ============== FORMULÁRIO DE LOGIN ==============
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('loginEmail');
    const passwordInput = document.getElementById('loginPassword');

    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const email = emailInput.value.trim();
        const password = passwordInput.value;

        resetErrors();
        
        let isValid = true;
        if (!validateEmail(email)) {
            showError('emailError', 'loginEmail');
            isValid = false;
        }

        if (password.length < 6) {
            showError('passwordError', 'loginPassword');
            isValid = false;
        }

        if (!isValid) return;

        // Mostrar loading
        const submitButton = loginForm.querySelector('button[type="submit"]');
        submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Entrando...';
        submitButton.disabled = true;

        fetch('login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: `email=${encodeURIComponent(email)}&senha=${encodeURIComponent(password)}`
        })
        .then(res => res.json())
        
.then(data => {
    const errorBox = document.getElementById('auth-error');
    const errorText = document.getElementById('error-text');
    const errorGif = document.getElementById('error-gif');

    if (data.success) {
        window.location.href = data.redirect || 'perfil.php';
    } else {
        errorText.textContent = data.error || 'Credenciais inválidas';

        errorGif.src = '/_site/img/ops.gif';

        errorBox.style.display = 'flex';
        errorBox.style.alignItems = 'center';
    }
})

        .catch(error => {
            alert('Erro de conexão com o servidor');
        })
        .finally(() => {
            submitButton.innerHTML = '<i class="fas fa-sign-in-alt"></i> Entrar';
            submitButton.disabled = false;
        });
    });

    // ============== FORMULÁRIO DE REGISTRO ==============
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const name = document.getElementById('regName').value;
        const email = document.getElementById('regEmail').value;
        const password = document.getElementById('regPassword').value;
        const confirm = document.getElementById('regConfirm').value;
        
        resetErrors();
        
        let isValid = true;
        if (name.trim() === '') {
            showError('nameError', 'regName');
            isValid = false;
        }
        
        if (!validateEmail(email)) {
            showError('regEmailError', 'regEmail');
            isValid = false;
        }
        
        if (password.length < 6) {
            showError('regPasswordError', 'regPassword');
            isValid = false;
        }
        
        if (password !== confirm) {
            showError('confirmError', 'regConfirm');
            isValid = false;
        }
        
        if (isValid) {
                 //QUI
        const captchaResponse = grecaptcha.getResponse();
        if (!captchaResponse) {
            alert("Por favor, resolva o CAPTCHA.");
            return;
        }
        
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Registrando...';
            submitButton.disabled = true;
            
            fetch('register.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                
                //body: `nome=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&senha=${encodeURIComponent(password)}`

                body: `nome=${encodeURIComponent(name)}&email=${encodeURIComponent(email)}&senha=${encodeURIComponent(password)}&g-recaptcha-response=${encodeURIComponent(captchaResponse)}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.success);
                    mostrarLogin();
                } else {
                    alert(data.error || 'Erro ao registrar');
                }
            })
            .catch(error => {
                alert('Erro de conexão com o servidor');
            })
            .finally(() => {
                submitButton.innerHTML = '<i class="fas fa-user-plus"></i> Criar Conta';
                submitButton.disabled = false;
            });
        }
    });

    // ============== OUTRAS FUNCIONALIDADES ==============
    // Link "Esqueceu a senha"
    //document.getElementById('forgotPassword').addEventListener('click', function(e) {
    //  e.preventDefault();
    //alert('Funcionalidade de recuperação de senha será implementada em breve!');
    //});

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
});
</script>
  
</body>
</html>