<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Control de laboratorio</title>
    <!-- Src de JavaScript -->
    <script type="text/javascript" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/JavaScript/modificacion_equipos.js"></script>
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
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/cerrar_sesion.php">Cerrar sesión<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/menu_inicio.php">Menú de inicio<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/eqs_laboratorio.php">Tabla de equipos<span class="sr-only">(current)</span></a>
        </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <div class="text-center">
            <img class="resize" src="http://localhost/Julio_XAMPP/Control_de_Laboratorio/Assets/logo.png">
            <h1 class="display-4">Alta de equipos de laboratorio</h1>
        </div>   
    </div>

    <div class="container">
        <form name="formulario" class="form_position" role="form" method="post" onsubmit="return validarFormulario()"> 

            <div class="form-outline mb-4">
                <input type="text" name="marca" class="form-control" placeholder="Máx. 30 caracteres" maxlength="30"/>
                <label class="form-label">Marca</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="modelo" class="form-control"  placeholder="Máx. 30 caracteres" maxlength="30"/>
                <label class="form-label">Modelo</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="serie" class="form-control" placeholder="Máx. 30 caracteres" maxlength="30"/>
                <label class="form-label">Serie</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="descripcion" class="form-control" placeholder="Máx. 50 caracteres" maxlength="50"/>
                <label class="form-label">Descripción</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="proveedor" class="form-control" placeholder="Máx. 30 caracteres" maxlength="30"/>
                <label class="form-label">Proveedor</label>
            </div>

            <div class="form-outline mb-4">
                <input type="date" name="fecha-adquisicion" class="form-control"/>
                <label class="form-label">Fecha de adquisición</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" onclick="garantia12()">
                    <label class="form-check-label" for="defaultCheck1">
                    ¿Cuenta con garantia el equipo?
                </label>
            </div>
            <br>
            <div class="form-outline mb-4" id="garantia1" style="display:none">
                <input type="date" name="garantia" class="form-control"/>
                <label class="form-label">Garantía</label>
            </div>

            <div class="form-outline mb-4" id="garantia2" style="display:none">
                <input type="date" name="vigencia-garantia" class="form-control"/>
                <label class="form-label">Vigencia de la garantia</label>
            </div>

            <script>
                function garantia12(){
                    var checkBox = document.getElementById("defaultCheck1");
                    var garantia1 = document.getElementById("garantia1");
                    var garantia2 = document.getElementById("garantia2");
                    if(checkBox.checked == true){
                        garantia1.style.display = "block";
                        garantia2.style.display = "block";

                    }else{
                        garantia1.style.display = "none";
                        garantia2.style.display = "none";
                    }
                }
            </script>

            <div class="form-outline mb-4">
                <input type="text" name="ubic-equipo" class="form-control" placeholder="Máx. 30 caracteres" maxlength="30"/>
                <label class="form-label">Ubicación del equipo</label>
            </div>

            <label class="form-label">Responsable del equipo</label>
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

            <div class="form-outline mb-4">
                <input type="text" name="mantenimiento" class="form-control" placeholder="Máx. 30 caracteres" maxlength="30"/>
                <label class="form-label">Mantenimiento</label>
            </div>
       
            <div class="row sm-4">
                <div class="col d-flex justify-content-center"></div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mb-4">Dar de alta</button><br>
        </form>
    </div>
    <br>
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
    $responsableEquipo = $nombre . ' ' . $apellido;
    $marca = mysqli_real_escape_string($con, $_POST['marca']);
    $modelo = mysqli_real_escape_string($con, $_POST['modelo']);
    $serie = mysqli_real_escape_string($con, $_POST['serie']);
    $descripcion = mysqli_real_escape_string($con, $_POST['descripcion']);
    $proveedor = mysqli_real_escape_string($con, $_POST['proveedor']);
    $fechaAdquisicion = mysqli_real_escape_string($con, $_POST['fecha-adquisicion']);
    $garantia = mysqli_real_escape_string($con, $_POST['garantia']);
    $vigenciaGarantia = mysqli_real_escape_string($con, $_POST['vigencia-garantia']);
    $ubicEquipo = mysqli_real_escape_string($con, $_POST['ubic-equipo']);
    $mantenimiento = mysqli_real_escape_string($con, $_POST['mantenimiento']);
    
    if($nombre<>'' && $nombre<>NULL){
    $sql="INSERT INTO equipos_laboratorio (Marca, Modelo, Serie, Descripcion, Proveedor, Fecha_adquisicion, Garantia, Vigencia_garantia, Ubic_equipo, Responsable_equipo, Mantenimiento) 
        VALUES ('$marca', '$modelo', '$serie', '$descripcion', '$proveedor', '$fechaAdquisicion', '$garantia', '$vigenciaGarantia', '$ubicEquipo', '$responsableEquipo', '$mantenimiento');";
    ?>
    <div class="container">
      <div class="alert alert-success" role="alert">
        Equipo dado de alta
      </div>
    </div>
    <?php
    }
    
    if (!mysqli_query($con,$sql)) {
        die('Error: ' . mysqli_error($con));
    }
    mysqli_close($con);
?>