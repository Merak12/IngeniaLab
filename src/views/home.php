<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/IngeniaLab/public/css/styles.css">
    <link rel="stylesheet" href="/IngeniaLab/public/css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</head>

<body>

    <?php include '../common/sideBar.html'; ?>

    <div class="main-content">
        <div class="header">
            <h1>Administrar Equipos</h1>
            <button class="open-modal-btn add-button" data-modal="addMachineModal">Añadir nueva maquina</button>
        </div>

        <div>
            <button>boton</button>
            <button>boton</button>
        </div>

        <div class="search-bar">
            <input type="text" placeholder="Buscar por nombre, correo, etc.">
            <button class="search-button">Buscar</button>
        </div>

        <table class="user-table">
            <thead>
                <tr>
                    <th>Nombre Máquina</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';
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

                            if ($row['estado'] == 0) {
                                echo "<button type='button' class='power-on-button' onclick='toggleMachineState(" . $row['ID'] . ", 1)'><i class='fas fa-power-off'></i> Encender</button>";
                            }
                            else {
                                echo "<button type='button' class='power-off-button' onclick='toggleMachineState(" . $row['ID'] . ", 0)'><i class='fas fa-power-off'></i> Apagar</button>";
                            }  
                            
                            echo "<button class='edit-button' onclick='event.preventDefault(); showDetailsModal(" . $row['ID'] . ");'><i class='fas fa-info-circle'></i> Detalles</button>";
                            echo "<button class='details-button' onclick='event.preventDefault(); editModal(" . $row['ID'] . ");'>Editar</button>";
                            
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
            </tbody>
        </table>
    </div>

    <?php include '../machines/create.php'; ?>
    <?php include '../machines/details.php'; ?>
    <?php include '../machines/edit.php'; ?>

    <script src="../../public/js/modal.js"></script>
    
    <script>
function toggleMachineState(machineId, newState) {
    $.ajax({
        url: '../machines/toggleMachineState.php', // Asegúrate de que esta URL sea correcta
        type: 'POST',
        data: { id: machineId, state: newState },
        success: function(response) {
            alert('Estado de la máquina actualizado.');
            // Opcional: actualizar la interfaz de usuario aquí, por ejemplo, recargar parte de la tabla
        },
        error: function() {
            alert('Error al cambiar el estado de la máquina.');
        }
    });
}
</script>



</body>
</html>
