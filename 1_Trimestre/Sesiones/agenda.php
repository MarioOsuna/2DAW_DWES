<?php
session_start();
$procesaForm=false;
$nombre;
$telefono;
$muestraAgenda=false;

if (!isset($_SESSION["agenda"])) {
    $_SESSION["agenda"]=array();
}else{
    $muestraAgenda=true;
}

function clearData($cadena){
    $cadenaLimpia=trim($cadena);
    $cadenaLimpia=htmlspecialchars($cadenaLimpia);
    $cadenaLimpia=stripslashes($cadenaLimpia);
    return $cadenaLimpia;
}

if (isset($_POST["enviar"])){
    $procesaForm=true;
    $nombre=$_POST["nombre"];
    $telefono=$_POST["telefono"];
    if (!ctype_digit($telefono)){
        $procesaForm=false;
        echo "el número de telefono es erroneo";
    }
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
    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
        <?php
        echo "<p><input type=\"text\" name=\"nombre\" placeholder=\"nombre\" ></p>";
        echo "<p><input type=\"text\" name=\"telefono\" placeholder=\"telefono\" ></p>";
?> 
       <input type="submit" value="enviar"  name="enviar">
    </form>

<?php

if ($procesaForm) {
    $_SESSION["agenda"][]=array("nombre"=>$nombre, "telefono"=>$telefono);
  
}

if ($muestraAgenda) {
    echo "<table border='1'>";
    foreach ($_SESSION["agenda"] as $key => $value) {
        echo "<tr>";
        echo "<td>". $value["nombre"]."</td>";
        echo"<td> ".$value["telefono"]."</td>";
        echo"</tr>";
    }
    echo"</table>";
}


?>
