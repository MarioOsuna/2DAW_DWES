<?php

/**
 * 
 * Crea un formulario de login que permita al usuario recordar los datos introducidos. Incluye una opción para borrar la información almacenada.
 * @author Mario Osuna Ordóñez
 * 
 */
function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}

$nombre = $pass = $msgErrorNombre = $msgErrorPass = "";
$lprocesaformulario = false;

if (isset($_COOKIE['usuario']) && isset($_COOKIE['pass'])) {
    $nombre = $_COOKIE['usuario'];
    $pass = $_COOKIE['pass'];
}

if (isset($_POST["enviar"])) {

    $nombre = clearData($_POST["nombre"]);
    $pass = clearData($_POST["pass"]);
    $lprocesaformulario = true;

    if (empty($nombre)) {
        $msgErrorNombre = "Nombre requerido";

        $lprocesaformulario = false;
    }

    if (empty($pass)) {
        $msgErrorPass = "Contraseña requerida";

        $lprocesaformulario = false;
    }
}

if ($lprocesaformulario) {

    if (isset($_POST['Borrar'])) {
        setcookie('usuario', $nombre, time() - 3600);
        setcookie('pass', $pass, time() - 3600);
    }else{
        setcookie('usuario', $nombre, time() + 3600);
        setcookie('pass', $pass, time() + 3600);
    }

    echo "Bienvenido " . $nombre . "</br>";
}

?>

<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Formulario</title>

</head>

<body>
    <h2>Cookies</h2>
    <!--<form action="Datosform2.php" enctype="multipart/form-data" method="get">-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">

        <hr />
        <?php
        /*EJEMPLO VARIABLES*/
        echo "<label >Nombre: </label>";
        echo "<input type=\"text\" placeholder='Nombre' name='nombre' value=" . $nombre . ">* <b style='color: red;'>" . $msgErrorNombre . "</b><br/>";
        echo "<label >Password: </label>";
        echo "<input type='password' placeholder='password' name='pass' value=" . $pass . ">*<b style='color: red;'>" . $msgErrorPass . "</b><br/>";

        echo "<input type=\"checkbox\" id=\"Borrar\" name='Borrar' value=\"Borrar Datos\">";
        echo "<label for=\"Borrar\"> Borrar Datos</label><br>";
        ?>

        <hr />


        <button type="submit" name="enviar">Enviar</button><br />


    </form>



</body>

</html>