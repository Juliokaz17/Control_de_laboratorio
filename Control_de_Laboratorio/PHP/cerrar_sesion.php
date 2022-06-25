<?php
      session_start();
  ?>
  <!DOCTYPE html>
  <html>
    <body>
        
        <?php
            // borrar las variables de sesión
            session_unset();

            // destruir la sesión
            session_destroy();
            //Usamos redirect
            header("Location:http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/inicio.php");
            exit();
        ?>

    </body>
  </html> 