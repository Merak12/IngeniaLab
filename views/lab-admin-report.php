<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Responsive Forms for Report</title>
  <link rel="stylesheet" href="/IngeniaLab/assets/css/genReporte.css" />

  <link rel="stylesheet" href="/IngeniaLab/assets/css/styleNav.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
</head>


<body>
  
  <script src="navbarjs.js"></script>
 
    <nav class="navbar">
        <ul class="navbar-nav">

            <li class="logo">
                <a href="#" class="nav-link">
                    <span class="link-text">Laboratorios de Ingeniería</span>
                </a>
            </li>


            <li class="navbar-item">
                <a id="inicio" href="lab-admin-home.html" class="nav-link">
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
                <a id="equipos" href="lab-admin-equipos.html" class="nav-link">
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
                <a id="usuarios" href="lab-admin-users.html" class="nav-link">
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
                <a id="reporte" href="admin-generarReporte.html" class="nav-link">
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
                <a id="cerrarSesion" href="index.html" class="nav-link">
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

      
  </div>

    <section class="container">
      <header>Generar Reporte</header>
      <form action="#" class="form">
          <div class="input-box">
              <label>Nombre Completo</label>
              <input type="text" placeholder="Ingresar nombre" required />
          </div>

          <div class="input-box">
              <label>Matrícula</label>
              <input type="text" placeholder="Ingresar matrícula" required />
          </div>

          <div class="input-box">
              <label>Correo</label>
              <input type="text" placeholder="Ingresar correo" required />
          </div>

          <div class="column">
              <div class="input-box">
                  <label>Fecha inicio</label>
                  <input type="date" placeholder="Ingresar fecha1" required />
              </div>

              <div class="input-box">
                  <label>Fecha final</label>
                  <input type="date" placeholder="Ingresar fecha2" required />
              </div>
          </div>

          <div>
              <h3>Incluír profesores</h3>
              <div class="gender-option">
                  <div class="gender"></div>
                  <input type="radio" id="check-teach-yes" name="include_teachers" value="yes" checked />
                  <label for="check-teach-yes">Si</label>
              </div>
              <div class="gender-option">
                  <div class="gender"></div>
                  <input type="radio" id="check-teach-no" name="include_teachers" value="no" />
                  <label for="check-teach-no">No</label>
              </div>
          </div>

          <div>
              <h3>Incluír administradores</h3>
              <div class="gender-option">
                  <div class="gender"></div>
                  <input type="radio" id="check-admin-yes" name="include_admins" value="yes" checked />
                  <label for="check-admin-yes">Si</label>
              </div>
              <div class="gender-option">
                  <div class="gender"></div>
                  <input type="radio" id="check-admin-no" name="include_admins" value="no" />
                  <label for="check-admin-no">No</label>
              </div>
          </div>

          <div>
              <h3>Incluír gráficas</h3>
              <div class="gender-option">
                  <div class="gender"></div>
                  <input type="radio" id="check-graph-yes" name="include_graphs" value="yes" checked />
                  <label for="check-graph-yes">Si</label>
              </div>
              <div class="gender-option">
                  <div class="gender"></div>
                  <input type="radio" id="check-graph-no" name="include_graphs" value="no" />
                  <label for="check-graph-no">No</label>
              </div>
          </div>

          <div class="button-container">
              <button type="submit">Generar Reporte</button>
              <button class="see-reports">Ver Reportes</button>
            </div>
      </form>
  </section>
</body>
</html>