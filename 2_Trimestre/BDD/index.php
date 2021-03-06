<?php
include("constantes.php");
include("superheroe.php");



$sh = Superheroe::getInstancia();

$id = 0;

$cad = "";
echo " " . $sh->getMensaje() . "<br>";


if (isset($_GET["buscarTodos"])) {
    $cad = "";

    $datos = $sh->getAll();
    foreach ($datos as $key) {

        foreach ($key as $value => $v) {
            if ($value == "ID") {
                $id = $v;
            }
            if ($value != "pass") {
                $cad .= "$value-$v<br><br>";
            }
            # code...
        }
        $cad .= "&nbsp;<form method='get'>       
        <input type='submit'  name='editar' value='Editar Superheroe'>
        <input type='hidden'  name='id' value='$id  '>
        <input type='submit' name='eliminar' value='Eliminar Superheroe'>
        </form><br><br>";
    }
}


if (isset($_GET["buscarNombre"])) {
    $cad = "";
    $nom = clearData($_GET["Nombre"]);
    // $id = $_GET["id"];    
    $datos = $sh->getNombre($nom);
    foreach ($datos as $key) {
        foreach ($key as $value => $v) {
            $cad .= "$value-$v<br>";
            # code...
        }
        # code...
    }
}

if (isset($_GET["editar"])) {
    $id = $_GET["id"];
    header("Location: edit.php?id=$id");
}
if (isset($_GET["eliminar"])) {
    $cad = "";

    $sh->delete($_GET["id"]);

    $datos = $sh->getAll();
    /*    foreach ($datos as $key) {
        foreach ($key as $value => $v) {
            $cad .= "$value-$v<br>";
        }
    } */
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
    <script>
        function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                }
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <noscript>
        <p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
            Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
    </noscript>


</head>

<body>
    <h1>Mario Osuna Ordóñez</h1>
    <form action="index.php" method="get">
        <!-- <input type="text" placeholder="ID" name="id" id="id"> -->
        <!-- <input type="text" placeholder="Nombre" name="Nombre" id="nombre"><br><br> -->
        <label for="fname">First name:</label>
        <input type="text" placeholder="Nombre" id="fname" name="Nombre" onkeyup="showHint(this.value)">
        <p>Suggestions: <span id="txtHint"></span></p>
        <!-- <input type="number" placeholder="velocidad" name="velocidad" id="velocidad"><br><br> -->
        <input type='submit' name='buscarNombre' value='Buscar Nombre'>
        <input type='submit' name='buscarTodos' value='Listar Superheroes'> <br><br>

        <br>
        <br>
        <h2>SUPERHEROES</h2>
        <div>
            <?php
            echo $cad;
            ?>
        </div>

    </form>
</body>

</html>