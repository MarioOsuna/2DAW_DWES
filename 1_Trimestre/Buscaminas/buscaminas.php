<?php
//session_destroy();
error_reporting(0);
session_start();
$nFilas = 10;
$nColumnas = 10;
$nBombas = 20;

if (!isset($_SESSION["tablero"])) {
    $_POST['arrayInput'] = array();
    $_SESSION["tablero"] = array();
    for ($x = 1; $x <= $nFilas; $x++) {
        for ($y = 1; $y <= $nColumnas; $y++) {
            $_SESSION["tablero"][$nFilas][$nColumnas] = 0;
        }
    }
}

if (!isset($_SESSION["visible"])) {
    $_SESSION["visible"] = array();
}

if (!isset($_SESSION["bombas"])) {
    $_SESSION["bombas"] = ponerBombas($nBombas, $nFilas, $nColumnas);
}
if (!isset($_SESSION["bandera"])) {
    $_SESSION["bandera"] = array();
}



function crearTablero($nFilas, $nColumnas)
{


    echo "<table>";

    for ($x = 1; $x <= $nFilas; $x++) {
        echo "<tr>";
        for ($y = 1; $y <= $nColumnas; $y++) {
            array_push($_SESSION["tablero"], array($x, $y));
            $posicion = "arrayInput[$x][$y]";
            $fc = $x . $y;

            try {
                $valor = $_SESSION["tablero"][$x][$y];
            } catch (\Throwable $th) {
                //throw $th;
            }

            if (!in_array($fc, $_SESSION["visible"])) {
                echo "<td><input class=\"activo\" type=\"submit\" name=$posicion value=\"  \" > </td>";
            } else {


                if (in_array($fc, $_SESSION["bandera"])) {

                    echo "<td><input class=\"bomba\" type=\"submit\" disabled name=$posicion value=\"🚩\"> </td>";
                    //echo "finPartida";
                    //lamar a función peridiste que muestra tablero con bombas;
                } else if (in_array(array($x, $y), $_SESSION["bombas"])) {
                    echo "<td><input class=\"bomba\" type=\"submit\" disabled name=$posicion value=\"💣\"> </td>";
                    ponerBanderas($fc);
                } else {

                    //lo hemos pulsado y no es bomba
                    echo "<td><input class=\"visible\" type=\"submit\" disabled name=$posicion value=$valor> </td>";
                }
            }
        }
        echo "</tr>";
    }
    casillasDestapadas($nFilas, $nColumnas, $_SESSION["bombas"]);


    echo "</table>";
}

function ponerBombas($nBombas, $nFilas, $nColumnas)
{
    $aNAleatorios = array();
    do {
        $fila = rand(1, $nFilas);
        $columna = rand(1, $nColumnas);

        if (!in_array(array($fila, $columna), $aNAleatorios)) {
            darValor($fila, $columna);
            $_SESSION["tablero"][$fila][$columna] = 9;

            array_push($aNAleatorios, array($fila, $columna));
        }
    } while (sizeof($aNAleatorios) < $nBombas);

    return $aNAleatorios;
}

function darValor($x, $y)
{

    for ($fila = $x - 1; $fila <= $x + 1; $fila++) {
        for ($columna = $y - 1; $columna <= $y + 1; $columna++) {
            $_SESSION["tablero"][$fila][$columna]++;
        }
    }
}

function casilla0($x, $y)
{

    $finX = $x + 1;
    $finY = $y + 1;
    $inicioX = $x - 1;
    $inicioY = $y - 1;

    for ($fila = $inicioX; $fila <= $finX; $fila++) {
        for ($columna = $inicioY; $columna <= $finY; $columna++) {
            $fc = $fila . $columna;

            if ($fila > 10 || $fila < 1 || $columna > 10 || $columna < 1) {
            } else if (!in_array($fc, $_SESSION["visible"])) {
                destaparCelda($fila, $columna);
            }
        }
    }
}

function destaparCeldaInput($nFilas, $nColumnas)
{

    $array = $_POST['arrayInput'];

    foreach ($array as $x => $value) {

        foreach ($value as  $y => $nada) {
            $posicion = $x . $y;

            if (!empty($_POST["bandera"])) {

                array_push($_SESSION["bandera"], $posicion);
            } else if (in_array(array($x, $y), $_SESSION["bombas"])) {
                finPartida($nFilas, $nColumnas);
            } else {
                $valor = $_SESSION["tablero"][$x][$y];
                if ($valor == 0) {
                    casilla0($x, $y);
                }
            }
            array_push($_SESSION["visible"], $posicion);
        }
    }
}

function destaparCelda($filaX, $filaY)
{

    $posicion = $filaX . $filaY;
    array_push($_SESSION["visible"], $posicion);
    $valor = $_SESSION["tablero"][$filaX][$filaY];

    if ($valor == 0 && !in_array($posicion, $_SESSION["visible"])) {
        casilla0($filaX, $filaY);
    }
}


function casillasDestapadas()
{
    return count($_SESSION["visible"]);
}

function finPartida($nFilas, $nColumnas)
{
    for ($x = 1; $x <= $nFilas; $x++) {
        for ($y = 1; $y <= $nColumnas; $y++) {
            $posicion = $x . $y;
            echo $posicion;
            if (!in_array($posicion, $_SESSION["visible"])) {
                array_push($_SESSION["visible"], $posicion);
            }
        }
    }
    echo "HAS PERDIDO";
}

function ponerBanderas($posicion)
{

    if (!in_array($posicion, $_SESSION["bandera"])) {
        array_push($_SESSION["bandera"], $posicion);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="buscaminas.css">

</head>

<body>

    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
        <a href="cierreSesion.php"> Reiniciar partida</a>
        <?php
        destaparCeldaInput($nFilas, $nColumnas);
        crearTablero($nFilas, $nColumnas);

        echo "<h3>casillas destapadas: " . casillasDestapadas() . "</h3>";



        ?>
        Bandera: <input type="checkbox" name="bandera" id="bandera" value="bandera">
    </form>

</body>

</html>