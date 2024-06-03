<?php

    echo "<table class='user-table' id='user-table'>";
    echo "<thead>";
        echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Correo electrónico</th>";
            echo "<th>Carrera</th>";
            echo "<th>Acciones</th>";
        echo "</tr>";
    echo "</thead>";

    echo "<tbody>";

        require_once $_SERVER['DOCUMENT_ROOT'] . '/TC2005B_602_01/IngeniaLab/config/database.php';
        $pdo = Database::connect();
        $sql = 'SELECT ID, nombre, carrera, correo FROM Alumnos';
        $result = $pdo->query($sql);
        if ($result->rowCount() > 0) {
            foreach ($result as $row) {
                echo "<tr>";

                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['carrera']) . "</td>";
                    echo "<td>";

                        echo "<div class='button-container'>";

                            echo "<button type='button' class='edit-button' onclick='openEditModal(" . json_encode($row['ID']) . ");'>Editar</button>";
                            echo "<button class='delete-button' onclick='openDeleteConfirmation(" . json_encode($row['ID']) . ")'><i class='fas fa-trash'></i> Eliminar</button>";
                        
                        echo "</div>";
                        
                    echo "</td>";

                echo "</tr>";
                
            }
        } else {
            echo "<tr><td colspan='4'>No hay usuarios para mostrar.</td></tr>";
        }
        Database::disconnect();

    echo "</tbody>";
    echo "</table>"

?>