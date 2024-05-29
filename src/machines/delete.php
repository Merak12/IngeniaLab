<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);

    if ($id > 0) {
        $pdo = Database::connect();
        $sql = "DELETE FROM Maquinas WHERE ID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        Database::disconnect();
    }
}

header("Location: /IngeniaLab/src/views/home.php");
exit;
?>
