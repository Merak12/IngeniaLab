<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';

$id = $_POST['id'];
$newState = $_POST['state']; // '1' para encender, '0' para apagar

$pdo = Database::connect();
$query = $pdo->prepare("UPDATE Maquinas SET estado = ? WHERE ID = ?");
$query->execute([$newState, $id]);

// if($query->rowCount() > 0) {
//     echo "Estado actualizado"; // Respuesta simple de confirmación
// } else {
//     echo "No se pudo actualizar el estado";
// }

Database::disconnect();

header('Location: /TC2005B_602_01/IngeniaLab/src/views/home.php'); // Ajusta esta ruta
exit();
?>
