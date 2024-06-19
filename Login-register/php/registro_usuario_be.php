<?php

    include 'conexion_be.php';

    //Declaramos las variables
    $nombre_completo = $_POST['nombre_completo'];
    $dni = $_POST['dni'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $cp = $_POST['cp'];
    $sexo = $_POST['sexo'];


    //ENCRIPTADO CONTRASEÑA
    $contrasena = hash('sha512', $contrasena); //$contrasena obtiene el valor del input contraseña

    //Guardar datos en la DB
    $query = "INSERT INTO usuarios(nombre_completo, dni, correo, usuario, contrasena, edad, pais, ciudad, cp, sexo) 
              VALUES('$nombre_completo', '$dni','$correo','$usuario','$contrasena','$edad','$pais','$ciudad','$cp','$sexo')";

    //Verificar correo úncio--- para acceder a la tabla usuarios necesito pasar por la conexion
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' ");

    if(mysqli_num_rows($verificar_correo) > 0){
        echo '
            <script>
                alert("Este correo ya ha sido registrado");
                window.location = "../index.php"; 
            </script>
        ';
        exit(); //sale del script y no ejecuta el resto de código luego no continúa con el registro del user
    }

    //Verificar usuario único
    $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' ");

    if(mysqli_num_rows($verificar_usuario) > 0){
        echo '
            <script>
                alert("Este usuario ya ha sido registrado");
                window.location = "../index.php"; 
            </script>
        ';
        exit(); //sale del script y no ejecuta el resto de código luego no continúa con el registro del user
    }

    //Verificar dni único
    $verificar_dni = mysqli_query($conexion, "SELECT * FROM usuarios WHERE dni='$dni' ");

    if(mysqli_num_rows($verificar_dni) > 0){
        echo '
            <script>
                alert("Este dni ya ha sido registrado");
                window.location = "../index.php"; 
            </script>
        ';
        exit(); //sale del script y no ejecuta el resto de código luego no continúa con el registro del user
    }


    //Ejecutar la query
    $ejecutar = mysqli_query($conexion, $query); //1º abrimos la caja con la llave conexion, 2º cogemos el libro usuario

    if($ejecutar){//window.location...redirige a index
        echo '
            <script>
                alert("Usuario registrado correctamente");
                window.location = "../index.php"; 
            </script>
        ';
    } else {
        echo '
            <script>
                alert("Ha ocurrido un error. Inténtelo de nuevo");
                window.location = "../index.php"; 
            </script>
        ';
    }
    mysqli_close($conexion);
    //                window.location = "../ventana_obt-datos.php"; 

?>

