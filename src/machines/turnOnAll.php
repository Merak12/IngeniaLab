<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';
$pdo = Database::connect();
$sql = 'UPDATE Maquinas SET estado = 1';
$pdo->query($sql);
Database::disconnect();
echo "Todas las máquinas han sido encendidas.";

header("Location: /TC2005B_602_01/IngeniaLab/src/views/home.php");
exit;

?>
