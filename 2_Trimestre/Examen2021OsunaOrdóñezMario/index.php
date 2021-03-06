<?php

/**
 * @author Mario Osuna Ordóñez
 */

include("./config/config.php");
include("./class/Usuario.php");
include("./class/Obras.php");
include("./class/Logs.php");
include("./class/Tarifas.php");
include("./class/Entradas.php");

session_start();
$msgErrorNombre  = $msgErrorPass = $msgError = $msgErrorFile = $msgErrorTitulo = $msgErrorFechaIn = $msgErrorFechaFin = $msgErrorDesc = "";
$nombre = $pass = $titulo = $fechaIn = $fechaFin = $portada = $desc = "";
$lprocesaformulario  = $ingresarObra = false;

$log = "";
$menu = "";
$menu = "<li><a href='home.php'>Home</a></li>
<li><a href='index.php'>Inicar sesión</a></li>";

function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}
//Sesiones usuario y perfil
if (!isset($_SESSION['usuario'])) {
    $_SESSION["user"] = Usuario::singleton();
    $_SESSION["log"] = Logs::singleton();
    $_SESSION["obra"] = Obras::singleton();
    $_SESSION["tarifas"] = Tarifas::singleton();
    $_SESSION["entradas"] = Entradas::singleton();
    $_SESSION["asientos"] = array(
        "A" => array("1" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "2" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "3" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "4" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "5" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]),
        "B" => array("6" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "7" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "8" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "9" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "10" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]),
        "C" => array(
            "11" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "12" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "13" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "14" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "15" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            "16" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "17" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "18" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "19" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0], "20" => [0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
        )
    );

    $_SESSION['usuario'] = "Invitado";
    $_SESSION['perfil'] = "Invitado";
    $_SESSION['iniciado'] = false;
    $_SESSION["idUser"] = null;
    $_SESSION["intentos"] = 0;
}

$log = "<h2>¡Bienvenido! Usuario: " . $_SESSION['usuario'] . " </h2> 
            <p>Inicia sesión para ver obras de teatro</p>
            <form action='index.php' method='post' enctype='multipart/form-data'>
            <label for='usuario'>Usuario:</label> <input type='text' name='name' id='usuario' placeholder='heisenberg'>*<b style='color: red;'>$msgErrorNombre</b><br>
            <br>
            <label for='pass'>Password:</label> <input type='password' name='pass' id='pass' placeholder='1234'>*<b style='color: red;'>$msgErrorPass</b><br>
            <br> <button type='submit' name='log' value='log in'>Log in</button>
        </form>";



