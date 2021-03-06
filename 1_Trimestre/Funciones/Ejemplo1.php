<?php

/**
 * Manejo de variables estáticas...
 * 
 */
function manejoDeVariablesEstatica(){
    static $varEstatica=0;
    $variable=0;
    $varEstatica++;
    $variable++;
    echo $varEstatica."<br/>";
    echo $variable;
}

echo "<p>Llamada 1</p>";
    manejoDeVariablesEstatica();
    echo "<p>Llamada 2</p>";
    manejoDeVariablesEstatica();
    echo "<p>Llamada 3</p>";
    manejoDeVariablesEstatica();



?>