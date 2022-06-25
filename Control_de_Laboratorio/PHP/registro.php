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
    <link href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/CSS/registro.css" rel="stylesheet">
  </head>
  <body>
    

  <nav class="navbar navbar-custom navbar-expand-md navbar-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/inicio.php">Inicio de sesión<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container">
        <div class="text-center">
            <img class="resize" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/Assets/logo.png">
            <h1 class="display-4">Registrarse como nuevo usuario</h1>
        </div>   
    </div>

    <div class="container">
    <form name="formulario" class="form_position" role="form" method="post" onsubmit="return validarFormulario()">
        
    <!-- Nombre y apellido paterno -->
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="nombre" placeholder="Máx. 20 caracteres" maxlength="20" class="form-control" />
                <label class="form-label">Nombre</label>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="apellido" placeholder="Máx. 20 caracteres" maxlength="20" class="form-control"/>
                <label class="form-label">Apellidos</label>
            </div>
        </div>
    </div>

        <!--Puesto-->
        <div class="form-outline mb-4">
          <input type="text" name="puesto" class="form-control" placeholder="Laboratorista, Administrador o Ejecutivo" maxlength="13"/>
          <label class="form-label">Puesto</label>
        </div>

        <!--Derechos-->
        <!-- <div class="form-outline mb-4">
          <input type="text" name="derechos" class="form-control" placeholder="(Laboratorista o Administrador)"/>
          <label class="form-label" for="form2Example1">Derechos</label>
        </div> -->
      
        <!--Correo-->
        <div class="form-outline mb-4">
          <input type="email" name="email" class="form-control" placeholder="Máx. 30 caracteres" maxlength="30"/>
          <label class="form-label">Correo</label>
        </div>

        <!--Contraseña-->
        <div class="form-outline mb-4">
          <input type="password" name="contrasena" class="form-control" minlength="6" placeholder="Min 6 caracteres Máx. 12 caracteres" maxlength="12"/>
          <label class="form-label">Contraseña</label>
        </div>
      
        <!-- Espacio entre contraseña y boton sign in -->
        <div class="row sm-4">
          <div class="col d-flex justify-content-center"></div>
        </div>

        <!-- Iniciar sesion button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Registrarse</button><br>
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

        // Guardo en las variables
        $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
        $apellido = mysqli_real_escape_string($con, $_POST['apellido']);
        //Nombres juntados
        $nombreFinal = $nombre . ' ' . $apellido;
        $puesto = mysqli_real_escape_string($con, $_POST['puesto']);
        
        $correo = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['contrasena']);
        
        //No creo cuentas extras al hacer refresh
        if($nombre<>NULL){
          if($puesto=="Administrador"){
            $derechos="Acceso total";
          }else if($puesto=="Ejecutivo"){
            $derechos="Consultas";
          }else if($puesto=="Laboratorista"){
            $derechos="Altas";
          }
            $sql="INSERT INTO usuarios (Nombre, Puesto, Derechos, Correo, Contrasena) 
            VALUES ('$nombreFinal', '$puesto', '$derechos', '$correo', '$password');";
          }
        
        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
        //Usamos redirect
        header("Location:http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/inicio.php");
        exit();
      mysqli_close($con);
      ?>