if (isset($_POST['log'])) {

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

if ($lprocesaformulario) {
    $array = $_SESSION["user"]->get($nombre);
    $getID = $array[0]["id"];

    //var_dump($array);
    $logs = $_SESSION["log"]->set($nombre);

    if (sizeof($array) == 1) {
        if ($array[0]["bloqueado"] == 0) {
            // echo "no está bloqueado:" . $_SESSION["intentos"];

            if ($_SESSION["intentos"] < 3) {

                if ($array[0]["password"] == $pass) {


                    $_SESSION["idUser"] = $array[0]["id"];
                    $_SESSION["usuario"] = $array[0]["usuario"];
                    $_SESSION["perfil"] = $array[0]["perfiles_perfil"];
                    $_SESSION['iniciado'] = true;
                } else {
                    //echo $_SESSION["intentos"];
                    $_SESSION["intentos"]++;
                }
            } else {
                $bloquear = $_SESSION["user"]->bloquear($getID);

                $log = "<h2>Su usuario ha sido bloqueado por intentar acceder más de tres veces</h2>                
            <form action='index.php' method='post' enctype='multipart/form-data'>
            <label for='usuario'>Usuario:</label> <input type='text' name='name' id='usuario' placeholder='heisenberg'>*<b style='color: red;'>$msgErrorNombre</b><br>
            <br>
            <label for='pass'>Password:</label> <input type='password' name='pass' id='pass' placeholder='1234'>*<b style='color: red;'>$msgErrorPass</b><br>
            <br> <button type='submit' name='log' value='log in'>Log in</button>
        </form>";

                $_SESSION["intentos"] = 0;
                echo $_SESSION["intentos"];
            }
        } else {
            $log = "<h2>Su usuario está bloqueado</h2>            
        <form action='index.php' method='post' enctype='multipart/form-data'>
        <label for='usuario'>Usuario:</label> <input type='text' name='name' id='usuario' placeholder='heisenberg'>*<b style='color: red;'>$msgErrorNombre</b><br>
        <br>
        <label for='pass'>Password:</label> <input type='password' name='pass' id='pass' placeholder='1234'>*<b style='color: red;'>$msgErrorPass</b><br>
        <br> <button type='submit' name='log' value='log in'>Log in</button>
    </form>";
        }
    }
}

if (isset($_POST['ingresar'])) {
    $titulo = clearData($_POST["titulo"]);
    $desc = clearData($_POST["descripcion"]);
    $fechaIn = $_POST["fechaIn"];
    $fechaFin = $_POST["fechaFin"];

    $ingresarObra = true;
    //Añadir foto 
    $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG");
    $temp = explode(".", $_FILES["portada"]["name"]);
    $extension = end($temp);
    if ((($_FILES["portada"]["type"] == "image/gif")
            || ($_FILES["portada"]["type"] == "image/jpeg")
            || ($_FILES["portada"]["type"] == "image/jpg")
            || ($_FILES["portada"]["type"] == "image/pjpeg")
            || ($_FILES["portada"]["type"] == "image/x-png")
            || ($_FILES["portada"]["type"] == "image/png"))
        && ($_FILES["portada"]["size"] < 400000)
        && in_array($extension, $allowedExts)
    ) {
        if ($_FILES["portada"]["error"] > 0) {
            $ingresarObra = false;
            $msgErrorFile = "Error al subir la imagen: " . $_FILES["portada"]["error"] . "<br/>";
        } else {
            $portada = $_FILES["portada"]["name"];
            move_uploaded_file(
                $_FILES["portada"]["tmp_name"],
                "img/" . $_FILES["portada"]["name"]
            );

            //echo "<img src=\"img/$portada\" alt=''>";
        }
    } else {
        $ingresarObra = false;
        $msgErrorFile = "Archivo no válido";
    }

    //Comprobar resto de datos
    if (empty($titulo)) {
        $ingresarObra = false;
        $msgErrorTitulo = "Debe ingresar un título";
    }
    if (empty($desc)) {
        $ingresarObra = false;
        $msgErrorDesc = "Debe ingresar una descripción";
    }
    if (empty($fechaIn)) {
        $ingresarObra = false;
        $msgErrorFechaIn = "Introduzca fecha de inicio";
    }
    if (empty($fechaFin)) {
        $ingresarObra = false;
        $msgErrorFechaFin = "Introduzca fecha de fin";
    }
}
//comprobar perfil para mostrar unos u otros datos
$perfil = $_SESSION['perfil'];

if ($_SESSION['iniciado'] == true) {
    $log = "<h2>¡Bienvenido! Usuario: " . $_SESSION['usuario'] . " </h2>";

    switch ($perfil) {

        case 'gerente':
            $menu = "
            <li><a href='home.php'>Home</a></li>
            <li><a href='mostrarLogs.php'>Logs</a></li>
            <li><a href='index.php'>Introducir obras</a></li>
            <li><a href='cerrarsesion.php'>cerrar sesión</a></li>
            ";

            $log .= "<h2>GERENTE</h2>
            
            <form action='index.php' method='post' enctype='multipart/form-data'>
            <label for='titulo'>titulo:</label> <input type='text' name='titulo' id='titulo' placeholder='heisenberg'>*<b style='color: red;'>$msgErrorTitulo</b><br>
            <br>
            <label for='descripcion'>descripcion:</label> <input type='text' name='descripcion' id='pass' placeholder='descripción'>*<b style='color: red;'>$msgErrorDesc</b><br>
            <label for='portada'>portada:</label> <input type='file' name='portada' id='portada'>*<b style='color: red;'>$msgErrorFile</b><br>
            <label for='fechaIn'>fecha de Inicio:</label> <input type='date' name='fechaIn' id='fechaIn' >*<b style='color: red;'>$msgErrorFechaIn</b><br>
            <label for='fechaFin'>fecha de fin:</label> <input type='date' name='fechaFin' id='fechaFin' >*<b style='color: red;'>$msgErrorFechaFin</b><br>
            <br> <button type='submit' name='ingresar' value='ingresar'>Registrar obra</button> </form>
            ";
            // <!--<input type='hidden' name='MAX_FILE_SIZE' value='800000'>-->

            break;
        case 'amigo':
            $menu = "
            <li><a href='home.php'>Home</a></li>
            <li><a href='index.php'>valorar</a></li>
            <li><a href='cerrarsesion.php'>cerrar sesión</a></li>";

            $obras = $_SESSION["obra"]->getDatos();
            $log = "<h2>Hola amigo</h2>            
           ";
            $log .= "
            <ul class='normal'>";

            foreach ($obras as $key => $value) {

                // echo "<br>" . $value['portada'];
                $log .= "
                <form action='index.php?id=" . $value['id'] . "' method='post' enctype='multipart/form-data'>
                <li><img src='./img/" . $value['portada'] . "' alt=''><br><br><br>    
                <br><label><input type='radio' name='valoracion' value='0'>0 - mala</label><br>
                <label><input type='radio' name='valoracion' value='1'>1 - mee</label><br>
                <label><input type='radio' name='valoracion' value='2'>2 - medio que</label><br>
                <label><input type='radio' name='valoracion' value='3'>3 - está bien</label><br>
                <label><input type='radio' name='valoracion' value='4'>4 - Me gustó </label><br>
                <label><input type='radio' name='valoracion' value='5'>5 - Me encanta</label><br>         
                <br><button type='submit' name='valorar' value='valorar'>valorar</button></li><br><br><br>
                </form>
                ";

                # code...
            }
            $log .= "
            </ul>";


            break;

        default:
            $log .= "<a href='cerrarsesion.php'>Cerrar sesión</a>";

            break;
    }
}
if (isset($_POST['valorar'])) {
    $obras = $_SESSION["obra"]->valorar($_GET['id'], $_POST['valoracion']);
    /* 
    echo "id" . $_GET['id'] . "<br>";
    echo "Valoración " . $_POST['valoracion']; */
}

if ($ingresarObra) {

    //include "upload_file.php";

    $datosObras = array(

        'titulo' => $titulo,
        'descripcion' => $desc,
        'file' => $portada,
        //'file'=>$_FILES["file"]["name"],
        'fechaIn' => $fechaIn,
        'fechaFin' => $fechaFin

    );

    $_SESSION["obra"]->set($datosObras);
    $log .= $_SESSION["obra"]->getMensaje();
}


?>

<!-- @author Mario Osuna Ordóñez -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mario Osuna Ordóñez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mario Osuna Ordóñez</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header>
        <a href="index.php">
            <h1>Gran Teatro</h1>
        </a>
    </header>
    <nav>
        <ul>
            <?php
            echo $menu;
            ?>

        </ul>

    </nav>
    <main>
        <?php
        echo $log;
        ?>
    </main>
    <footer>
        <h2>Mario Osuna Ordóñez</h2>
    </footer>
</body>

</html>