<?php

    session_start();

    require_once $_SERVER['DOCUMENT_ROOT'].'/IngeniaLab/config/database.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = Database::connect();

        try {

            $query = $conn->prepare("SELECT correo, clave, idType FROM Usuarios WHERE correo = :username");
            $query->bindParam(':username', $username);
            
            $query->execute();

            if($query->rowCount() > 0){
                $user = $query->fetch(PDO::FETCH_ASSOC);

                if(password_verify($password, $user['password'])){

                    $_SESSION['idType'] = $user['idType'];
                    $_SESSION['correo'] = $user['correo'];

                    if($_SESSION['idType'] == 3){
                        header('Location: /IngeniaLab/src/views/home.php');
                        exit();
                    } elseif($_SESSION['idType'] == 2){
                        header('Location: /IngeniaLab/src/views/profesor.php');
                        exit();
                    } else{//Incorrect idType
                        header('Location: /IngeniaLab/src/views/login.php?error=InvalidType');
                        exit();                        
                    }
                } else{
                    //Incorrect Password
                    header('Location: /IngeniaLab/src/views/login.php?error=IncorrectPassword');
                    exit();
                }
            }else{//User not found
                header('Location: /IngeniaLab/src/views/login.php?error=Usernotfound');
                exit();
            }
        } catch(PDOException $e){
            die("Error: ".$e->getMessage());
        }

        //Database disconection
        Database::disconnect();

    } else{
        //PHP file unable to access
        header('Location: /IngeniaLab/index.php?error=InvalidAccess');
        exit();
    }
?>