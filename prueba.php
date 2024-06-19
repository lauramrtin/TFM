<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register_db";


// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}
// Consulta para obtener los datos de los usuarios
$sql = "SELECT nombre_completo FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Recorre los resultados
    while($row = $result->fetch_assoc()) {
        // Anonimiza los datos
        $nombre_anonimo = str_repeat("*", strlen($row['nombre_completo']));
        
    }
} else {
    echo "No se encontraron usuarios";
}

// Cierra la conexión a la base de datos
// $conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventana datos obtenidos Laura Martín</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> -->


     <link rel="stylesheet" href="assets/css/estilos.css"> 
</head>
    <body>
        
        <main>
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h1>Estos son los datos obtenidos</h1>
                            
                            <?php
                            
                            $sql = "SELECT * FROM usuarios";
                            $result = $conn->query($sql);
                            

                            if ($result->num_rows > 0) {
                                // Recorre los resultados
                                while($row = $result->fetch_assoc()) {


                                    //NOMBRE_COMPLETO--------------------
                                     // Obtiene la primera letra del nombre
                                    $primera_letra = substr($row['nombre_completo'], 0, 1);

                                    // Genera una cadena de asteriscos con la misma longitud que el nombre completo (excepto la primera letra)
                                    $asteriscos = str_repeat("*", strlen($row['nombre_completo']) - 1);

                                    // Combina la primera letra con los asteriscos
                                    $nombre_anonimo = $primera_letra . $asteriscos;


                                    //USUARIO-------------------------------
                                    // Obtiene el valor de la columna "usuario"
                                    $usuario = $row['usuario'];
                                    $pais = $row['pais'];
                                    $ciudad = $row['ciudad'];
                                    $edad = $row['edad'];
                                    $sexo = $row['sexo'];



                                    //DNI---------------------------------
                                    // Obtiene la primera letra del nombre
                                    $cuatro_primeras_letras = substr($row['dni'], 0, 4);

                                    // Genera una cadena de asteriscos con la misma longitud que el nombre completo (excepto la primera letra)
                                    $asteriscos_dni = str_repeat("*", strlen($row['dni']) - 1);

                                    // Combina los primeros 4 dígitos con los asteriscos
                                    $dni_anonimo = $cuatro_primeras_letras . $asteriscos_dni;



                                    //EMAIL-----------------------------
                                    // Obtiene el correo electrónico
                                    $email = $row['correo'];

                                    // Encuentra la posición del carácter "@"
                                    $arroba_pos = strpos($email, '@');

                                    // Obtiene la primera letra del correo electrónico
                                    $primera_letra = substr($email, 0, 1);

                                    // Genera una cadena de asteriscos hasta el carácter "@"
                                    $asteriscos = str_repeat("*", $arroba_pos - 1);

                                    // Obtiene el dominio completo (por ejemplo, "@gmail.com")
                                    $dominio = substr($email, $arroba_pos);

                                    // Combina la primera letra, los asteriscos y el dominio
                                    $email_anonimo = $primera_letra . $asteriscos . $dominio;



                                    //CÓDIGO POSTAL------------------------
                                     // Obtiene la primera letra del nombre
                                     $dos_primeros_num = substr($row['cp'], 0, 2);

                                     // Genera una cadena de asteriscos con la misma longitud que el nombre completo (excepto la primera letra)
                                     $asteriscos_cp = str_repeat("*", strlen($row['cp']) - 1);
 
                                     // Combina los primeros 4 dígitos con los asteriscos
                                     $cp_anonimo = $dos_primeros_num . $asteriscos_cp;
 
                                    
                                    // Muestra los datos sin anonimizar
                                    // echo "Nombre: " .$row['nombre_completo'] . "<br>";
                                    // echo "Usuario: " . $row['usuario'] . "<br>";
                                    // echo "Email: " . $email . "<br>";
                                    // echo "DNI: " . $row['dni'] . "<br>";
                                    // echo "Edad: " . $row['edad'] . "<br>";
                                    // echo "Sexo: " . $row['sexo'] . "<br>";
                                    // echo "País: " . $row['pais'] . "<br>";
                                    // echo "Ciudad: " . $row['ciudad'] . "<br>";
                                    // echo "Código Postal: " . $row['cp'] . "<br>";
                                    
                                }
                            } else {
                                echo "No se encontraron usuarios";
                            }

                            ?>

                             <table id="tabla" border="1" bordercolor="white" border-collapse= "collapse">
                            <tr>
                                <td style="padding: 8px;text-align: center;width:100px">Nombre</td>
                                <td style="padding: 8px;text-align: center;width:100px">Usuario</td>
                                <td style="padding: 8px;text-align: center;width:100px">Email</td>
                                <td style="padding: 8px;text-align: center;width:100px">DNI</td>
                                <td style="padding: 20px;text-align: center;width:100px">Edad</td>
                                <td style="padding: 8px;text-align: center;width:100px">Sexo</td>
                                <td style="padding: 8px;text-align: center;width:100px">País</td>
                                <td style="padding: 8px;text-align: center;width:100px">Ciudad</td>
                                <td style="padding: 8px;text-align: center;width:100px">Código Postal</td>
                            </tr>
                        

                            <tr>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $nombre_anonimo . "<br>"?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $usuario . "<br>" ?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $email_anonimo . "<br>"?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $dni_anonimo . "<br>" ?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $edad . "<br>" ?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $sexo . "<br>" ?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $pais . "<br>" ?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $ciudad . "<br>" ?></td>
                                <td style="padding: 8px;text-align: center;width:100px"><?php echo $cp_anonimo . "<br>";?></td>


                            </tr>
                            </table>
                            


                        <a 
                        href="php/cerrar_sesion.php" style= "color:white">
                        <p></p>
                        <button id="btn_obtener-datos">Cerrar sesion</button>
                        </a>


                    </div>
                </div>
            </div>
        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>




