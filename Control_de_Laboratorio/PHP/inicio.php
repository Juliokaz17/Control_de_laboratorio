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
    <!-- Link del CSS -->
    <link href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/CSS/inicio.css" rel="stylesheet">
  </head>
  <body>
  <!-- Nav bar -->
  <nav class="navbar navbar-custom navbar-expand-md navbar-dark fixed-top">
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/inicio.php">Inicio<span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- imagen y texto de iniciar sesion -->
    <div class="container">
        <div class="text-center">
            <img class="resize" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/Assets/logo.png">
            <h1 class="display-4">Iniciar sesión</h1>
        </div>   
    </div>
    <!-- forms -->
    <div class="container">
    <form class="form_position" role="form" method="post">
        <!--Correo-->
        <div class="form-outline mb-4">
          <input type="email" name="correo" maxlength="30" placeholder="Máx. 30 caracteres" class="form-control" />
          <label class="form-label">Correo</label>
        </div>
        <!--Contraseña-->
        <div class="form-outline mb-4">
          <input type="password" name="contrasena" maxlength="12" placeholder="Máx. 12 caracteres" class="form-control" />
          <label class="form-label">Contraseña</label>
        </div>
        <!-- Espacio entre contraseña y boton sign in -->
        <div class="row sm-4">
          <div class="col d-flex justify-content-center">
          </div>
        </div>
        <!-- Iniciar sesion button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Iniciar sesión</button>
        <!-- Registrar -->
        <div class="text-center">
        <p><a href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/registro.php">Registrarse como nuevo usuario</a></p>
        </div>
      </form>
    </div>
    
    <div class="container">
    <!-- parte de abajo con la rayita -->
      <hr class="footer-line">
      <footer class="container_footer text-left">
      <p>Julio César Velázquez Corona - Diego Mario Veytia Leyvas</p>
      </footer>
    </div>
    <?php
    //oculto todos los errores
    error_reporting(0);
    ini_set('display_errors', 0);

    $con=mysqli_connect("localhost","root","","control_laboratorio");

        // Checo conexion
        if (mysqli_connect_errno()) {
          echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        //Abrimos una sesion
        session_start();

         // Guardo en las variables
         $correo = mysqli_real_escape_string($con, $_POST['correo']);
         $password = mysqli_real_escape_string($con, $_POST['contrasena']);

         if($correo<>NULL and $password<>NULL){
          //Hacemos la query que busca el usuario y contraseña en la tabla, tiene limit 1 porque encontrará rapidamente el primer valor
          $result="select * from usuarios WHERE Correo='$correo' and Contrasena='$password' limit 1;";
          $nombre="select nombre from usuarios WHERE Correo='$correo' and Contrasena='$password' limit 1;";
        }else{
          //echo "Registra los datos";
        }

        //Si falla la conexión
        if (!mysqli_query($con,$result)) {
          die('Error: ' . mysqli_error($con));
        }

        //Obtenemos la query, por alguna razón necesita el $con antes 
        $sql=mysqli_query($con,$result);
        $query_nombre=mysqli_query($con,$nombre);

        //El resultado de $query_nombre es un objeto y lo necesitamos como string
        $row = mysqli_fetch_array($query_nombre);

        //Si realmente la query funcionó decir que la sesión existe
        if(mysqli_num_rows($sql)==1){
          echo "La sesion existe";
          //Asignamos resultado del query
          $_SESSION['nombre_usuario']= $row['nombre'];
          //Usamos redirect
          header("Location:http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/menu_inicio.php");
          exit();
        }else{
          $fallo="La sesion no existe";
          echo "<script type='text/javascript'>alert('$fallo');</script>";
        }
      mysqli_close($con);
    ?>
</body>