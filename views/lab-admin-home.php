<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Equipos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/IngeniaLab/assets/css/lab-admin-equipos.css">
    <link rel="stylesheet" href="/IngeniaLab/assets/css/styles.css">
    <link rel="stylesheet" href="/IngeniaLab/assets/css/styleNav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>

<script src="/IngeniaLab/assets/js/navbar"></script>
<nav class="navbar">
        <ul class="navbar-nav">

            <li class="logo">
                <a href="#" class="nav-link">
                    <span class="link-text">Laboratorios de Ingeniería</span>
                </a>
            </li>


            <li class="navbar-item">
                <a id="inicio" href="/IngeniaLab/views/lab-admin-home.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              style="margin:0 30px 0 20px" bi bi-house" viewBox="0 0 16 16">
              <path
                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z">
              </path>
            </svg>
                    <span class="link-text">Inicio</span>
                
                </a>
            

            </li>


            <li class="navbar-item">
                <a id="equipos" href="/IngeniaLab/views/lab-admin-equipos.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    style="margin:0 30px 0 20px" viewBox="0 0 16 16">
                    <path
                      d="M11.5 2a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5m-10 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zm0 2a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1zM5 3a1 1 0 0 0-1 1h-.5a.5.5 0 0 0 0 1H4v1h-.5a.5.5 0 0 0 0 1H4a1 1 0 0 0 1 1v.5a.5.5 0 0 0 1 0V8h1v.5a.5.5 0 0 0 1 0V8a1 1 0 0 0 1-1h.5a.5.5 0 0 0 0-1H9V5h.5a.5.5 0 0 0 0-1H9a1 1 0 0 0-1-1v-.5a.5.5 0 0 0-1 0V3H6v-.5a.5.5 0 0 0-1 0zm0 1h3v3H5zm6.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z">
                    </path>
                    <path
                      d="M1 2a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-2H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 9H1V8H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6H1V5H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 2zm1 11a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1z">
                    </path>
                  </svg>
                    <span class="link-text">Equipos</span>
                </a>
            </li>


            <li class="navbar-item">
                <a id="usuarios" href="/IngeniaLab/views/lab-admin-users.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    style="margin:0 30px 0 20px" viewBox="0 0 16 16">
                    <path
                      d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4">
                    </path>
                  </svg>
                    <span class="link-text">Usuarios</span>
                </a>
            </li>


            <li class="navbar-item">
                <a id="reporte" href="/IngeniaLab/views/lab-admin-reporte.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              style="margin:0 30px 0 20px" viewBox="0 0 16 16">
              <path
                d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z">
              </path>
            </svg>
                    <span class="link-text">Generar Reportes</span>
                </a>
            </li>


            <li class="navbar-item">
                <a id="cerrarSesion" href="/IngeniaLab/views/index.php" class="nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              style="margin:20px 30px 0 20px" viewBox="0 0 16 16">
              <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z">
              </path>
              <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0"></path>
            </svg>
                    <span class="link-text">Cerrar Sesión</span>
                </a>
            </li>

        </ul>
    </nav>


    <div class="main-content">

        <h1>Administrar Equipos</h1>

        <!-- <a href="create.php" class='add-button btn'>Agregar equipo</a> -->
        <button class='add-button btn'><a href="/IngeniaLab/views/create.php" style="color:white; text-decoration: none">Agregar equipo</a></button>

        <table class="equipment-table">
            <thead>
                <tr>
                    <th>Nombre Máquina</th>
                    <th>Estado Actual</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // require 'database.php';
                require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';
                $pdo = Database::connect();
                $sql = 'SELECT * FROM crud_maquinas';
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
        window.location.href = '/IngeniaLab/src/php/delete.php?id=' + id;
        }



    </script>

</body>
</html>