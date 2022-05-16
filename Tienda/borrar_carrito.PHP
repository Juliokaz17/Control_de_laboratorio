<?php
    $con=mysqli_connect("localhost","root","","tienda");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    $sql="DELETE FROM carrito_compras;";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    echo "Datos borrados";
    mysqli_close($con);
  ?>