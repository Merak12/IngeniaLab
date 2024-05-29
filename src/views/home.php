<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/IngeniaLab/public/css/styles.css">
    <link rel="stylesheet" href="/IngeniaLab/public/css/students.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    
</head>

<body>

    <?php include '../common/sideBar.html' ?>

    <div class="main-content">
        <div class="header">
            <h1>Administrar Equipos</h1>

            <button id="openModal" class="add-button">Agregar Maquina</button>

                <?php
                
                    require_once "../machines/create-maquina.php"
                
                ?>
            
        </div>

        <div class="search-bar">
                <input type="text" placeholder="Buscar por nombre, correo, etc.">
                <button class="search-button">Buscar</button>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Nombre Máquina</th>
                    <th>Estado Actual</th>
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
                        if ($row['estado'] == 0) {
                            echo '<td> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red"  viewBox="0 0 16 16">
                            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"></path>
                          </svg></td>';
                        }
                        else if ($row['estado'] == 1) {

                            echo '<td> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"  viewBox="0 0 16 16">
                                    <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"></path>
                                    </svg>
                                </td>';

                        }
                        echo "<td>";
                        echo "<form method='POST' action=''>";
                        echo "<button onclick='event.preventDefault(); showDetailsModal(" . $row['id'] . ");' class='details-button'>Detalles</button>";
                        echo "<button type='button' class='edit-button' onclick='editMachine(" . $row['id'] . ");'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pen' viewBox='0 0 16 16'><path d='m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z'></path></svg></button>";
                        echo "<button type='button' class='delete-button' onclick='deleteMachine(" . $row['id'] . ");'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'><path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'></path></svg> </button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";

                        
                    }
                }
                else {
                    echo "<tr><td colspan='3'>No hay equipos para mostrar.</td></tr>";
                }
                Database::disconnect();
                ?>
            </tbody>
        </table>

    </div>


    <dialog id="modal" class="modal">
        <?php include $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/views/create.php'; ?>
    </dialog>

    <script>


        function showDetailsModal(id) {
            var dialog = document.getElementById('modal');
            $.ajax({
                url: "/IngeniaLab/views/details.php",
                type: "GET",
                data: {id: id},
                success: function (data) {
                    dialog.innerHTML = data;
                    dialog.showModal();
                },
                error: function () {
                    alert('No se pudo cargar la información');
                }
            });
        }

        function editMachine(id) {
            // Lógica para manejar la edición de una máquina
            console.log("Editando máquina con ID:", id);
            // Aquí podrías redirigir al usuario a una página de edición o abrir un modal de edición
        }

        function deleteMachine(id) {
        window.location.href = '/IngeniaLab/src/machines/delete.php?id=' + id;
        }



    </script>
    <script src="/IngeniaLab/public/js/modal.js"></script>

</body>
</html>