<?php


function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}
$valor = $n1 = $n2 = " ";
$msgErrorvalor  =  " ";
$lprocesaformulario = false;
//validacion	
if (isset($_GET["enviar"])) {

    $valor = clearData($_GET["valor"]);


    $lprocesaformulario = true;


    if (empty($valor)) {
        $msgErrornum = "Campo requerido";
        $lprocesaformulario = false;
    }
} else {
}

if ($lprocesaformulario) {
   echo "Suma del número $valor de forma recursiva: ".recursivo($valor);
} else {
}
function recursivo($numero)
{
    if ($numero == 0)
        return 0;
    else
        return $numero + recursivo($numero - 1);
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
    <!-- <h2>Validación formulario.PHP</h2> -->
    <!--<form action="Datosform2.php" enctype="multipart/form-data" method="get">-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="get">

        <hr />
        <?php
        /*EJEMPLO VARIABLES*/
        echo "<label >Número para sumar recursivamente: </label>";
        echo "<input type=\"text\" placeholder='Número' name=\"valor\" value=" . $valor . ">* <b style='color: red;'>" . $msgErrorvalor . "</b><br/>";





        ?>








        <hr />



        <button type="submit" name="enviar">Enviar</button><br />


    </form>



</body>

</html>