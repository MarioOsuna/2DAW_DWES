<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Ejercicio 2</title>
</head>

<body>

<?php
echo "Mario Osuna Ordóñez";

#Ejercicio 1. Escribir los números del 1 al 10

$i = 1; //Inializamos la variable en 0
$par=0;

while($i<8) {

    if($i%2==0){
       // echo "Numero par ".$i."</br>";
        $par+=$i;
    }

 $i++;
}

echo 'La suma de los tres primeros números pares es: '.$par;
?>

</body>

</html>