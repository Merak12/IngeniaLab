<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['numSerie']) && !empty($_POST['nombre'])) {
    
    $pdo = Database::connect();
    $numSerie = $_POST['numSerie'];
    $nombre = $_POST['nombre'];
    $tipoM = $_POST['tipo_maquina'];
    $tiempoUsoTotal = 0.0; // Tiempo de uso total inicial.
    $estado = 0; // Estado inicial es 0.
    $func = 1;

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO Maquinas (numSerie, nombre, tipoMaquina, fechaRegistro, tiempoUso, estado, funcionamiento) VALUES(?, ?, ?, CURDATE(), 0.0, 0, 1)";
    $q = $pdo->prepare($sql);

    try {
        $q->execute(array($numSerie, $nombre, $tipoM));
        $response['success'] = true;
        $response['message'] = "Máquina agregada correctamente.";
    } catch (Exception $e) {
        $response['success'] = false;
        $response['message'] = "Error al agregar la máquina: " . $e->getMessage();
    }

    Database::disconnect();
} else {
    $response['success'] = false;
    $response['message'] = "Todos los campos son obligatorios.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
