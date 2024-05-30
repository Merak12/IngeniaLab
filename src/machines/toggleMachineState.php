<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $curState = $_POST['estado_actual']; // '1' para encender, '0' para apagar

    $pdo = Database::connect();
    $query = $pdo->prepare("UPDATE Maquinas SET estado = ? WHERE ID = ?");

    if ($curState == 1)
        $query->execute([0, $id]);
    else
        $query->execute([1, $id]);

    Database::disconnect();

}

header('Location: /TC2005B_602_01/IngeniaLab/src/views/home.php'); // Ajusta esta ruta
exit();
?>
