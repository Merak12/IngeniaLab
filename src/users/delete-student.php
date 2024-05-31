<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_POST['id'];

    $pdo = Database::connect();

    $sql = "DELETE FROM Alumnos WHERE ID = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);

    Database::disconnect();
}

header("Location: /TC2005B_602_01/IngeniaLab/src/views/users.php");
exit;