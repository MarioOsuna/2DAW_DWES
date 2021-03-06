<?php


include("./config/config.php");
include("./class/Usuario.php");
include("./class/Obras.php");
include("./class/Logs.php");
include("./class/Tarifas.php");
include("./class/Entradas.php");

session_start();


$menu = "";
$log = "";

if (isset($_SESSION['usuario'])) {

    if ($_SESSION['perfil'] == "gerente") {


        $menu = "
        <li><a href='home.php'>Home</a></li>
        <li><a href='mostrarLogs.php'>Logs</a></li>
        <li><a href='index.php'>Introducir obras</a></li>
        <li><a href='cerrarsesion.php'>cerrar sesión</a></li>
        ";


        $mlogs = $_SESSION["log"]->get();

        $log = "<ul class='normal'>";
        foreach ($mlogs as $key => $value) {
            // echo "<br>" . $value['portada'];
            $log .= "
            <li>" . $value['id'] . "</li><br>
            <li>" . $value['fecha_hora'] . "</li><br>
            <li>" . $value['usuario'] . "</li><br>
            <li>" . $value['descripcion'] . "</li><br>
                        <br><br><br><br>
            ";
            # code...
        }
        $log .= "</ul>";
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
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