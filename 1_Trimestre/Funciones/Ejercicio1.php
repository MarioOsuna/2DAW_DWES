<?php



function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}
$dni = " ";
$msgErrorDni  =  " ";
$lprocesaformulario = false;
//validacion	
if (isset($_GET["enviar"])) {

    $dni = clearData($_GET["Dni"]);


    $lprocesaformulario = true;


    if (empty($dni)) {
        $msgErrorDni = "Dni requerido";
        $lprocesaformulario = false;
    } else {

        $dni .= dni($dni);
    }
} else {
}

if ($lprocesaformulario) {
    echo "MOSTRAR DATOS <br/><hr/>";
    echo "<b>Dni:</b> " . $dni . "<br/>";
} else {
}
function dni($num)
{

    $cadena= ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];

    return $cadena[$num % 23];

    
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
        echo "<label >Dni: </label>";
        echo "<input type=\"text\" placeholder='Dni' name=\"Dni\" value=" . $dni . ">* <b style='color: red;'>" . $msgErrorDni . "</b><br/>";





        ?>








        <hr />



        <button type="submit" name="enviar">Enviar</button><br />


    </form>



</body>

</html>