<?php
    $con=mysqli_connect("localhost","root","","tienda");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // escape variables for security
    $nombre = mysqli_real_escape_string($con, $_POST['nombre']);
    $correo = mysqli_real_escape_string($con, $_POST['correo']);
    $contraseña = mysqli_real_escape_string($con, $_POST['contrasena']);
    $fecha = mysqli_real_escape_string($con, $_POST['fecha']);
    $num_tarjeta = mysqli_real_escape_string($con, $_POST['num_tarjeta']);
    $dir_postal = mysqli_real_escape_string($con, $_POST['dir_postal']);
    $sql="INSERT INTO usuarios (nombre, correo, contrasena, fecha_de_nacimiento, num_tarjeta, direccion_postal) 
    VALUES ('$nombre', '$correo', '$contraseña','$fecha', '$num_tarjeta', '$dir_postal');";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    echo "Cuenta creada";

    mysqli_close($con);
  ?>