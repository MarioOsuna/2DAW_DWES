<?php


include("./config/config.php");
include("./class/Usuario.php");
include("./class/Obras.php");
include("./class/Logs.php");
include("./class/Tarifas.php");
include("./class/Entradas.php");

session_start();



$arrayCompra = array();
$menu = "";

/* $asientos = $_SESSION["obra"]->getDatos();
$log = "<ul class='normal'>";
foreach ($obras as $key => $value) {

    // echo "<br>" . $value['portada'];
    $log .= "<form action='entradas.php?id=".$value['id']."' method='post' enctype='multipart/form-data'>
    <li><img src='./img/" . $value['portada'] . "' alt=''><br><br><br>Número de valoraciones: " . $value['numero_valoraciones'] . "<br><br><br>Valoración media: " . $value['valoracion_media'] . "<br><br><input type='submit' name='entrada' value='Entrada' ></li><br><br><br>
    </form> ";

    # code...
}
$log .= "</ul>"; */



$mostrar = false;
$mostrarpremium = false;

if (isset($_SESSION['iniciado'])) {

    $menu = "<li><a href='home.php'>Home</a></li>
    <li><a href='index.php'>Inicar sesión</a></li>";

    if ($_SESSION['perfil'] == "gerente") {

        $menu = "
        <li><a href='home.php'>Home</a></li>
        <li><a href='mostrarLogs.php'>Logs</a></li>
        <li><a href='index.php'>Introducir obras</a></li>
        <li><a href='cerrarsesion.php'>cerrar sesión</a></li>
        ";
    }
    if ($_SESSION['perfil'] == "amigo") {
        $menu = "
        <li><a href='home.php'>Home</a></li>
        <li><a href='index.php'>valorar</a></li>
        <li><a href='cerrarsesion.php'>cerrar sesión</a></li>";
    }

    // echo "id" . $_GET['id'];
    if (isset($_GET['id'])) {
        if (!isset($_SESSION['obras' . $_GET['id']])) {
            $_SESSION['obras' . $_GET['id']] = $_SESSION["asientos"];
        }
        $tarifas = $_SESSION["tarifas"]->getDatos($_GET['id']);
        /* $entradasCompradas = $_SESSION["entradas"]->getDatos();

        var_dump($entradasCompradas); */

        $log = "";
        $log .= "<h1>Tarifas</h1>";
        $log .= "<h2>Zona A: " . $tarifas[0]['zonaA'] . "€</h2>";
        $log .= "<h2>Zona B: " . $tarifas[0]['zonaB'] . "€</h2>";
        $log .= "<h2>Zona C: " . $tarifas[0]['zonaA'] . "€</h2>";

        $log .= " <form action='entradas.php?id=" . $_GET['id'] . "' method='post' enctype='multipart/form-data'>";
        $log .= "<p>Zona A</p>";
        foreach ($_SESSION['obras' . $_GET['id']]["A"] as $key => $value) {
            $log .= "<br>Fila " . $key . "  ";
            foreach ($value as $k => $v) {
                // $log .="<input type='checkbox' name='butacasA' value='$k-$v' disabled='true'></input>";
                if ($v != 1) {
                    $log .= "<input type='checkbox' name='butacasA$key-$k' value='$key-$k' ></input>";
                } else {
                    $log .= "<input type='checkbox' name='butacasA$key-$k' value='$key-$k' disabled='true'></input>";
                }
                // $log .=  "< href='#'> " . $v . "</a>";
            }
        }
        
        $log .= "<p>Zona B</p>";

        foreach ($_SESSION['obras' . $_GET['id']]["B"] as $key => $value) {
            $log .= "<br>Fila " . $key . "  ";
            foreach ($value as $k => $v) {
                if ($v != 1) {
                    $log .= "<input type='checkbox' name='butacasB$key-$k' value='$key-$k' ></input>";
                } else {
                    $log .= "<input type='checkbox' name='butacasB$key-$k' value='$key-$k' disabled=''true ></input>";
                }
            }
        }
        $log .= "<p>Zona C</p>";

        foreach ($_SESSION['obras' . $_GET['id']]["C"] as $key => $value) {
            $log .= "<br>Fila " . $key . "  ";
            foreach ($value as $k => $v) {
                if ($v != 1) {

                    $log .= "<input type='checkbox' name='butacasC$key-$k' value='$key-$k'></input>";
                } else {
                    $log .= "<input type='checkbox' name='butacasC$key-$k' value='$key-$k' disabled=''true ></input>";
                }
            }
        }

        $log .= "<br><br><input type='submit' name='comprar' value='comprar'>
            </form>";


        if (isset($_POST['comprar'])) {

            $arrayCompra = array();

            if ($_SESSION['iniciado'] == true) {
                $email = $_SESSION["user"]->getEmail($_SESSION['usuario']);
                $total = 0;
                $sumaA = 0;
                $sumaC = 0;
                $sumaB = 0;


                $log = "<form action='entradas.php?id=" . $_GET['id'] . "' method='post' enctype='multipart/form-data'>
                <p>Asientos </p>
                     <h2>Zona A:</h2>";

                foreach ($_SESSION['obras' . $_GET['id']]["A"] as $key => $value) {
                    foreach ($value as $k => $v) {

                        $fc = $key . "-" . $k;
                        if (isset($_POST['butacasA' . $fc])) {

                            $log .= $fc . "<br>";
                            $sumaA += $tarifas[0]['zonaA'];
                            array_push($arrayCompra, array("idObra" => $_GET['id'], "fila" => $key, "columna" => $k, "precio" => $tarifas[0]['zonaA'], "email" => $email[0]['email']));
                            // $log
                        }
                    }
                }

                $log .= "
            <h2>Zona B:</h2>";

                foreach ($_SESSION['obras' . $_GET['id']]["B"] as $key => $value) {
                    foreach ($value as $k => $v) {

                        $fc = $key . "-" . $k;
                        if (isset($_POST['butacasB' . $fc])) {
                            array_push($arrayCompra, array("idObra" => $_GET['id'], "fila" => $key, "columna" => $k, "precio" => $tarifas[0]['zonaA'], "email" => $email[0]['email']));

                            $log .= $fc . "<br>";
                            // echo $_POST['butacasA' . $fc];
                            $sumaB += $tarifas[0]['zonaA'];
                        }
                    }
                }
                $log .= "<h2>Zona C:</h2>";
                foreach ($_SESSION['obras' . $_GET['id']]["C"] as $key => $value) {
                    foreach ($value as $k => $v) {

                        $fc = $key . "-" . $k;
                        if (isset($_POST['butacasC' . $fc])) {
                            array_push($arrayCompra, array("idObra" => $_GET['id'], "fila" => $key, "columna" => $k, "precio" => $tarifas[0]['zonaA'], "email" => $email[0]['email']));

                            $log .= $fc . "<br>";
                            $sumaC += $tarifas[0]['zonaA'];

                            // echo $_POST['butacasA' . $fc];
                        }
                    }
                }
                $total = $sumaA + $sumaB + $sumaC;
                $log .= "<br><br><br><h2>
                <h2>Total zona A= $sumaA €</h2>
                <h2>Total zona B= $sumaB €</h2>
                <h2>Total zona C= $sumaC €</h2>
                <h1TOTAL COMPRA= $total €</h1>

                ";
                $log .= "<br><input type='submit' name='confirmarCompra' value='confirmar compra'>
                </form>";

                $_SESSION['arrayCompra'] = $arrayCompra;
            } else {
                header("Location: index.php");
            }
        }
        if (isset($_POST['confirmarCompra'])) {

            $entradas = $_SESSION["entradas"]->set($_SESSION['arrayCompra']);



            header("Location: home.php");
        } else {
        }
    } else {
        header("Location: home.php");
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