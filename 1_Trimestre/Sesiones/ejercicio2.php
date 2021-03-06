<?php
session_start();
echo session_id();

$_SESSION["intervaloTime"]=20;

if(isset($_SESSION['inicioTime'])) {
    $tiempo_transcurrido = time();
    $tiempo_maximo = $_SESSION['inicioTime'] + ( $_SESSION['intervaloTime'] * 60 ) ;
    if($tiempo_transcurrido > $tiempo_maximo){
      header("Location: salir.php");
    
    }else {
        $_SESSION['inicioTime'] = time();
     }
}   else {
     $_SESSION['inicioTime'] = time();
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
    <h1>Mario Osuna Ordóñez</h1>
    <p><a href="pagina.php">Enlace de recarga</a></p>
</body>
</html>