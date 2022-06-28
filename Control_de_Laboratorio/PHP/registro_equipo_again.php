<?php
    session_start();
    $_SESSION['details']=NULL;
    header("Location:http://localhost/Julio_XAMPP/Control_de_Laboratorio/PHP/eqs_laboratorio.php");
    exit();
?>