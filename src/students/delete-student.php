<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $userId = $_POST['id'];
    $pdo = Database::connect();

    $sql = "DELETE FROM Alumnos WHERE ID = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$userId])) {
        echo "El usuario ha sido eliminado exitosamente.";
    } else {
        echo "Error al eliminar el usuario.";
    }

    Database::disconnect();
} else {
    echo "Solicitud inválida.";
}