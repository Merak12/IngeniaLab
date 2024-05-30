<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $userId = $_POST['id'];
    $pdo = Database::connect();

    // Verifica si el ID existe en la base de datos
    $checkSql = "SELECT COUNT(*) FROM Alumnos WHERE ID = ?";
    $checkStmt = $pdo->prepare($checkSql);
    $checkStmt->execute([$userId]);
    $count = $checkStmt->fetchColumn();

    if ($count == 0) {
        echo "Error: El usuario con ID $userId no existe.";
    } else {
        $sql = "DELETE FROM Alumnos WHERE ID = ?";
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute([$userId])) {
            echo "El usuario ha sido eliminado exitosamente.";
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Error al eliminar el usuario. Código de error: " . $errorInfo[0] . " - " . $errorInfo[2];
        }
    }

    Database::disconnect();
} else {
    echo "Solicitud inválida.";
}