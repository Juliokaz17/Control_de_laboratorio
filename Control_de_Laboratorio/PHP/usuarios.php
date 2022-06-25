<?php
    $con=mysqli_connect("localhost","root","","control_laboratorio");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con,"SELECT * FROM usuarios;");
    ?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Control de laboratorio</title>
    <!-- Src de JavaScript -->
    <script type="text/javascript" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/JavaScript/validacion_registro.js"></script>
    <!-- Src de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/CSS/usuarios.css" rel="stylesheet">
  </head>
  <body>

  <nav class="navbar navbar-custom navbar-expand-md navbar-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/cerrar_sesion.php">Cerrar sesión<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
        <div class="text-center">
            <img class="resize" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/Assets/logo.png">
            <h1 class="display-4">Tabla de usuarios</h1>
        </div>   
    </div>

    <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Número</th>
              <th>Nombre</th>
              <th>Puesto</th>
              <th>Derechos</th>
              <th>Correo</th>
              <th>Contraseña</th>
            </tr>
          </thead>
          <tbody>
        <?php
            $i=0;
            while($row = mysqli_fetch_array($result)){
              $i++;
              echo "<tr>";
              echo "<td>" . $i . "</td>";
              echo "<td>" . $row['Nombre'] . "</td>";
              echo "<td>" . $row['Puesto'] . "</td>";
              echo "<td>" . $row['Derechos'] . "</td>";
              echo "<td>" . $row['Correo'] . "</td>";
              echo "<td>" . $row['Contrasena'] . "</td>";
              echo "</tr>";
            }
            mysqli_close($con);
          ?>  
          </tbody>
        </table>
      </div>
      
    <!-- <div class="container">
        <div class="text-center">
            <h1 class="display-4">Modificar un usuario</h1>
        </div>   
    </div> -->
    
    <div class="container">
    <div class="text-center">
    <form role="form">
        <label>
            Seleccionar numero de fila          
            <input type="number" min="1" max="100" step="1" value="1">
        </label>
     
    </form>
    </div>
    </div>

</body>