<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id > 0) {
        $pdo = Database::connect();
        $sql = "SELECT * FROM Maquinas WHERE ID = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $machine = $stmt->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();

        if ($machine) {
            echo "<p><strong>Número de serie:</strong> " . htmlspecialchars($machine['numSerie']) . "</p>";
            echo "<p><strong>Nombre:</strong> " . htmlspecialchars($machine['nombre']) . "</p>";
            echo "<p><strong>Tipo de Máquina:</strong> " . htmlspecialchars($machine['tipoMaquina']) . "</p>";
            echo "<p><strong>Fecha de Registro:</strong> " . htmlspecialchars($machine['fechaRegistro']) . "</p>";
            echo "<p><strong>Tiempo de Uso:</strong> " . htmlspecialchars($machine['tiempoUso']) . "</p>";
            echo "<p><strong>Estado:</strong> " . htmlspecialchars($machine['estado']) . "</p>";
            echo "<p><strong>Funcionamiento:</strong> " . htmlspecialchars($machine['funcionamiento']) . "</p>";
        } else {
            echo "<p>No se encontraron detalles para esta máquina.</p>";
        }
    }
}
?>
