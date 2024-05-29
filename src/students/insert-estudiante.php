<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

    $error_message = '';
    $success_message = '';

    $pdo = Database::connect();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $ID = $_POST['matricula'];
        $name = $_POST['name'];
        $correo = $_POST['mail'];
        $carrera = $_POST['carrera'];

        if (!empty($name) && !empty($ID) && !empty($correo) && !empty($carrera)) {

            $pdo = Database::connect();

            $sql_check = "SELECT COUNT(*) FROM Alumnos WHERE ID = ? OR correo = ?";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([$ID, $correo]);
            $user_exists = $stmt_check->fetchColumn();

            if ($user_exists > 0) {
                echo "El usuario con esa matrícula o correo ya está registrado.";
            } else {
                
                $sql_insert = "INSERT INTO Alumnos (ID, nombre, correo, carrera) VALUES (?, ?, ?, ?)";
                $stmt_insert = $pdo->prepare($sql_insert);

                if ($stmt_insert->execute([$ID, $name, $correo, $carrera])) {
                    echo "Usuario registrado exitosamente.";
                } else {
                    echo "Error al registrar el usuario.";
                }
                
            }

            Database::disconnect();
        } else {
            echo "Todos los campos son obligatorios.";
        }
    }