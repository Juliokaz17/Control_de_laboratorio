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
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/baja_equipos_laboratorio.php">Baja y tabla de equipos<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/modificacion_equipos.php">Modificación de equipo<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/inactivacion_equipos.php">Inactivación de equipo<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
           <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/eqs_laboratorio.php">Alta de equipos<span class="sr-only">(current)</span></a>
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
              <th>Clave de equipo</th>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Serie</th>
              <th>Descripcion</th>
              <th>Proveedor</th>
              <th>Fecha de adquisición</th>
              <th>Garantia</th>
              <th>Vigencia de garantia</th>
              <th>Ubicación de equipo</th>
              <th>Responsable de equipo</th>
              <th>Mantenimiento</th>
            </tr>
          </thead>
          <tbody>
        <?php
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td>" . $row['Clv_Equipo'] . "</td>";
              echo "<td>" . $row['Marca'] . "</td>";
              echo "<td>" . $row['Modelo'] . "</td>";
              echo "<td>" . $row['Serie'] . "</td>";
              echo "<td>" . $row['Descripcion'] . "</td>";
              echo "<td>" . $row['Proveedor'] . "</td>";
              echo "<td>" . $row['Fecha_adquisicion'] . "</td>";
              echo "<td>" . $row['Garantia'] . "</td>";
              echo "<td>" . $row['Vigencia_garantia'] . "</td>";
              echo "<td>" . $row['Ubic_equipo'] . "</td>";
              echo "<td>" . $row['Responsable_equipo'] . "</td>";
              echo "<td>" . $row['Mantenimiento'] . "</td>";
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
          <input type="number" name="id" class="form-control" min=1 placeholder="ID">
            <div class="input-group-append">
              <button class="btn btn-danger" type="submit">Borrar</button>
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
        if($id<>NULL){
            $sql="DELETE FROM equipos_laboratorio WHERE Clv_Equipo=$id;";
          }
        if(!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
      mysqli_close($con);
      ?>