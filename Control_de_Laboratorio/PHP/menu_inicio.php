<?php
    //Abrimos la sesion
    session_start();
    //Hacemos conexion
    $con=mysqli_connect("localhost","root","","control_laboratorio");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Control de laboratorio</title>
    <!-- Usamos Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- para usar glyphycons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Link del CSS -->
    <link href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/CSS/menu_inicio.css" rel="stylesheet">
  </head>
  <body>
  <!-- Nav bar -->
  <nav class="navbar navbar-custom navbar-expand-md navbar-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/cerrar_sesion.php">Cerrar sesión<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- jumbotron -->
    <div class="jumbotron">
        <div class="container">
          <h1 class="display-4">
            <img class="resize" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/Assets/logo.png">
            <?php
                echo "Bienvenido " . $_SESSION["nombre_usuario"] . "<br>";
              ?>
            
          <hr class="footer-line">
        </div>
      </div>

    <!-- imagen y texto de iniciar sesion -->
        <div class="texto-botones-1">
            <h1 class="display-4">Usuarios</h1>
                <a href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/usuarios.php"
                    <button type="button" class="boton-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#0A4DA9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="12" cy="12" r="9" />
                            <circle cx="12" cy="10" r="3" />
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                        </svg>
                    </button>
                </a>
        </div>


        <div class="texto-botones-2">
            <h1 class="display-4">Certificados</h1>
                <button type="button" class="boton-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-certificate" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#0A4DA9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="15" cy="15" r="3" />
                        <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" />
                        <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" />
                        <line x1="6" y1="9" x2="18" y2="9" />
                        <line x1="6" y1="12" x2="9" y2="12" />
                        <line x1="6" y1="15" x2="8" y2="15" />
                    </svg>
                </button> 
        </div>
        
        <div class="texto-botones-3">
            <h1 class="display-4">Clientes</h1>
                <button type="button" class="boton-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#0A4DA9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="9" cy="7" r="4" />
                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                    </svg>
                </button> 
        </div>

        <div class="texto-botones-4">
            <h1 class="display-4">Análisis</h1>
                <button type="button" class="boton-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checkup-list" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#0A4DA9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <path d="M9 14h.01" />
                        <path d="M9 17h.01" />
                        <path d="M12 16l1 1l3 -3" />
                    </svg>
                </button> 
        </div>

        <div class="texto-botones-5">
            <h1 class="display-4">Eqs. Lab</h1>
            <a href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/eqs_laboratorio.php"
                <button type="button" class="boton-5">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-microscope" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#0A4DA9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 21h14" />
                        <path d="M6 18h2" />
                        <path d="M7 18v3" />
                        <path d="M9 11l3 3l6 -6l-3 -3z" />
                        <path d="M10.5 12.5l-1.5 1.5" />
                        <path d="M17 3l3 3" />
                        <path d="M12 21a6 6 0 0 0 3.715 -10.712" />
                    </svg>
                </button></a>
        </div>

        <div class="texto-botones-6">
            <h1 class="display-4">Consultas</h1>
                <button type="button" class="boton-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#0A4DA9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </button> 
        </div>

        <div class="texto-botones-7">
            <h1 class="display-4">Derechos</h1>
                <button type="button" class="boton-7">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#0A4DA9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                </button> 
        </div>
</body>
