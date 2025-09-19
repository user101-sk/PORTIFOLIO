<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = intval($_POST["id"]);

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=vitoraug_PAP_2025", "vitoraug_vitor", "Vi1be2ma3@");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("DELETE FROM utilizadores WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: admin_utilizadores.php");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao apagar o utilizador: " . $e->getMessage();
    }
} else {
    header("Location: admin_utilizadores.php");
    exit();
}
