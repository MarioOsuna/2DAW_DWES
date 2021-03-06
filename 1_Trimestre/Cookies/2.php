<?php

/**
 * 
 * 2.   Escriba una página que compruebe si el navegador permite crear cookies y se lo diga al usuario (mediante una o más páginas).
 * @author Mario Osuna
 * 
 */
if (isset($_COOKIE['user'])) {
    echo $_COOKIE['user'];
} else {
    //Creamos
    echo "La cookie user no existe";
}
