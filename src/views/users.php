<?php
    session_start();

    if (!isset($_SESSION['idType']) || $_SESSION['idType'] != 3) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="../../public/css/styles.css"> 
    <link rel="stylesheet" href="../../public/css/users.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Buscar por nombre, correo, etc.">
        </div>

        <table class="user-table" id="user-table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo electrónico</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- <tr id='no-results' style="display: none;">
                    <td colspan="4">No se encontraron resultados</td>
                </tr> -->
            </tbody>
        </table>
    </div>

    <?php require "../users/create-student.php"; ?>
    <?php require "../users/edit.php"; ?>
    <?php require "../users/confirm-delete-student.php"; ?>

    <script src="/TC2005B_602_01/IngeniaLab/public/js/modal.js"></script>

    <script>
        $(document).ready(function() {
            $('tbody').load('/TC2005B_602_01/IngeniaLab/src/users/students.php', function() {
                updateNoResultsMessage();
            });
        });

        function searchTable() {

            var input, filter, table, tr, td, i, j, txtValue, visible;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("user-table");
            tr = table.getElementsByTagName("tr");
            var tbody = table.querySelector("tbody");
            var noResultFound = true;

            // Remover fila de "No se encontraron resultados" si existe
            var noResultsRow = document.querySelector(".no-results");
            if (noResultsRow) {
                noResultsRow.remove();
            }

            // Ocultar todas las filas de datos y buscar coincidencias
            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none";
                td = tr[i].getElementsByTagName("td");
                visible = false;
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            visible = true;
                            break;
                        }
                    }
                }
                if (visible) {
                    tr[i].style.display = "";
                    noResultFound = false;
                }
            }

            // Si no se encontraron resultados, agregar fila de "No se encontraron resultados"
            if (noResultFound) {
                var newRow = document.createElement("tr");
                newRow.className = "no-results";
                newRow.innerHTML = "<td colspan='4'>No se encontraron resultados</td>";
                tbody.appendChild(newRow);
            }

        }

    </script>

</body>
</html>
