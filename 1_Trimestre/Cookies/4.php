<?php

/**
 * 
 * 4.    Incluir en vuestro servidor un contador que indique al usuario el número de veces que ha accedido al sitio.
 * @author Mario Osuna
 * 
 */


if (isset($_COOKIE['cont'])) {
  

    $contador = $_COOKIE['cont']+1;
    setcookie("cont", $contador, time() + 3600);

    echo "Ha entrado: ".$contador." veces";
} else {
    //Creamos
    $contador=1;
    setcookie("cont", $contador, time() + 3600);
    echo "Primera vez que entra";
}
