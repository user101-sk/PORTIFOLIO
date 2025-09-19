<?php
$chave_secreta = "6Lf7WGUrAAAAAECy8-MELNlW9nhjH8TOethYxBm9";

if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
    
    $resposta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$chave_secreta&response=$captcha");
    $resultado = json_decode($resposta);

    if ($resultado->success) {
        // CAPTCHA válido – prosseguir com login ou cadastro
        echo "CAPTCHA verificado com sucesso!";
    } else {
        // CAPTCHA inválido
        echo "Falha na verificação do CAPTCHA.";
    }
} else {
    echo "CAPTCHA não foi preenchido.";
}
?>
