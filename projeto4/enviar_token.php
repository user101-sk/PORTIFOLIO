<?php
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';
require 'libs/PHPMailer/src/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;

// Fuso horário correto
date_default_timezone_set('Europe/Lisbon');

$pdo = new PDO("mysql:host=localhost;dbname=vitoraug_PAP_2025", "vitoraug_vitor", "Vi1be2ma3@");

$email = $_POST['email'];

$stmt = $pdo->prepare("SELECT * FROM utilizadores WHERE email = ?");
$stmt->execute([$email]);
$utilizadores = $stmt->fetch();

if ($utilizadores) {
    $token = bin2hex(random_bytes(32));

    $stmt = $pdo->prepare("UPDATE utilizadores SET token_recuperacao = ?, token_expira = ? WHERE email = ?");
    $stmt->execute([$token, $expira, $email]);

    $link = "https://vitoraugusto.pt/nova_senha.php?token=$token";

    // Envia e-mail com PHPMailer
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'mail.vitoraugusto.pt';
    $mail->SMTPAuth = true;
    $mail->Username = 'liveclimate@vitoraugusto.pt';
    $mail->Password = 'Vi1be2ma3@';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->setFrom('liveclimate@vitoraugusto.pt', 'Live Climate');
    $mail->addAddress($email);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = 'redefinição de senha';
    $mail->Body = "Olá, clique no link abaixo para redefinir sua senha:\n$link";
    $mail->send();
}

header("Location: auth.php?msg=Se o e-mail existir, enviamos o link de redefinição.");
exit;
?>
