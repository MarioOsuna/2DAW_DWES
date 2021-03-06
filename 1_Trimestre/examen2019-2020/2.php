<?php


/**
 * Se desea desarrollar una aplicación en la que un usuario juegue contra la máquina a "las siete y media".
 * El juego contendrá un panel de control con tres opciones para el usuario:
 * Reiniciar: Iniciará una nueva partida.
 * Nueva carta: Se entrega y se muestra en pantalla una carta para el usuario.
 * Plantar: Indica el jugador ganador mostrando los resultados obtenidos.
 * La puntuación de carta coincide con su valor numérico excepeto el 10,11 y 12 que se corresponden con medio punto
 */





session_start();
$auth = false;

if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
} else {
    if ($_SESSION['usuario'] == "EJ2" || $_SESSION['usuario'] == "ADMIN") {

        $auth = true;
        $P_final = 7.5;
        $ia = "";
        $msg = "";



        if (!isset($_SESSION['cartas'])) {
            $_SESSION['cartasIA'] = "";
            $_SESSION['puntuacion'] = 0;
            $_SESSION['puntuacionIA'] = 0;
            $aleatorio = carta_aleatoria();
            $cartas = "<img src='$aleatorio' alt=''>";
            $_SESSION['cartas'] = $cartas;

            //$_SESSION['puntuacion'] = 0;
        }
        //Boton reinicar
        if (isset($_POST["reiniciar"])) {
            $_SESSION['puntuacion'] = 0;
            $_SESSION['puntuacionIA'] = 0;
            $_SESSION['cartasIA'] = "";
            $aleatorio = carta_aleatoria();

            $_SESSION['cartas'] = "<img src='$aleatorio' alt=''>";

            if (isset($_SESSION['fin'])) {
                unset($_SESSION['fin']);
            }
        }

        //Boton nueva carta
        if (isset($_POST["nueva"]) && !isset($_SESSION['fin'])) {
            $aleatorio = carta_aleatoria();
            $_SESSION['cartas'] .= "<img src='$aleatorio' alt=''>";

            if ($_SESSION['puntuacion'] == $P_final) {
                //$_SESSION['puntuacion'] .= " ENHORABUENA HAS GAANAO BRO!";
                $_SESSION['fin'] = true;
            } else {
                if ($_SESSION['puntuacion'] > $P_final) {
                    //$_SESSION['puntuacion'] .= " LOSEEEEER!";
                    $_SESSION['fin'] = true;
                }
            }
            //echo "nuevo";

        }

        //Boton plantar
        if (isset($_POST["plantar"])) {
            $_SESSION['fin'] = true;
            $ia = $_SESSION['cartasIA'] . "<br><h2>PUNTUACIÓN IA:" . $_SESSION['puntuacionIA'] . "</h2><br><br>";

            if ($_SESSION['puntuacionIA'] == $P_final && $_SESSION['puntuacion'] == $P_final || $_SESSION['puntuacion'] == $_SESSION['puntuacionIA']) {
                $ia .= "O.o Empatee?! buena partida...";
            } else {
                if (($_SESSION['puntuacionIA'] < $_SESSION['puntuacion'] && $_SESSION['puntuacion'] > $P_final) || ($_SESSION['puntuacionIA'] < $P_final && $_SESSION['puntuacionIA'] > $_SESSION['puntuacion'])) {
                    $ia .= "Te he ganado Broo, sigue jugando";
                } else {

                    $ia .= "parece mentira, pero he perdido";
                }
            }
        }
    } else {
        $auth = false;
        $msg = "No eres un usuario autorizado";
    }
}

function carta_aleatoria()
{

    $cadena = "";

    $ruta = array("./img/basto/", "./img/copa/", "./img/espada/", "./img/oro/");

    $num = array(1, 2, 3, 4, 5, 6, 7, 10, 11, 12);

    $n1 = array_rand($ruta, 1);
    $n2 = array_rand($num, 1);
    $n1IA = array_rand($ruta, 1);
    $n2IA = array_rand($num, 1);

    puntuacion($num[$n2], "JUG");
    puntuacion($num[$n2IA], "IA");

    $cadena = $ruta[$n1] . $num[$n2] . ".jpg";
    $cadenaIA = $ruta[$n1IA] . $num[$n2IA] . ".jpg";

    $_SESSION['cartasIA'] .= "<img src='$cadenaIA' alt=''>";

    return $cadena;
}

function puntuacion($numero, $cad)
{
    if ($cad == "IA") {

        if ($numero == 10 || $numero == 11 || $numero == 12) {
            $_SESSION['puntuacionIA'] +=   0.5;
        } else {
            $_SESSION['puntuacionIA'] +=  $numero;
        }
    } else {

        if ($numero == 10 || $numero == 11 || $numero == 12) {
            $_SESSION['puntuacion'] +=   0.5;
        } else {
            $_SESSION['puntuacion'] +=  $numero;
        }
    }
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenario 2</title>
</head>

<body>
    <form action="2.php" enctype="multipart/form-data" method="post">
        <h1>La siete y media</h1>
        <hr>

        <?php

        if ($auth) {
            echo "<h2>Bienvenido " . $_SESSION['usuario'] . "</h2><br>";
            echo "<h2>PUNTUACIÓN " . $_SESSION['usuario'] . ": " . $_SESSION['puntuacion'] . "</h2><br>";

            echo $_SESSION['cartas'];


            echo "<br>";
            echo "<input type=\"submit\" name=\"reiniciar\" value=\"Reiniciar\">
        <input type=\"submit\" name=\"nueva\" value=\"Nueva Carta\">
        <input type=\"submit\" name=\"plantar\" value=\"Plantar\">
        <br>
        <hr>";

            echo $ia;
            echo "<br><br><a href='index.php'>Inicio</a>&nbsp;&nbsp;<a href='cerrarsesion.php'>Cerrar sesión</a>";
        } else {
            echo $msg;
            echo "<br><br><a href='index.php'>Inicio</a>&nbsp;&nbsp;<a href='cerrarsesion.php'>Cerrar sesión</a>";

        }
        ?>
    </form>
</body>

</html>