<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $carrera = $_POST['carrera'];

    $pdo = Database::connect();
    $sql = 'UPDATE Alumnos SET nombre = ?, correo = ?, carrera = ? WHERE ID = ?';
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nombre, $correo, $carrera, $id])) {
        echo 'Usuario actualizado correctamente.';
    } else {
        echo 'Error al actualizar el usuario.';
    }

    Database::disconnect();
    header('Location: /IngeniaLab/src/students.php');
    exit;
}
?>
