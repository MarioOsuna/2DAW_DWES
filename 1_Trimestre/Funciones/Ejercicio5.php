<?php



$valor = array('google' => 'https://www.google.es', 'Amazon' => 'https://www.amazon.es','youtube'=>'https://www.youtube.com/?reload=9&gl=ES&hl=es');


function enlace($array)
{
    echo "<ul>";
    foreach ($array as $web=>$w) {
        echo "<li><a href='$w'>$web</a></li>";
    }
    echo "</ul>";
}

enlace($valor);







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
    <?php



    ?>



</body>

</html>