<?php
session_start();
if (!isset($_SESSION['user_email']) || $_SESSION['user_email'] !== 'admin@admin.pt') {
    header("Location: index.php");
    exit;
}

$host = "localhost";
$user = "vitoraug_vitor";
$pass = "Vi1be2ma3@";
$dbname = "vitoraug_PAP_2025";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $conn->exec("SET NAMES utf8mb4");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['dicas']) && is_array($_POST['dicas'])) {
        foreach ($_POST['dicas'] as $dica) {
            $stmt = $conn->prepare("UPDATE dicas_sustentaveis SET posicao = :posicao, texto_principal = :texto_principal, texto_destaque = :texto_destaque WHERE id = :id");
            $stmt->execute([
                ':posicao' => $dica['posicao'],
                ':texto_principal' => $dica['texto_principal'],
                ':texto_destaque' => $dica['texto_destaque'],
                ':id' => $dica['id']
            ]);
        }
    }

    header("Location: admin-dashboard.php"); // ou onde quiseres voltar
    exit;

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
