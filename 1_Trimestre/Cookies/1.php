<?php

/**
 * 
 * 1.    Escriba una página que permita crear una cookie de duración limitada, comprobar el estado de la cookie y destruirla.
 * @author Mario Osuna
 * 
 */
if (isset($_COOKIE['user'])) {
    echo $_COOKIE['user'];
    setcookie("user", "H.P.Lovecraft", time() - 3600);


} else {
    //Creamos
    setcookie("user", "H.P.Lovecraft", time() + 3600);
}


