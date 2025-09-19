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

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['id'])) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $id = (int) $_POST['id'];
        $stmt = $conn->prepare("DELETE FROM dicas_sustentaveis WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: admin-dashboard.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao eliminar a dica: " . $e->getMessage();
    }
} else {
    header("Location: admin-dashboard.php");
    exit;
}
?>
