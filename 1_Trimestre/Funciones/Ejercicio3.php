<?php

function normaliza($cadena)
{
    $originales = 'ÁÉÍÓÚáéíóú';
    $modificadas = 'AEIOUaeiou';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}

$aUsuarios = array(

    array('nombre' => 'Jesús', 'apellido1' => 'Martínez', 'apellido2' => 'García'),

    array('nombre' => 'Mercedes', 'apellido1' => 'Calamaro', 'apellido2' => 'Pedrajas'),

    array('nombre' => 'Elena', 'apellido1' => 'Pérez', 'apellido2' => ''),

);
/* 
$nombre = array_map(function ($ar) {
    $n[] = $ar['nombre'];
    $a1[] = $ar['apellido1'];
    $a2[] = $ar['apellido2'];

    for ($i = 0; $i < count($n); $i++) {

        echo substr($a1[$i]['nombre'], 0, 2) . substr($a2[$i]v, 0, 2) . substr($n[$i]'apellido2'], 0, 1) . "<br/>";
    }
}, $aUsuarios); */

$nombre = array_map(function ($usuario) {
    echo substr(normaliza($usuario['apellido1']), 0, 2) . substr(normaliza($usuario['apellido2']), 0, 2) . substr(normaliza($usuario['nombre']), 0, 1) . "<br/>";
}, $aUsuarios);

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
    <?php





    $nombre;

    ?>
</body>

</html>