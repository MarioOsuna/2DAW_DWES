<?php
session_start();
$aOpciones = array("1", "2", "3", "4");
if(!isset($_SESSION["error"])){
    $_SESSION["error"]="";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mario Osuna Ordóñez</title>
  
</head>

<body>
    <h1>Usuarios para linux o mysql</h1>

    <form action="crear.php" method="post" enctype="multipart/form-data">

        <label for="file">Archivo: </label> <input type="file" name="file" id="file">

        <?php
        echo "<p>" . $_SESSION["error"] . "</p>";
        ?>

        <label for="linux">linux <input type="radio" id="linux" name="tipo" value="linux"> </label>
        <label for="mysql">mysql <input type="radio" id="mysql" name="tipo" value="mysql"> </label>
        </p>



        <?php
        echo "número de curso: <select name=\"curso\">";
        foreach ($aOpciones as $value) {
            echo "<option>$value</option>";
        }
        echo "</select> $espacio";
        ?>

        <label for="curso">Indique curso</label>
        <input type="text" name="nombre" id="nombre" value="daw">

        <label for="curso">Indique año</label>
        <input type="text" name="anio" id="anio" value="2021">


        <br><input type="submit" name="enviar" value="crear usuarios">





    </form>
</body>

</html>