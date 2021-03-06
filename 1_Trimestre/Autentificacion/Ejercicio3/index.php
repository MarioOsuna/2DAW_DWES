<?php

/**
 * Autentificación 
 *
 *Desarrolla un sistema de registro y autentificación que incluya distintos perfiles de usuarios.
 * Crea un menú de opciones y páginas correspondientes en función del perfil.
 * 
 * Administrador
 * usuario: Admin
 * Pass: admin
 * 
 */

/*Creamos la sesión y declaramos*/
session_start();
if (!isset($_SESSION['aut'])) {
    $_SESSION['aut'] = false;     // Valor true al autentificar.
    $_SESSION['user'] = 'Invitado'; //Información de usuario.
}




function displayLogout()
{
    echo "<a href=\"cerrarsesion.php\">Salir</a>";
}

function limpiarDatos($dato): string
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

$usuario = $psw = "";
$msgUsuario = $msgPassword = "";
$lprocesaFormulario = false;
if(isset($_POST["regisro"])){

    header('location: registro.php');
}
if (isset($_POST["enviar"])) {
    $lprocesaFormulario = "true";

    /*Limpiamos datos de entrada*/
    $usuario = limpiarDatos($_POST["usuario"]);
    $psw = limpiarDatos($_POST["psw"]);

    /*Comprobación de usuario*/
    if (empty($usario)) {
        $clase_error = "clase_error";
        $msgUsuario = "&#9888; Obligatorio";
    }
    /*Comprobación de cotraseña*/
    if (empty($psw)) {
        $clase_error = "clase_error";
        $msgPassword =  "&#9888; Obligatorio";
        $lprocesaFormulario = false;
    }
}
if ($lprocesaFormulario) {
    /*Comprobación de credenciales*/
    if (($usuario == 'admin') and ($psw == 'admin')) {
        $_SESSION['aut'] = true;
        $_SESSION['user'] = 'Administrador';
        header('Location: publica.php');
    }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <title>Autentificación</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <header>
        <h1>Autentificación básica.</h1>

        <h2>Usted está como: <?php echo $_SESSION['user']; ?></h2>
        <?php
        /*Caja de información de cuenta o formulario de login en función de la autentificación*/
        if ($_SESSION['aut']) {
            displayLogout();  //Información de cuenta
        } else {
            echo "<form action = \"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method = \"POST\" >";
            echo "<label>user:</label><input type=\"text\" name=\"usuario\" value = \"" . $usuario . "\" placeholder = \"" . $msgUsuario . "\"></br></br>";
            echo "<label>psw:</label><input type=\"password\" name=\"psw\" value = \"" . $psw . "\" placeholder = \"" . $msgPassword . "\"></br></br>";
            echo "<input type=\"submit\" value =\"Login\" name=\"enviar\"><br><br><br>";
            echo "Si no tiene una cuenta puede registrarse a continuación:<br><br><br>";
            echo "<input type=\"submit\" value =\"Registrarse\" name=\"regisro\">";

            echo "</form>";
        }

        ?>
    </header>
 


    <p>index</p>
</body>

</html>