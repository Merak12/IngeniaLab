<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IngeniaLab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/IngeniaLab/public/css/styles.css">
    <link rel="stylesheet" href="/IngeniaLab/public/css/students.css">
    <link rel="stylesheet" href="/IngeniaLab/public/css/navBar.css">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <div class="navbar" id="sidebar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="src/views/login.php" class="nav-link">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="link-text">Iniciar Sesión</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="main-content">

        <div class="header">

            <h1>Laboratorio de Mecatronica</h1>
            
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

</body>
</html>