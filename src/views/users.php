<?php

    session_start();

    if (!isset($_SESSION['idType']) || $_SESSION['idType'] != 3) {
        header("Location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>

    <link rel="stylesheet" href="../../public/css/styles.css"> 
    <link rel="stylesheet" href="../../public/css/users.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</head>

<body>

    <?php include '../common/sideBar.html' ?>

    <div class="main-content">
        <div class="header">

            <h1>Usuarios</h1>
            <button class="open-modal-btn add-button" data-modal="addStudentModal">Agregar Estudiante</button>
            <button type="button" onclick="location.href='/TC2005B_602_01/IngeniaLab/src/views/register.php'">Registrar Administrador o Maestro</button>
            

        </div>

        <div class="search-bar">
            <input type="text" placeholder="Buscar por nombre, correo, etc.">
            <button class="search-button">Buscar</button>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'] . '/TC2005B_602_01/IngeniaLab/config/database.php';
                $pdo = Database::connect();
                $sql = 'SELECT ID, nombre, carrera, correo FROM Alumnos';
                $result = $pdo->query($sql);
                if ($result->rowCount() > 0) {
                    foreach ($result as $row) {
                        echo "<tr data-id='" . htmlspecialchars($row['ID']) . "'>";
                        echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['carrera']) . "</td>";
                        echo "<td>";
                        echo "<div class='button-container'>";
                        echo "<button type='button' class='edit-button' onclick='openEditModal(" . json_encode($row['ID']) . ");'>Editar</button>";
                        echo "<form method='POST' action='../users/delete-student.php' onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar esta máquina?\");'>";
                        echo "<button type='submit' class='delete-button' data-id='" . ($row['ID']) . "'><i class='fas fa-trash'></i> Eliminar</button>";
                        echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['ID']) . "'>";
                        echo "</form>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No hay usuarios para mostrar.</td></tr>";
                }
                Database::disconnect();
                ?>
            </tbody>
        </table>
    </div>

    <?php require "../users/create-estudiante.php"; ?>
    <?php require "../users/edit.php"; ?>

    <script src="/TC2005B_602_01/IngeniaLab/public/js/modal.js"></script>

</body>

</html>
