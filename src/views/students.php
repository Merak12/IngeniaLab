<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Alumnos</title>
        <link rel="stylesheet" href="/IngeniaLab/public/css/styles.css">
        <link rel="stylesheet" href="/IngeniaLab/public/css/students.css">
        <link rel="stylesheet" href="/IngeniaLab/public/css/styleNav.css">

    </head>
    
    <body>

        <?php include '/IngeniaLab/src/common/navBar.php'; ?>

        <div class="main-content">
            <div class="header">
                <h1>Usuarios</h1>
                <button id="openModal" class="add-button">Agregar Estudiante</button>

                <?php
                
                    require "create-estudiante.php";
                
                ?>

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
                        require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';
                        $pdo = Database::connect();
                        $sql = 'SELECT ID, nombre, carrera, correo FROM Alumnos';
                        $result = $pdo->query($sql);
                        if ($result->rowCount() > 0){
                            foreach($result as $row){
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['carrera']) . "</td>";
                                echo "<td>";
                                echo "<button type='button' class='edit-button' onclick='editUser(" . $row['ID'] . ");'>Editar</button>";
                                echo "<button type='button' class='delete-button' data-id='" . $row['ID'] . "'>Eliminar</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No hay usuarios para mostrar.</td></tr>";
                        }
                        Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>

        <script src="/IngeniaLab/public/js/modal.js"></script>
        <script src="/IngeniaLab/public/js/navBar.js"></script>
        
    </body>

</html>
