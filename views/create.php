<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Agregar Máquina</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/IngeniaLab/assets/css/lab-admin-equipos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="add-form-container">
        <h2>Agregar nueva máquina</h2>
        <form id="addMachineForm" action="/IngeniaLab/src/php/insert.php" method="post">
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <input type="submit" value="Agregar máquina" class="add-button">
        </form>
    </div>
</body>
</html>


<?php
session_start();



require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

$pdo = Database::connect();

$idType = 1; // Asumiendo que sabes qué idType se debe asignar.

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['id']) && !empty($_POST['nombre'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $estado = 1; // Estado inicial es 0.
    $fechaR = "2024-03-20"; // Fecha actual.
    $tiempoUsoTotal = 0.0; // Tiempo de uso total inicial.

    $sql0 = "SELECT * FROM CRUD_Maquinas WHERE id = ?";
    $stmt = $pdo->prepare($sql0);
    $stmt->execute([$id]);
    $result = $stmt->fetchAll();

    if (count($result) > 0) {
        echo "<p>El ID ya está en uso. Por favor, elija otro.</p>";
    }
    else {

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO CRUD_Maquinas (idType, id, nombre, estado, fechaRegistro, tiempoUsoTotal) values(?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($idType, $id, $nombre, $estado, $fechaR, $tiempoUsoTotal));

    }
}
Database::disconnect();
?>
