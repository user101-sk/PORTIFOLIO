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

    $posicao = $_POST['posicao'] ?? '';
    $textoPrincipal = $_POST['texto_principal'] ?? '';
    $textoDestaque = $_POST['texto_destaque'] ?? '';

    $stmt = $conn->prepare("INSERT INTO dicas_sustentaveis (posicao, texto_principal, texto_destaque) VALUES (?, ?, ?)");
    $stmt->execute([$posicao, $textoPrincipal, $textoDestaque]);

    header("Location: admin-dashboard.php");
    exit;

} catch (PDOException $e) {
    echo "Erro ao adicionar dica: " . $e->getMessage();
}
?>
