<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/TC2005B_602_01/IngeniaLab/config/database.php';
    $pdo = Database::connect();
    $sql = 'SELECT * FROM Maquinas';
    $result = $pdo->query($sql);
    if ($result->rowCount() > 0) {

        foreach ($result as $row) {
            echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                if ($row['estado'] == 1) {
                    echo '<td> <i class="fas fa-lightbulb"></i> Encendido</td>';
                } else if ($row['estado'] == 0) {
                    echo '<td> <i class="far fa-lightbulb"></i> Apagado</td>';
                }
                echo "<td>";

                    echo "<div class='button-container'>";

                        echo "<form method='POST' action='/TC2005B_602_01/IngeniaLab/src/machines/toggleMachineState.php'>";

                        if ($row['estado'] == 0) {
                            echo "<button type='submit' class='power-on-button' data-id='" . ($row['ID']) . "')'><i class='fas fa-power-off'></i> Encender</button>";
                        }
                        else {
                            echo "<button type='submit' class='power-off-button' data-id='" . ($row['ID']) . "')'><i class='fas fa-power-off'></i> Apagar</button>";
                        }

                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['ID']) . "'>";
                            echo "<input type='hidden' name='estado_actual' value='" . htmlspecialchars($row['estado']) . "'>";

                        echo "</form>";
                        
                        echo "<button class='edit-button' onclick='event.preventDefault(); showDetailsModal(" . $row['ID'] . ");'><i class='fas fa-info-circle'></i> Detalles</button>";
                        echo "<button class='details-button' onclick='event.preventDefault(); editModal(" . $row['ID'] . ");'> <i class='far fa-edit'></i> Editar</button>";
                        
                        echo "<form method='POST' action='../machines/delete.php' onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar esta máquina?\");'>";
                            echo "<button type='submit' class='delete-button' data-id='" . ($row['ID']) . "'><i class='fas fa-trash'></i> Eliminar</button>";
                            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row['ID']) . "'>";
                        echo "</form>";

                    echo "<div>";

                echo "</td>";
            echo "</tr>";
        }

    } else {
        echo "<tr><td colspan='3'>No hay equipos para mostrar.</td></tr>";
    }
    Database::disconnect();
?>