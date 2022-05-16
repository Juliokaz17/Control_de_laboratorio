<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    $con=mysqli_connect("localhost","root","","tienda");

    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($con,"SELECT * FROM carrito_compras;");
    ?>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Tienda</title>
      <!-- Favicon-->
      <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
      <!-- Font Awesome icons (free version)-->
      <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="css/styles_carrito.css" rel="stylesheet" />
</head>
<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a href="#page-top">
                    <span class="glyphicon glyphicon-home"></span>
                  </a>
                <a class="navbar-brand" href="index.html"><img src="assets/img/navbar-logo.png" alt="..." /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="iniciar_sesion.html">Iniciar sesión</a></li>
                        <li class="nav-item"><a class="nav-link" href="usuarios.PHP">Información del usuario</a></li>
                        <li class="nav-item"><a class="nav-link" href="carrito.PHP">Carrito</a></li>
                        <li class="nav-item"><a class="nav-link" href="contacto.html">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>

    <header class="masthead">
    <!--Utilizamos un container responsivo-->
    <div class="container">
    <h2 class="section-heading text-uppercase">Esto es lo que tienes en el carrito</h2>
        <table class="table">
          <thead>
            <tr>
              <th>Marca</th>
              <th>Producto</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while($row = mysqli_fetch_array($result)){
              echo "<tr>";
              echo "<td>" . $row['Marca'] . "</td>";
              echo "<td>" . $row['Producto'] . "</td>";
              echo "</tr>";
            }
            mysqli_close($con);
          ?>  
          </tbody>
        </table>
        <form role="form" action="borrar_carrito.PHP" method="post"> 
          <button class="btn btn-primary btn-m text-uppercase" type="submit">
          Borrar
          </button>
        </form>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
      </header>
</body>
</html>