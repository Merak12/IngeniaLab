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

        <title>Admin Home</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        
        
        <link rel="stylesheet" href="/TC2005B_602_01/IngeniaLab/public/css/styles.css">
        <link rel="stylesheet" href="/TC2005B_602_01/IngeniaLab/public/css/home.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

        <style>

            #main-content {
                margin-left: 100px;
                transition: margin-left 0.5s;
                padding: 20px;
            }

            #main-content.expanded {
                margin-left: 200px;
            }

        </style>

    </head>

    <body>

        <?php include '../common/sideBar.html'; ?>

        <div class="main-content" id="main-content">

            <div class="header">
                <h1>Administrar Equipos</h1>
                <button class="open-modal-btn add-button" data-modal="addMachineModal">Añadir nueva maquina</button>
            </div>

            <div class='button-container'>

                <button onclick='changeStatusAll(1)' class='power-on-button'><i class='fas fa-power-off'></i> Encender Todo</button>
                <button onclick='changeStatusAll(0)' class='power-off-button'><i class='fas fa-power-off'></i> Apagar Todo</button>

            </div>

            <div class="search-bar">
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Buscar por nombre, numero de serie, estado, etc.">
            </div>

            <div id="machines-table"></div>

        </div>

        <?php include '../machines/create.php'; ?>
        <?php include '../machines/details.php'; ?>
        <?php include '../machines/edit.php'; ?>

        <script src="../../public/js/modal.js"></script>

        <script>

            $(document).ready(function() {
                $('#machines-table').load('/TC2005B_602_01/IngeniaLab/src/machines/list-machines.php');
            });

            function changeStatusAll(newStatus) {
                $.get("../machines/change-status-all.php", {newStatus: newStatus}, function(data) {
                    reload();
                }).fail(function() {
                    alert('Error al cambiar el estado de todas las máquinas');
                });
            }

            function changeStatus(idMaquina) {
                $.get("../machines/change-status.php", { ID: idMaquina }, function(data) {
                    reload();
                }).fail(function() {
                    alert('Error al cambiar el estado de la máquina');
                });
            }

            function deleteMachine(idMaquina) {
                $.get("../machines/delete.php", { ID: idMaquina }, function(data) {
                    reload();
                }).fail(function() {
                    alert('Error al eliminar maquina');
                });
            }

            function reload() {
                $('#machines-table').load('/TC2005B_602_01/IngeniaLab/src/machines/list-machines.php');
            }

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
