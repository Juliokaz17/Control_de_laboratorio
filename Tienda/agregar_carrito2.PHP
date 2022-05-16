<?php
    $con=mysqli_connect("localhost","root","","tienda");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    // escape variables for security
    $marca = 'Nuova';
    $producto = 'Sofa cama';
    $sql="INSERT INTO carrito_compras (marca, producto) 
    VALUES ('$marca', '$producto');";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }
    echo "Agregado al carrito";

    mysqli_close($con);
  ?>