<?php
require 'libs/PHPMailer/src/PHPMailer.php';
require 'libs/PHPMailer/src/SMTP.php';
require 'libs/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Receber os dados
$nome = $_POST['nome'];
$email = $_POST['email'];
$relatorio = $_POST['relatorio'];

// Verificação de envio diário
$limite_por_dia = 1;
$data_hoje = date("Y-m-d");

try {
    // Conexão PDO
    $pdo = new PDO("mysql:host=localhost;dbname=vitoraug_PAP_2025", "vitoraug_vitor", "Vi1be2ma3@");

    // Verifica se o email já enviou hoje
    $stmt = $pdo->prepare("SELECT total FROM envios WHERE email = ? AND data = ?");
    $stmt->execute([$email, $data_hoje]);
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado && $resultado['total'] >= $limite_por_dia) {
        header("Location: feedback.php?msg=Você já enviou 1 relatório hoje. Tente novamente amanhã.");
        exit;
    }

    // Atualiza ou insere no banco
    if ($resultado) {
        $stmt = $pdo->prepare("UPDATE envios SET total = total + 1 WHERE email = ? AND data = ?");
        $stmt->execute([$email, $data_hoje]);
    } else {
        $stmt = $pdo->prepare("INSERT INTO envios (email, data, total) VALUES (?, ?, 1)");
        $stmt->execute([$email, $data_hoje]);
    }

    // Envio dos e-mails com PHPMailer
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'mail.vitoraugusto.pt';
    $mail->SMTPAuth = true;
    $mail->Username = 'liveclimate@vitoraugusto.pt';
    $mail->Password = 'Vi1be2ma3@';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
 // EU N AGUENTO MAIS
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('liveclimate@vitoraugusto.pt', 'Live Climate');

    // E-mail para você
    $mail->addAddress('liveclimate@vitoraugusto.pt');
    $mail->Subject = "Novo relatório de $nome";
    $mail->Body = "Nome: $nome\nEmail: $email\n\nRelatório:\n$relatorio";
    $mail->send();

    // E-mail para o usuário
    $mail->clearAddresses();
    $mail->addAddress($email, $nome);
    $mail->Subject = "Obrigado pelo seu relatório!";
    $mail->Body = "Olá $nome,\n\nMuito obrigado(a) pelo seu tempo e por compartilhar seu Feedback.
Se foi elogio, fico felizão! Se foi crítica, agradeço demais pela sinceridade. Se foi só um comentário aleatório, saiba que foi muito bem-vindo também.\n\nEquipe Live Climate";
    $mail->send();

    header("Location: feedback.php?msg=Relatório enviado com sucesso!");
    exit;

} catch (Exception $e) {
    error_log("Erro PHPMailer: {$mail->ErrorInfo}");
    header("Location: feedback.php?msg=Erro ao enviar relatório.");
    exit;
} catch (PDOException $e) {
    error_log("Erro DB: " . $e->getMessage());
    header("Location: feedback.php?msg=Erro no banco de dados.");
    exit;
}
?>
