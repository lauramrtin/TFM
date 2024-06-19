<?php 
    
    session_start(); //inicia la sesion
    session_destroy();
    header("location: ../index.php");

?>