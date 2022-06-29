<?php
    session_start();
    $con=mysqli_connect("localhost","root","","control_laboratorio");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con,"SELECT * FROM cliente;");
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
    <script type="text/javascript" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/JavaScript/usuarios.js"></script>
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
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/menu_inicio.php">Menú de inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/baja_clientes.php">Baja y tabla de clientes<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/modificacion_clientes.php">Modificación de clientes<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/inactivacion_clientes.php">Inactivación de clientes<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/registro_clientes_again.php">Volver a registrar cliente<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/cerrar_sesion.php">Cerrar sesión<span class="sr-only">(current)</span></a>
        </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="text-center">
            <img class="resize" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/Assets/logo.png">
            <h1 class="display-4">Tabla de equipos de laboratorio</h1>
        </div>   
    </div>
    <div class="container">
        <table class="table">
          <thead>
            <tr>
              <th>Clave de cliente</th>
              <th>Nombre de cliente</th>
              <th>RFC</th>
              <th>Domicilio de entrega</th>
              <th>Factores particulares</th>
              <th>Nombre del contacto</th>
              <th>Correo del contacto</th>
              <th>Telefono del contacto</th>
              <th>Puesto del contacto</th>
            </tr>
          </thead>
          <tbody>
        <?php
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td>" . $row['Clv_cliente'] . "</td>";
              echo "<td>" . $row['Nombre_cliente'] . "</td>";
              echo "<td>" . $row['RFC'] . "</td>";
              echo "<td>" . $row['Domicilio_entrega'] . "</td>";
              echo "<td>" . $row['Factores_particulares'] . "</td>";
              echo "<td>" . $row['Nombre_contacto'] . "</td>";
              echo "<td>" . $row['Correo_contacto'] . "</td>";
              echo "<td>" . $row['Telefono_contacto'] . "</td>";
              echo "<td>" . $row['Puesto_contacto'] . "</td>";
              echo "</tr>";
            }
            mysqli_close($con);
          ?>  
          </tbody>
        </table>
      </div>


    <div class="container">

      <form role="form" method="post" class="form_position">
        <div class="input-group mb-3 w-25">
          <input type="number" name="id" class="form-control" min=1 max=100 placeholder="ID">
            <div class="input-group-append">
              <button class="btn btn-secondary" type="submit">Inactivar</button>
            </div>
        </div>  
      </form>
    </div>
  </body>
    <?php
        //oculto todos los errores
        error_reporting(0);
        ini_set('display_errors', 0);
        
        $con=mysqli_connect("localhost","root","","control_laboratorio");

        // Checo conexion
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // Guardo en la variable
        $id = mysqli_real_escape_string($con, $_POST['id']);
        //No ejecuto al hacer refresh
        //Vamos a hacer que a los equipos desactivado les ponga ID 999
        
        if($id<>NULL){
          $sql1="SELECT max(Clv_cliente) FROM cliente;";
          $result = mysqli_query($con,$sql1);
          while($row = mysqli_fetch_array($result)) {
            echo $row['max(Clv_cliente)'];
            $id_maximo=$row['max(Clv_cliente)'];
            if($id_maximo<999){
                $id_maximo=$id_maximo+999;
            }
        }
         
          $sql2 = "UPDATE cliente SET Clv_cliente=$id_maximo+1 WHERE Clv_cliente=$id;";
          }
        if(!mysqli_query($con,$sql2)) {
          die('Error: ' . mysqli_error($con));
        }
      mysqli_close($con);
      ?>