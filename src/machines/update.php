<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

// Asegúrate de validar y limpiar todos los inputs para prevenir inyecciones SQL
$id = $_POST['ID'];
$nombre = $_POST['nombre'];
$numSerie = $_POST['numSerie'];
$tipoMaquina = $_POST['tipoMaquina'];

$pdo = Database::connect();
// Preparar la consulta SQL para actualizar los datos
$query = $pdo->prepare("UPDATE Maquinas SET nombre = ?, numSerie = ?, tipoMaquina = ? WHERE ID = ?");
$query->execute([$nombre, $numSerie, $tipoMaquina, $id]);

Database::disconnect();

// Redirigir o manejar la respuesta tras la actualización
header('Location: /IngeniaLab/src/views/home.php'); // Ajusta esta ruta
exit();
?>
