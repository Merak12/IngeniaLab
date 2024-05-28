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
    <div id="modal" class="modal">
        <div class="modal-content">
            <h2>Agregar nueva máquina</h2>
            <form id="addMachineForm" method="post">

                <div class="form-group">
                    <label for="numSerie">Número de serie: </label>
                    <input type="text" id="numSerie" name="numSerie" required>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Tipo maquina</label>

                    <select name="tipo_maquina">
                        <option value="">Selecciona tipo de maquinaria</option>
                        <?php
                            require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';
                            $pdo = Database::connect();
                            $query = 'SELECT * FROM Tipos_maquina';
                            foreach ($pdo->query($query) as $row) {
                                echo "<option value='" . $row['idType'] . "'>" . $row['tipo'] . "</option>";
                            }
                            Database::disconnect();
                        ?>
                    </select>

                </div>

                <input type="submit" value="Agregar máquina" class="add-button">

            </form>
        </div>
    </div>
    <script src="/IngeniaLab/assets/js/modal.js"></script>
</body>
</html>


<?php
// session_start();



require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

$pdo = Database::connect();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['numSerie']) && !empty($_POST['nombre'])) {

    $numSerie = $_POST['numSerie'];
    $nombre = $_POST['nombre'];
    $tipoM = $_POST['tipo_maquina'];
    $fechaR = "2024-03-20"; // Fecha actual.
    $tiempoUsoTotal = 0.0; // Tiempo de uso total inicial.
    $estado = 1; // Estado inicial es 0.
    $func = 1;

    // $sql0 = "SELECT * FROM Maquinas WHERE id = ?";
    // $stmt = $pdo->prepare($sql0);
    // $stmt->execute([$id]);
    // $result = $stmt->fetchAll();

    // if (count($result) > 0) {
    //     echo "<p>El ID ya está en uso. Por favor, elija otro.</p>";
    // }
    // else {

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Maquinas (numSerie, nombre, tipoMaquina, fechaRegistro, tiempoUso, estado, funcoinamiento) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($numSerie, $nombre, $tipoM, $fechaR, $tiempoUsoTotal, $estado, $func));

    // }
}
Database::disconnect();
?>
