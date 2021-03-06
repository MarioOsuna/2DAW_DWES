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

  <title>Ejercicio 4</title>
</head>

<body>
<?php
echo "Mario Osuna Ordóñez";
echo "<p><b>Paleta de Colores.</b></p>";
$color="";
echo "<table>";
  for($cr=0;$cr<255;$cr+=100){
    for($cv=0;$cv<255;$cv+=100){
   
      echo "<tr>";

      for($ca=0;$ca<255;$ca+=20){

        $color="rgb($cr,$cv,$ca)";
        $hex="#".dechex($cr).dechex($cv).dechex($ca);
        echo "<td style='background-color:$color'>$hex</td>";
    
      }
      echo "</tr>";
    }

  }

  echo "</table>";
?> 

</body>

</html>