<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema de Laboratorios</title>
        <meta name="description" content="Sistema de gestion del material de laboratorio">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/IngeniaLab/assets/css/styles.css">
        <link rel="secondary-stylesheet" herf= "/IngeniaLab/assets/css/register.css">
    </head>


    
    <body>
    <table>
      <tr>
      <td>
        <img src="/IngeniaLab/assets/images/ITESM Logo.png" width="100" alt="ITESM Logo">
      </td>
      <td>
        <h1>Laboratorio de Ingenieria</h1>
      </td>
    </tr>
  </table>
  <table align="center">
    <tr>
      <td>
        <img src="/IngeniaLab/assets/images/robot.jpg" width="150 px">
      </td>
    </tr>
  </table>
<form action="/IngeniaLab/src/php/login_process.php" method="POST">
  <table align="center">
    <tr>
      <td align="center">
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" placeholder="Usuario" required>
      </td>
    </tr>
    <tr>
      <td align="center">
        <label for="password">Contraseña:</label>
        <input type="password" id="password"name="password" placeholder="Contraseña" required>
      </td>
    </tr>
    <tr>
      <td align="center">
        <button type="submit" style="padding: 10px 20px; font-size: 16px">
          Log in
        </button>
        <button type="button" onclick="location.href='/IngeniaLab/views/register.php'" style="padding: 10px 20px; font-size: 16px">
          Register
        </button>
      </td>
    </tr>
    <tr>
      <td align="center">
        <button style="padding: 10px 20px; font-size: 16px">
          ¿Olvido su contrasena?
        </button>
      </td>
    </tr>
  </table>
</form>
  <table align="right">
    <tr>
      <td>
        <svg viewBox="0 0 512 512" width="50" title="info-circle">
          <path
            d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z" />
        </svg>
      </td>
    </tr>
  </table> 
        
    </body>
</html>