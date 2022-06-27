<?php
    session_start();
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
    <script type="text/javascript" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/JavaScript/modificacion_usuarios.js"></script>
    <!-- Src de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/CSS/modificacion_usuarios.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar navbar-custom navbar-expand-md navbar-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/menu_inicio.php">Menú de inicio<span class="sr-only">(current)</span></a>
          </li>
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/usuarios.php">Tabla de usuarios<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/modificacion_usuarios.php">Modificar usuario<span class="sr-only">(current)</span></a>
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
            <h1 class="display-4">Modificar un usuario</h1>
        </div>   
    </div>


    <div class="container">
    <form name="formulario" class="form_position" role="form" method="post" onsubmit="return validarFormulario()">
    <!-- Nombre y apellido paterno -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="number" name="id" placeholder="1 al 100" class="form-control" />
                <label class="form-label">ID</label>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="nombre" placeholder="Máx. 20 caracteres" maxlength="20" class="form-control"/>
                <label class="form-label">Nombre nuevo</label>
            </div>
        </div>
    </div>
        <!--Puesto-->
        <div class="form-outline mb-4">
          <input type="text" name="puesto" class="form-control" placeholder="Laboratorista, Administrador o Ejecutivo" maxlength="13"/>
          <label class="form-label">Puesto nuevo</label>
        </div>
        <!--Correo-->
        <div class="form-outline mb-4">
          <input type="email" name="email" class="form-control" placeholder="Máx. 30 caracteres" maxlength="30"/>
          <label class="form-label">Correo nuevo</label>
        </div>
        <!--Contraseña-->
        <div class="form-outline mb-4">
          <input type="password" name="contrasena" class="form-control" minlength="6" placeholder="Min 6 caracteres Máx. 12 caracteres" maxlength="12"/>
          <label class="form-label">Contraseña nueva</label>
        </div>
        <!-- Espacio entre contraseña y boton sign in -->
        <div class="row sm-4">
          <div class="col d-flex justify-content-center"></div>
        </div>
        <!-- Iniciar sesion button -->
        <button type="submit" class="btn btn-info btn-block mb-4">Modificar</button><br>
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
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $puesto = mysqli_real_escape_string($con, $_POST['puesto']);
        if($puesto=="Laboratorista"){
            $derechos="Altas";
        }else if($puesto=="Administrador"){
            $derechos="Acceso total";
        }else if($puesto=="Ejecutivo"){
            $derechos="Consultas";
        }
        $correo = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['contrasena']);
        //No ejecuto al hacer refresh
        if($id<>NULL){
            $sql="UPDATE usuarios SET Nombre='$nombre', Puesto='$puesto', Derechos='$derechos', Correo='$correo', Contrasena='$password' WHERE id=$id;";
          }
        if(!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
      mysqli_close($con);
      ?>