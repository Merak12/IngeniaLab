<?php

    session_start();

    if (!isset($_SESSION['idType']) || $_SESSION['idType'] != 3) {
        header("Location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/TC2005B_602_01/IngeniaLab/public/css/styles.css">
    <link rel="stylesheet" href="/TC2005B_602_01/IngeniaLab/public/css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <style>

        .machine-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
            padding: 20px;
        }

        .machine-card {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }

        .card-buttons button {
            margin: 10px;
            padding: 10px 20px;
        }

        .machine-card h3 {
            margin-top: 0;
        }

        .machine-card p {
            color: #666;
            font-size: 16px;
        }


    </style>

</head>
<body>
    <?php include '../common/sideBar.html'; ?>

    <div class="main-content">
        <div class="header">
            <h1>Administrar Equipos</h1>
            <button class="open-modal-btn add-button" data-modal="addMachineModal">Añadir nueva maquina</button>
        </div>

        <div class="machine-grid">
            <?php
            require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';
            $pdo = Database::connect();
            $sql = 'SELECT * FROM Maquinas';
            foreach ($pdo->query($sql) as $row) {
                echo "<div class='machine-card'>";
                echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
                echo "<p>" . ($row['estado'] ? '<i class="fas fa-lightbulb"></i> Encendido' : '<i class="far fa-lightbulb"></i> Apagado') . "</p>";
                echo "<div class='card-buttons'>";
                // Botones para encender, apagar, editar y eliminar
                echo "<form method='POST' action='../machines/toggleMachineState.php'>";
                echo "<button type='submit' class='" . ($row['estado'] ? "power-off-button" : "power-on-button") . "'><i class='fas fa-power-off'></i> " . ($row['estado'] ? "Apagar" : "Encender") . "</button>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['ID']) . "'>";
                echo "<input type='hidden' name='estado_actual' value='" . htmlspecialchars($row['estado']) . "'>";
                echo "</form>";
                echo "<button class='edit-button'> <i class='far fa-edit'></i> Editar</button>";
                echo "<form method='POST' action='../machines/delete.php' onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar esta máquina?\");'>";
                echo "<button type='submit' class='delete-button'><i class='fas fa-trash'></i> Eliminar</button>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['ID']) . "'>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
            Database::disconnect();
            ?>
        </div>
    </div>

    <?php include '../machines/create.php'; ?>
    <?php include '../machines/details.php'; ?>
    <?php include '../machines/edit.php'; ?>

    <script src="../../public/js/modal.js"></script>
</body>
</html>
