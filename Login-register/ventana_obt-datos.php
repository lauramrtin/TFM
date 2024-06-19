<?php 

    session_start(); //inicia la sesion

    if(!isset($_SESSION['usuario'])){ //no permite acceder a obt-datos mediante el buscador, hay que hacer login
        echo'
        <script>
            alert("Por favor inicie sesión");
            window.location = "index.php"; 

        </script>
    ';
    session_destroy(); //destruye la sesión
    die(); //se detiene y no ejecuta el resto del código
    }
    session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - Laura Martín</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h1>Bienvenido</h1>
                        <h3>¿Te gustaría acceder a tus datos?</h3>
                        <p>Pulse en el botón de abajo para obtener sus datos</p>
                        
                        <a href="prueba.php" ><button id="btn_obtener-datos">Obtener</button></a>
                        <a href="php/cerrar_sesion.php"><button id="btn_obtener-datos">Cerrar sesion</button></a>


                    </div>
                </div>

               
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>

