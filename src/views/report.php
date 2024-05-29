<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/IngeniaLab/public/css/genReporte.css">
  <link rel="stylesheet" href="/IngeniaLab/public/css/styles.css">
  <title>Mi Página</title>
</head>

<body>

  <?php include '../common/sideBar.html' ?>


  <div id="main-content">
    <h1>Generar Reporte</h1>
    <table>
      <thead>
        <tr>
          <td>&nbsp</td>
          <td>&nbsp</td>

        </tr>
      </thead>

      <form method="GET" action="/IngeniaLab/src/php/genReporte.php">

      <tbody>
        <tr>
          <td><input type="checkbox" id="apartado1" name="apartado1" value="nombre_y_matricula">
          <label for="apartado1">Incluír nombre y número de matrícula o colaborador</label>
          </td>
        </tr>
        <tr>
          <td><input type="checkbox" id="apartado2" name="apartado2" value="uso_profesores">
          <label for="apartado2">Incluir uso de profesores</label>
          </td>
        </tr>
        <tr>
          <td><input type="checkbox" id="apartado3" name="apartado3" value="uso_administradores">
          <label for="apartado3">Incluir uso de administradores</label>
          </td>
        </tr> 
        <tr>
        <td><input type="checkbox" id="apartado4" name="apartado4" value="graficas_de_uso">
          <label for="apartado4">Incluír graficas de uso</label>
        </td>
        </tr>


        <tr>
          <td>&nbsp</td>
          <td>&nbsp</td>

        </tr>

        <tr>
          <td>&nbsp</td>
          <td>&nbsp</td>

        </tr>
        <tr>
          <td><input type="submit" value="Generar reporte"></td>
          <td>&nbsp</td>

        </tr>

        <tr>
          <td> <img src="https://www.pngmart.com/files/21/Add-Button-PNG-Isolated-File.png" width="100"></img></td>
        </tr>
        

      </form>

      </tbody>
    </table>
  </div>
</body>

</html>