<?php 

    session_start();

    include 'conexion_be.php';

    $correo = $_POST['correo']; //guarda el valor del input name='correo'del index en la variable $correo
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena); //para no meter el hash sino la contraseña original

    
    

    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE  
    correo='$correo' and contrasena='$contrasena'"); //mysqli_query permite la conexion a la db con la llave $conexion

    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo; //para no acceder a ventana de obt-datos a través del buscador
        header("location: ../ventana_obt-datos.php");
        exit;
    }else{
        echo'
            <script>
                alert("Usuario no encontrado");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }
    mysqli_close($conexion);

?>