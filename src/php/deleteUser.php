<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM mdp_v1_usuarios WHERE id=?";
    $q = $pdo->prepare($sql);
    $id = $_REQUEST['id'];
    $q->execute(array($id));
    Database::disconnect();
    header("Location: /IngeniaLab/views/lab-admin-users.php");
    
?>