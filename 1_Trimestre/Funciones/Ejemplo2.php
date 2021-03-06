<?php
/**
* Funciones anónima
*
*/
$enteros = [2,4,6];
$cuadrado = array_map(function ($enteros) {
return pow($enteros,2);
}, $enteros);
//print_r($cuadrado);

foreach($cuadrado as $v){
    echo $v."<br/>";
}
?>