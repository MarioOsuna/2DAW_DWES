<?php



function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}
$num = $n1 = $n2 = " ";
$msgErrornum  =  " ";
$lprocesaformulario = false;
//validacion	
if (isset($_GET["enviar"])) {

    $num = clearData($_GET["num"]);


    $lprocesaformulario = true;


    if (empty($num)) {
        $msgErrornum = "Número requerido";
        $lprocesaformulario = false;
    }
} else {
}

if ($lprocesaformulario) {
    obtieneFactorial($num);
} else {
}
function obtieneFactorial($numero)
{
    $n = 2;
    //echo $numero . " " . $n . "<br/>";
    for ($i = 1; $i <= $numero; $i++) {
        if ($numero != 1) {
            $i--;
            if (($numero % $n) == 0) {
                // echo $numero % $n."<br/>";
                echo $numero . " " . $n . "<br/>";
                $numero = $numero / $n;
            } else {
                $n++;
            }
        } else {
            $i=$numero;
        }
    }
    //echo $numero % $n."<br/>";
    echo $numero .  "<br/>";
    //echo $numero/$n ."<br/>";
    //return $numero;
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

    <title>Mario Osuna Ordóñez</title>

</head>

<body>
    <h2>Validación formulario.PHP</h2>
    <!--<form action="Datosform2.php" enctype="multipart/form-data" method="get">-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="get">

        <hr />
        <?php
        /*EJEMPLO VARIABLES*/
        echo "<label >Factorial del número: </label>";
        echo "<input type=\"text\" placeholder='Número' name=\"num\" value=" . $num . ">* <b style='color: red;'>" . $msgErrornum . "</b><br/>";





        ?>








        <hr />



        <button type="submit" name="enviar">Enviar</button><br />


    </form>



</body>

</html>