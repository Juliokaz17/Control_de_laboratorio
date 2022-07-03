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
            <h1 class="display-4">Modificar un equipo</h1>
        </div>   
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

        session_start();
        
        $idNuevo=$_SESSION['idModificar'];
        $result=mysqli_query($con,"SELECT * FROM equipos_laboratorio WHERE Clv_Equipo=$idNuevo;");
        
        if(mysqli_num_rows($result)!=0){
        }

        foreach($result as $row){
            $marcaViejo=$row['Marca'];
            $modeloViejo=$row['Modelo'];
            $serieViejo=$row['Serie'];
            $descripcionViejo=$row['Descripcion'];
            $proveedorViejo=$row['Proveedor'];
            $fechaAdqViejo=$row['Fecha_adquisicion'];
            $garantiaViejo=$row['Garantia'];
            $vigenciaViejo=$row['Vigencia_garantia'];
            $ubicViejo=$row['Ubic_equipo'];
            $responsableViejo=$row['Responsable_equipo'];
            $mantenimientoViejo=$row['Mantenimiento'];
           
        }
    ?>

<div class="container">
        <form name="formulario" class="form_position" role="form" method="post" onsubmit="return validarFormulario()"> 

            <div class="form-outline mb-4">
                <input type="text" name="marca" class="form-control" placeholder="<?php echo $marcaViejo?>" maxlength="30"/>
                <label class="form-label">Marca</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="modelo" class="form-control"  placeholder="<?php echo $modeloViejo?>" maxlength="30"/>
                <label class="form-label">Modelo</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="serie" class="form-control" placeholder="<?php echo $serieViejo?>" maxlength="30"/>
                <label class="form-label">Serie</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="descripcion" class="form-control" placeholder="<?php echo $descripcionViejo?>" maxlength="50"/>
                <label class="form-label">Descripción</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="proveedor" class="form-control" placeholder="<?php echo $proveedorViejo?>" maxlength="30"/>
                <label class="form-label">Proveedor</label>
            </div>

            <div class="form-outline mb-4">
                <input type="date" name="fecha-adquisicion" class="form-control" placeholder="<?php echo $fechaAdqViejo?>"/>
                <label class="form-label">Fecha de adquisición</label>
            </div>

            <?php
            if(!preg_match("/0{4}/" , $garantiaViejo)){
                ?>
                <div class="form-outline mb-4" id="garantia1">
                    <input type="date" name="garantia" class="form-control" placeholder="<?php echo $garantiaViejo?>"/>
                    <label class="form-label">Garantía</label>
                </div>

                <div class="form-outline mb-4" id="garantia2">
                    <input type="date" name="vigencia-garantia" class="form-control" placeholder="<?php echo $vigenciaViejo?>"/>
                    <label class="form-label">Vigencia de la garantia</label>
                </div>
                <?php
                }
            ?>

            <div class="form-outline mb-4">
                <input type="text" name="ubic-equipo" class="form-control" placeholder="<?php echo $ubicViejo?>" maxlength="30"/>
                <label class="form-label">Ubicación del equipo</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="responsable-equipo" class="form-control" placeholder="<?php echo $responsableViejo?>" maxlength="30"/>
                <label class="form-label">Responsable del equipo</label>
            </div>

            <div class="form-outline mb-4">
                <input type="text" name="mantenimiento" class="form-control" placeholder="<?php echo $mantenimientoViejo?>" maxlength="30"/>
                <label class="form-label">Mantenimiento</label>
            </div>
       
            <div class="row sm-4">
                <div class="col d-flex justify-content-center"></div>
            </div>

            <button type="submit" class="btn btn-info btn-block mb-4">Modificar</button><br>
        </form>
    </div>
    <br>
    </body>

    <?php
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
        $responsableEquipo=mysqli_real_escape_string($con, $_POST['responsable-equipo']);

        if($marca<>'' && $marca<>NULL){
            $sql="UPDATE equipos_laboratorio 
            SET Marca='$marca', Modelo='$modelo', Serie='$serie', Descripcion='$descripcion', Proveedor='$proveedor', Fecha_adquisicion='$fechaAdquisicion', Garantia='$garantia', Vigencia_garantia='$vigenciaGarantia', Ubic_equipo='$ubicEquipo', Responsable_equipo='$responsableEquipo', Mantenimiento='$mantenimiento' 
            WHERE Clv_Equipo=$idNuevo;";
            ?>
            <div class="container">
              <div class="alert alert-success" role="alert">
                Equipo modificado
              </div>
            </div>
            <?php
        }

        if(!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
        }
        
      mysqli_close($con);
      ?>