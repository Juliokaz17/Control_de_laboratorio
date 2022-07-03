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
    <link href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/CSS/usuarios.css" rel="stylesheet">
  </head>
  <body>

  <nav class="navbar navbar-custom navbar-expand-md navbar-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/cerrar_sesion.php">Cerrar sesión<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/menu_inicio.php">Menú de inicio<span class="sr-only">(current)</span></a>
          </li>
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/usuarios.php">Tabla de usuarios<span class="sr-only">(current)</span></a>
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
    <br><br>

    <?php
        //oculto todos los errores
        error_reporting(0);
        ini_set('display_errors', 0);

        $con=mysqli_connect("localhost","root","","control_laboratorio");
        // Checo conexion
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        session_start();
        
        $idNuevo=$_SESSION['idModificar'];
        $result=mysqli_query($con,"SELECT * FROM usuarios WHERE ID=$idNuevo;");
        
        if(mysqli_num_rows($result)!=0){
        }

        foreach($result as $row) {
            $nombreViejo=$row['Nombre'];
            $puestoViejo=$row['Puesto'];
            $correoViejo=$row['Correo'];
            $contrasenaVieja=$row['Contrasena'];
           
        }
    ?>

    <div class="container">
            <form name="formulario" class="form_position-modificar" role="form" method="post" onsubmit="return validarFormulario()"> 
                <div class="col-md-12">
                      <input type="text" name="nombre" class="form-control" placeholder="<?php echo $nombreViejo?>" maxlength="40"/>
                      <label class="form-label">Nombre nuevo</label>
                </div>
                <div class="col-md-12">
                      <input type="text" name="puesto" class="form-control" placeholder="<?php echo $puestoViejo?>" maxlength="13"/>
                      <label class="form-label">Puesto nuevo</label>
                </div>
                <div class="col-md-12">
                      <input type="email" name="email" class="form-control" placeholder="<?php echo $correoViejo?>" maxlength="30"/>
                      <label class="form-label">Correo nuevo</label>
                </div>
                <div class="col-md-12">
                      <input type="password" name="contrasena" class="form-control" placeholder="<?php echo $contrasenaVieja?>" minlength="6" maxlength="12"/>
                      <label class="form-label">Contraseña nueva</label>
                </div>
                <div class="row sm-4">
                  <div class="col d-flex justify-content-center"></div>
                </div>
              <button type="submit" class="btn btn-info btn-block mb-4">Modificar</button><br>
        </form>
    </div>
    </body>

    <?php
        //obtencion de variables
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

        if($nombre<>'' && $nombre<>NULL){
            $sql="UPDATE usuarios SET Nombre='$nombre', Puesto='$puesto', Derechos='$derechos', Correo='$correo', Contrasena='$password' WHERE ID=$idNuevo;";
        }

        if(!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
        header("Location:http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/usuarios.php");
        exit();
      mysqli_close($con);
      ?>