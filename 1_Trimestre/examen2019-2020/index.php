<?php

/**
 * Implementa un sistema de navegación sobre los escenarios del ejercicio, teniendo en cuenta los siguientes perfiles 
 * de usuario:
 * 
 * Perfil:EJ1. Acceso al ejerccio 1. password:EJ1
 * Perfil:EJ2. Acceso al ejercicio 2. password:EJ2
 * Perfil: ADMIN. Acceso a los ejercicios 1,2. password:ADMIN
 * 
 */

session_start();

function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}

$msgErrorNombre  = $msgErrorPass = $msgError = "";
$nombre = $pass = "";
$lprocesaformulario  = false;
if (!isset($_SESSION['usuario'])) {

    $_SESSION['usuario'] = "Invitado";
    $_SESSION['iniciado'] = false;
}

if (isset($_POST['enviar'])) {

    $nombre = clearData($_POST["name"]);
    $pass = clearData($_POST["pass"]);

    $lprocesaformulario = true;

    if (empty($nombre)) {

        $msgErrorNombre = "Debe introducir un nombre";
        $lprocesaformulario = false;
    }
    if (empty($pass)) {

        $msgErrorPass = "Debe introducir una contraseña";
        $lprocesaformulario = false;
    }
}
$pag = $msg = $form = "";
if ($lprocesaformulario) {

    if ($nombre == "EJ1" && $pass == "EJ1") {
        $_SESSION['usuario'] = $nombre;
        $_SESSION['iniciado'] = true;
        $pag = "<h2>Bienvenido " . $_SESSION['usuario'] . "</h2><br>";

    } else {
        if ($nombre == "EJ2" && $pass  == "EJ2") {
            $_SESSION['usuario'] = $nombre;
            $_SESSION['iniciado'] = true;
            $pag = "<h2>Bienvenido " . $_SESSION['usuario'] . "</h2><br>";
           
        } else {
            if ($nombre == "ADMIN" && $pass  == "ADMIN") {
                $_SESSION['usuario'] = $nombre;
                $_SESSION['iniciado'] = true;


                $pag = "<h2>Bienvenido " . $_SESSION['usuario'] . "</h2><br>";

              
            } else {

                $msgErrorNombre = "Usuario erroneo";
                $lprocesaformulario = false;
            }
        }
    }
} else {
}


if ($_SESSION['iniciado'] == true) {

    $form = "";
    switch ($_SESSION['usuario']) {
        case "EJ1":
            $pag .= "<ul><li><a href='1.php'>Noticias</a></li></ul>";
            break;
        case "EJ2":
            $pag .= "<ul><li><a href='2.php'>La siete y media</a></li></ul>";
            break;
        case "ADMIN":
            $pag .= "<ul>
            <li><a href='1.php'>Noticias</a></li>
            <li><a href='2.php'>La siete y media</a></li>
            </ul>";
            break;
    }
    $msg = "<a href='cerrarsesion.php'>Cerrar sesión</a>";
} else {
    $form = "<label for='name'>Name:</label>";
    $form .= " <input type='text' name='name' placeholder='Name' id='name' value='$nombre'>*<b style='color: red;'> " . $msgErrorNombre . "</b><br><br>";
    $form .= " <label for='pass'>Password:</label>";
    $form .= " <input type='password' name='pass' placeholder='pass' id='pass' >*<b style='color: red;'> " . $msgErrorPass . "</b><br><br>";

    $form .= " <input type=\"submit\" value=\"iniciar sesión\" name=\"enviar\">";
    $form .= "<hr>";
}



?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenario 3</title>
</head>

<body>
    <form action="index.php" enctype="multipart/form-data" method="post">

        <h1>Inicio de sesión</h1>
        <hr><br>
        <?php
        echo $form;
        echo $pag;
        echo "<br>" . $msg;



        ?>



    </form>

</body>

</html>