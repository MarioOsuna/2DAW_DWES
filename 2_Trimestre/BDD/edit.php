<?php
include("constantes.php");
include("superheroe.php");


$sh = Superheroe::getInstancia();

$id = $_GET["id"];
$nombre = "";
$velocidad = "";

$datos = $sh->get($id);
foreach ($datos as $elemento) {
    # code...
    foreach ($elemento as $key => $valor) {
        # code...
        //echo "$key: $valor<br>";
        if ($key == "Nombre") {
            $nombre = $valor;
        }
        if ($key == "velocidad") {
            $velocidad = $valor;
        }
    }
}

$cad = "";
echo " " . $sh->getMensaje() . "<br>";




if (isset($_GET["editar"])) {
    $cad = "";
    $nom = clearData($_GET["nombre"]);
    $veloc = clearData($_GET["velocidad"]);
    // $id = $_GET["id"];    
    $datos = array("nombre" => $nom, "velocidad" => $veloc);
    $sh->update($datos);
    $cad .= $sh->getMensaje() . "<br>";
    $datos = $sh->get($id);
    foreach ($datos as $key) {
        foreach ($key as $value => $v) {
            $cad .= "$value-$v<br>";
        }
    }
}
function clearData($cadena)
{
    $cadena_limpia = trim($cadena);
    $cadena_limpia = htmlspecialchars($cadena);
    $cadena_limpia = stripslashes($cadena);
    return $cadena_limpia;
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


    <noscript>
        <p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
            Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
    </noscript>


</head>

<body>
    <h1>Mario Osuna Ordóñez</h1>
    <form action="edit.php" method="get">


        <br>
        <br>
        <h2>SUPERHEROES</h2>
        <div>
            <?php
            echo " 
            <input type='text' value='$id' readonly name='id'><br><br>
            <input type='text' value='$nombre' name='nombre' ><br><br>
            <input type='text' value='$velocidad' name='velocidad'><br><br>
            <button name='editar'>EDITAR</button><br>
            <br><br>";

            echo "<a href='index.php'>index</a> ";
            ?>
        </div>

    </form>
</body>

</html>