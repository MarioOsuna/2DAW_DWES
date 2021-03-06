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

  <title>Ejercicio 3</title>
</head>

<body>

<table border="1" align="center">
            <?php
            echo "Mario Osuna Ordóñez";

            echo "<tr>";
            for ($cabecera="0";$cabecera<=10;$cabecera++){
                        echo "<th>";
                        echo $cabecera;
                        echo "</th>";
            }
            echo "</tr>";
            for ($x = 1; $x <=10; $x++){
                       echo "<tr>";
                       echo "<th>";
                       echo $x;
                       echo "</th>";
                            for ($y=1;$y<=10;$y++){                      
                                    $multiplicacion=$x*$y;                    
                                    echo "<td>";                      
                                    echo $multiplicacion;                      
                                    echo "</td>";              
                            }              
                    echo "</tr>";          
                    }      
    ?>      
    </table>
</body>

</html>