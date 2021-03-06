<?php



function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
}
$nombre = $Url = $Email = $area = $vehiculo = $selected = $preferencia = $multiple = " ";
$msgErrorNombre  = $msgErrorEmail = $msgErrorGenero = " ";
$lprocesaformulario = false;
//validacion	
if (isset($_POST["enviar"])) {

    $nombre = clearData($_POST["Nombre"]);
    $Email = clearData($_POST["Email"]);
    $Url = clearData($_POST["Url"]);
    $area = $_POST["comentario"];
    if (!empty($_POST["genero"])) {
        $genero = $_POST["genero"];
    }
    $coche = $_POST["cars"];
    if (!empty($_POST["list"])) {
        $multiple = $_POST["list"];
    }
    if (!empty($_POST["vehicle"])) {
        $vehiculo = $_POST["vehicle"];
    }

    $lprocesaformulario = true;


    if (empty($nombre)) {
        $msgErrorNombre = "Nombre requerido";
        $lprocesaformulario = false;
    }

    if (empty($Email)) {
        $msgErrorEmail = "Email requerido";
        $lprocesaformulario = false;
    }
    if (empty($genero)) {
        $msgErrorGenero = "Género requerido";
        $lprocesaformulario = false;
    }


    if (is_array($vehiculo)) {
        $tota = count($_POST["vehicle"]);
        //  $current = 0;
        foreach ($vehiculo as $key => $value) {
            /*if ($current != $tota - 1)
            $selected .= $value . ', ';
        else*/
            $selected .= "·" . $value . '<br/> ';
            //  $current++;
        }
    }
    if (is_array($multiple)) {
        foreach ($multiple as $val) {
            $preferencia .= "·" . $val . '<br/> ';
        }
    }
} else {
}

if ($lprocesaformulario) {
    echo "MOSTRAR DATOS <br/><hr/>";
    echo "<b>Nombre:</b> " . $nombre . "<br/><b>Email:</b>  " . $Email . "<br/><b>URL:</b> " . $Url . "<br/><b>Género:</b> " . $genero . "<br/><b>Comentarios:</b> " . $area . "<br/><b>Vehiculos:</b><br/>" . $selected . "<b>Coche:</b> " .
        $coche . "<br/><b>Preferencias:</b><br/>" . $preferencia;
} else {
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
    <h2>Validación formulario.PHP</h2>
    <!--<form action="Datosform2.php" enctype="multipart/form-data" method="get">-->
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">

        <hr />
        <?php
        /*EJEMPLO VARIABLES*/
        echo "<label >Nombre: </label>";
        echo "<input type=\"text\" placeholder='Nombre' name=\"Nombre\" value=" . $nombre . ">* <b style='color: red;'>" . $msgErrorNombre . "</b><br/>";
        echo "<label >Email: </label>";
        echo "<input type='text' placeholder='Email' name='Email' value=" . $Email . ">*<b style='color: red;'> " . $msgErrorEmail . "</b><br/>";
        echo "<label >URL: </label>";
        echo "<input type='text' placeholder='URL' name='Url' value=" . $Url . "><br/><br/>";

        echo "<label >Comentario: </label><br/>";
        echo "<textarea name='comentario' rows='4' cols='40' placeholder='Comentarios'></textarea><br/>";

        echo "<label > Genero: </label>";
        echo " <input type='radio' name='genero' value='Hombre'>";
        echo "<label >&nbsp;Hombre&nbsp;</label>";
        echo " <input type='radio' name='genero' value='Mujer'>";
        echo "<label >&nbsp;Mujer &nbsp; </label>";
        echo "<input type='radio' name='genero' value='otro'>";
        echo "<label >&nbsp;Otro</label>*<b style='color: red;'> " . $msgErrorGenero . "</b><br/></br>";

        echo "<br/><label >Vehículo del que dispones:</label><br/>";
        echo "<input type='checkbox' id='vehicle1' name='vehicle[]' value='Bici'>";
        echo "<label for=\"vehicle1\"> Bicicleta</label><br>";
        echo "<input type=\"checkbox\" id=\"vehicle2\" name='vehicle[]' value=\"Coche\">";
        echo "<label for=\"vehicle2\"> Coche</label><br>";
        echo "<input type=\"checkbox\" id=\"vehicle3\" name='vehicle[]' value=\"Moto\">";
        echo "<label for=\"vehicle3\"> Moto</label><br>";

        echo "<label for=\"cars\">Elige un coche:</label>
        <select id=\"cars\" name=\"cars\">
        <option value=\"volvo\">Volvo</option>
        <option value=\"saab\">Saab</option>
        <option value=\"fiat\">Fiat</option>
        <option value=\"audi\">Audi</option>
        </select>";
        echo "<br/><br/><label >Elige que prefieres:</label>";
        echo "<br><br><select multiple name='list[]' size=\"6\">
        <option value=\"Andar\">Andar</option>
        <option value=\"Bus\">Coger el autobus</option>
        <option value=\"Bicicleta\">Ir en bicicleta</option>
        <option value=\"BlaBlaCar\">Coger un blablacar</option>
        <option value=\"Coche\">Ir en coche</option>
        </select>";





        ?>








        <hr />



        <button type="submit" name="enviar">Enviar</button><br />


    </form>



</body>

</html>