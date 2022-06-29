<?php
    session_start();
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
    <script type="text/javascript" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/JavaScript/alta_clientes.js"></script>
    <!-- Src de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/CSS/eqs_laboratorio.css" rel="stylesheet">
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
            <h1 class="display-4">Alta de Clientes</h1>
        </div>   
    </div>

    <div class="container">
    <form name="formulario" class="form_position" role="form" method="post" onsubmit="return validarFormulario()"> 

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="nombre-cliente" placeholder="Máx. 20 caracteres" maxlength="20" class="form-control" />
                <label class="form-label">Nombre de cliente</label>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="apellido-cliente" placeholder="Máx. 20 caracteres" maxlength="20" class="form-control"/>
                <label class="form-label">Apellidos de cliente</label>
            </div>
        </div>
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="rfc" class="form-control"  placeholder="Máx. 12 caracteres" maxlength="12"/>
        <label class="form-label">RFC</label>
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="domicilio-entrega" class="form-control" placeholder="Máx. 50 caracteres" maxlength="50"/>
        <label class="form-label">Domicilio de entrega</label>
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="fact-particulares" class="form-control" placeholder="Sí o no" maxlength="2"/>
        <label class="form-label">¿Factores particulares?</label>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="nombre-contacto" placeholder="Máx. 20 caracteres" maxlength="20" class="form-control" />
                <label class="form-label">Nombre de contacto</label>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="form-outline">
                <input type="text" name="apellido-contacto" placeholder="Máx. 20 caracteres" maxlength="20" class="form-control"/>
                <label class="form-label">Apellidos de contacto</label>
            </div>
        </div>
    </div>

    <div class="form-outline mb-4">
        <input type="email" name="correo-contacto" placeholder="Máx. 30 caracteres" class="form-control"/>
        <label class="form-label">Correo del contacto</label>
    </div>

    <div class="form-outline mb-4">
        <input type="number" name="tel-contacto" placeholder="Máx. 7 caracteres" class="form-control"/>
        <label class="form-label">Telefono de contacto</label>
    </div>

    <div class="form-outline mb-4">
        <input type="text" name="puesto-contacto" placeholder="Máx. 20 caracteres" class="form-control"/>
        <label class="form-label">Puesto del contacto</label>
    </div>

    <!-- Espacio entre form y boton sign in -->
    <div class="row sm-4">
        <div class="col d-flex justify-content-center"></div>
    </div>
    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Dar de alta</button><br>
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
        $nombreCliente = mysqli_real_escape_string($con, $_POST['nombre-cliente']);
        $apellidoCliente = mysqli_real_escape_string($con, $_POST['apellido-cliente']);
        $nombreContacto = mysqli_real_escape_string($con, $_POST['nombre-contacto']);
        $apellidoContacto = mysqli_real_escape_string($con, $_POST['apellido-contacto']);
        //Nombres juntados
        $completoCliente = $nombreCliente . ' ' . $apellidoCliente;
        $completoContacto = $nombreContacto . ' ' . $apellidoContacto;
        $rfc = mysqli_real_escape_string($con, $_POST['rfc']);
        $domicilioEntrega = mysqli_real_escape_string($con, $_POST['domicilio-entrega']);
        $factParticulares = mysqli_real_escape_string($con, $_POST['fact-particulares']);
        if($factParticulares=="Sí" || $factParticulares=="sí" || $factParticulares=="si" || $factParticulares=="Si"){
            $factParticularesBool=1;
        }else if($factParticulares=="no" || $factParticulares=="No"){
            $factParticularesBool=0;
        }
        $correoContacto = mysqli_real_escape_string($con, $_POST['correo-contacto']);
        $telContacto = mysqli_real_escape_string($con, $_POST['tel-contacto']);
        $puestoContacto = mysqli_real_escape_string($con, $_POST['puesto-contacto']);
       
        if(mysqli_real_escape_string($con, $_POST['rfc'])<>NULL){
            if(isset($_SESSION['details2']) && $_SESSION['details2']==true){ 
                /*do nothing since query has ran once*/
            }else{
            /*run query since query has not been run*/
            $sql="INSERT INTO cliente (Nombre_cliente, RFC, Domicilio_entrega, Factores_particulares, Nombre_contacto, Correo_contacto, Telefono_contacto, Puesto_contacto) 
            VALUES ('$completoCliente', '$rfc', '$domicilioEntrega', '$factParticularesBool', '$completoContacto', '$correoContacto', '$telContacto', '$puestoContacto');";
            $_SESSION['details2']=true; //you set a session variable to true when query runs the first time.
            }
        }
        
        if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
     mysqli_close($con);
?>