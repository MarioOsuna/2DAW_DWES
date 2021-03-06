<?php


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

$usuario = $psw = $psw2 = $email = "";
$msgUsuario = $msgPassword = $msgPassword2 = $msgEmail = "";
$lprocesaFormulario = false;
if (isset($_POST["enviar"])) {
    $lprocesaFormulario = "true";

    /*Limpiamos datos de entrada*/
    $usuario = limpiarDatos($_POST["usuario"]);
    $psw = limpiarDatos($_POST["psw"]);
    $psw2 = limpiarDatos($_POST["psw"]);
    $email=limpiarDatos($_POST["Email"]);

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
    if (empty($email)) {
        $clase_error = "clase_error";
        $msgEmail =  "&#9888; Obligatorio";
        $lprocesaFormulario = false;
    }
    if ($psw != $psw2) {
        $clase_error = "clase_error";
        $msgPassword2 =  "&#9888; Contraseñas no coincidens";
        $lprocesaFormulario = false;
    }
}
if ($lprocesaFormulario) {
    /*Comprobación de credenciales*/
    if (($usuario != 'admin') and ($psw != 'admin')) {
        /*  $_SESSION['aut'] = true;
        $_SESSION['user'] = 'Administrador'; */
        $_SESSION['aut'] = true;
        $_SESSION['user'] = $usuario;
        $_SESSION['pass'] = $pass;
        header('Location: publica.php');
    }
}


?>


<!DOCTYPE html>
<html lang="es">

<head>
    <title>Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h1>Formulario de registro</h1>
    <?php
    if ($_SESSION['aut']) {
        echo "<a href=\"cerrarsesion.php\">Salir</a>";
    } else {
        echo "<form action = \"" . htmlspecialchars($_SERVER["PHP_SELF"]) . "\" method = \"POST\" >";
        echo "<label>Email:</label><input type=\"text\" name=\"Email\" value = \"" . $email . "\" placeholder = \"" . $msgEmail . "\"></br></br>";
        echo "<label>user:</label><input type=\"text\" name=\"usuario\" value = \"" . $usuario . "\" placeholder = \"" . $msgUsuario . "\"></br></br>";
        echo "<label>psw:</label><input type=\"password\" name=\"psw\" value = \"" . $psw . "\" placeholder = \"" . $msgPassword . "\"></br></br>";
        echo "<label>Confirmar contraseña:</label><input type=\"password\" name=\"psw2\" value = \"" . $psw2 . "\" placeholder = \"" . $msgPassword2 . "\"></br></br>";
        echo "<input type=\"submit\" value =\"Registrarme\" name=\"enviar\"><br><br><br>";


        echo "</form>";
    }


    ?>
    <p>Registro</p>

</body>

</html>