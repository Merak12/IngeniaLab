<?php

    session_start();

    if (!isset($_SESSION['idType']) || $_SESSION['idType'] != 3) {
        header("Location: login.php");
        exit();
    }

?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <title>Admin Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/TC2005B_602_01/IngeniaLab/public/css/styles.css">
    <link rel="stylesheet" href="/TC2005B_602_01/IngeniaLab/public/css/home.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</head>

<body>

    <?php include '../common/sideBar.html'; ?>

    <div class="main-content" id="mainContent">

        <div class="header">
            <h1>Administrar Equipos</h1>
            <button class="open-modal-btn add-button" data-modal="addMachineModal">Añadir nueva maquina</button>
        </div>

        <div class='button-container'>

            <form method='POST' action="../machines/turnOnAll.php">
                <button type="submit" class="power-on-button"> <i class='fas fa-power-off'></i> Encender Todo</button>
            </form>

            <form method='POST' action="../machines/turnOffAll.php">
                <button type="submit" class="power-off-button"> <i class='fas fa-power-off'></i> Apagar Todo</button>
            </form>

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

            

            </tbody>

        </table>

    </div>

    <?php include '../machines/create.php'; ?>
    <?php include '../machines/details.php'; ?>
    <?php include '../machines/edit.php'; ?>

    <script src="../../public/js/modal.js"></script>

    <script>
		$(document).ready(function() {
			$('tbody').load('/TC2005B_602_01/IngeniaLab/src/machines/showListMachine.php');
		});
	</script>

</body>
</html>
