<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/TC2005B_602_01/IngeniaLab/config/database.php';

// Obtener conexión a la base de datos
$pdo = Database::connect();

// Ruta para eliminar eventos de la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = intval($data['id']);

    if ($id > 0) {
        $pdo = Database::connect();
        $sql = "DELETE FROM Reservas_maquina WHERE ID = ?";
    $data = json_decode(file_get_contents('php://input'), true);

    $day = $data['day'];
    $month = $data['month'];
    $year = $data['year'];
    $motivo = $data['motivo'];

    // Preparar la sentencia SQL
    $sql = "DELETE FROM Reservas_maquina WHERE DAY(fechaInicio) = ? AND MONTH(fechaInicio) = ? AND YEAR(fechaInicio) = ? AND motivo_uso = ?";

    try {
        // Preparar la sentencia
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$day, $month, $year, $motivo]);

        echo "Evento eliminado correctamente";
    } catch (PDOException $e) {
        echo "Error al eliminar evento: " . $e->getMessage();
    }
}

$pdo = null;
?>
