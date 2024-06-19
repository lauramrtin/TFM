<?php 

    session_start(); //inicia la sesion

    if(isset($_SESSION['usuario'])){ 
        header("location: ventana_obt-datos.php");
    }
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
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Registrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="php/login_usuario_be.php" method="POST" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electrónico" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Entrar</button>
                    </form>

                    <!--Register  POST evita que se muestren los datos en la barra buscador-->
                    <form action="php/registro_usuario_be.php" method="POST" class="formulario__register">
                        
                        <h2>Registrarse</h2>
                        <input type="text" placeholder="Nombre completo" name="nombre_completo">
                        <!-- <input type="int" placeholder="Edad" name="edad"> -->
                        <input type="text" placeholder="DNI" name="dni">
                        <input type="text" placeholder="Correo Electrónico" name="correo">

                        <input type="text" placeholder="Ciudad" name="ciudad">
                        <input type="text" placeholder="País" name="pais">
                        <input type="int" placeholder="Código Postal" name="cp">
                        <select name="sexo" style="margin-top: 20px;border: none;width: 100%;padding: 10px;background: #F2F2F2;font-size: 16px;outline: none;" >
                            <option value ="sexo">Sexo</option>
                            <option value ="Masculino">Masculino</option>
                            <option value ="Femenino">Femenino</option>
                            <option value ="X">X</option>
                        </select>
                        <select  name="edad" style="margin-top: 20px;border: none;width: 100%;padding: 10px;background: #F2F2F2;font-size: 16px;outline: none;" >
                            <option value ="edad">Edad</option>
                            <option value ="<25">Menor de 25</option>
                            <option value ="25-50">Entre 25-50</option>
                            <option value ="50<">Mayor 50</option>
                        </select>


                        <input type="text" placeholder="Usuario" name="usuario">
                        <input type="password" placeholder="Contraseña" name="contrasena">

                        

                        <button>Registrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>

