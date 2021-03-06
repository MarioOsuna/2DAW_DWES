<?php
session_start();
$procesaForm = false;
$vFecha=0;
$vTarea=0;


function clearData($cadena)
{
    $cadenaLimpia = trim($cadena);
    $cadenaLimpia = htmlspecialchars($cadenaLimpia);
    $cadenaLimpia = stripslashes($cadenaLimpia);
    return $cadenaLimpia;
}

if (!isset($_SESSION["tareas"])) {
    $_SESSION["tareas"] = array();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method="post">
        <?php
        echo "<p><input type=\"date\" name=\"fecha\" placeholder=\"fecha\" value=\"$vFecha\"></p>";
        echo "<p><input type=\"date\" name=\"tarea\" placeholder=\"tarea\" value=\"$vTarea\"></p>";
        ?>
        <input type="submit" value="enviar" name="enviar">
    </form>


    <?php
    if (isset($_POST["enviar"])) {
        $procesaForm = true;
        $vFecha = clearData($_POST["fecha"]);
        $vTarea = clearData($_POST["tarea"]);
    }

    if ($procesaForm) {

        $_SESSION["tarea"][] = array("fecha" => $vFecha, "tarea" => $vTarea);

        foreach ($_SESSION["tarea"] as $key => $value) {
            echo $value["fecha"] . "//" . $value["tarea"] . "</br>";
        }
    }


    ?>
</body>

</html>