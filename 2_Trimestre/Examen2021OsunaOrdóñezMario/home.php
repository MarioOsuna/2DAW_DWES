<?php


include("./config/config.php");
include("./class/Usuario.php");
include("./class/Obras.php");
include("./class/Logs.php");
include("./class/Tarifas.php");
include("./class/Entradas.php");
session_start();


/* if (!isset($_SESSION['usuario'])) {

    header('Location: index.php');

}else{ */



$menu = "";
$menu = "<li><a href='home.php'>Home</a></li>
    <li><a href='index.php'>Inicar sesión</a></li>";
$obras = $_SESSION["obra"]->getDatos();
$log = "<ul class='normal'>";
foreach ($obras as $key => $value) {

    // echo "<br>" . $value['portada'];
    $log .= "<form action='entradas.php?id=".$value['id']."' method='post' enctype='multipart/form-data'>
    <li><img src='./img/" . $value['portada'] . "' alt=''><br><br><br>Número de valoraciones: " . $value['numero_valoraciones'] . "<br><br><br>Valoración media: " . $value['valoracion_media'] . "<br><br><input type='submit' name='entrada' value='Entrada' ></li><br><br><br>
    </form> ";

    # code...
}
$log .= "</ul>";





$mostrar = false;
$mostrarpremium = false;

if ($_SESSION['iniciado']) {


    if ($_SESSION['perfil'] == "gerente") {


        $menu = "
        <li><a href='home.php'>Home</a></li>
        <li><a href='mostrarLogs.php'>Logs</a></li>
        <li><a href='index.php'>Introducir obras</a></li>
        <li><a href='cerrarsesion.php'>cerrar sesión</a></li>
        ";
    }else{
        $menu = "
        <li><a href='home.php'>Home</a></li>
        <li><a href='index.php'>valorar</a></li>
        <li><a href='cerrarsesion.php'>cerrar sesión</a></li>";
    }
}



?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="Mario Osuna Ordóñez">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/icono.jpg" />
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