<!--
    "Test de verbos irregulares".
-->
<?
 $verbos = array(
    array("Infinitivo"=>"Be", "Pasado"=>"Was/Were", "Participio"=>"Been", "Traduccion"=>"Ser"),
    array("Infinitivo"=>"Beat", "Pasado"=>"Beat", "Participio"=>"Beaten", "Traduccion"=>"Golpear/Latir"),
    array("Infinitivo"=>"Bite", "Pasado"=>"Bit", "Participio"=>"Bitten", "Traduccion"=>"Morder"),
    array("Infinitivo"=>"bend", "Pasado"=>"bent", "Participio"=>"bent", "Traduccion"=>"doblar"),
    array("Infinitivo"=>"Blow", "Pasado"=>"Blew", "Participio"=>"Blown", "Traduccion"=>"Soplar"),
    array("Infinitivo"=>"Become", "Pasado"=>"Became", "Participio"=>"Become", "Traduccion"=>"Convertirse en"),
    array("Infinitivo"=>"Begin", "Pasado"=>"Began", "Participio"=>"Begun", "Traduccion"=>"Comenzar"),
    array("Infinitivo"=>"Break", "Pasado"=>"Broke", "Participio"=>"Broken", "Traduccion"=>"Romper"),
    array("Infinitivo"=>"Bring", "Pasado"=>"Brought", "Participio"=>"Brought", "Traduccion"=>"Traer"),
    array("Infinitivo"=>"Build", "Pasado"=>"Built", "Participio"=>"Built", "Traduccion"=>"Construir"),
    array("Infinitivo"=>"Buy", "Pasado"=>"Bought", "Participio"=>"Bought", "Traduccion"=>"Comprar"),
    array("Infinitivo"=>"Catch", "Pasado"=>"Cought", "Participio"=>"Cought", "Traduccion"=>"Coger"),
    array("Infinitivo"=>"Choose", "Pasado"=>"Chose", "Participio"=>"Chosen", "Traduccion"=>"Elegir"),
    array("Infinitivo"=>"Come", "Pasado"=>"Came", "Participio"=>"Came", "Traduccion"=>"Venir"),
    array("Infinitivo"=>"Cost", "Pasado"=>"Cost", "Participio"=>"Cost", "Traduccion"=>"Costar"),
    array("Infinitivo"=>"Cut", "Pasado"=>"Cut", "Participio"=>"Cut", "Traduccion"=>"Cortar"),
    array("Infinitivo"=>"Do", "Pasado"=>"Did", "Participio"=>"Done", "Traduccion"=>"Hacer"),
    array("Infinitivo"=>"Draw", "Pasado"=>"Drew", "Participio"=>"Drawn", "Traduccion"=>"Dibujar"),
    array("Infinitivo"=>"Dream", "Pasado"=>"Dreamt", "Participio"=>"Dreamt", "Traduccion"=>"Soñar"),
    array("Infinitivo"=>"Drink", "Pasado"=>"Drank", "Participio"=>"Drunk", "Traduccion"=>"Beber"),
    array("Infinitivo"=>"Eat", "Pasado"=>"Ate", "Participio"=>"Eaten", "Traduccion"=>"Comer"),
    array("Infinitivo"=>"Fall", "Pasado"=>"Fell", "Participio"=>"Fallen", "Traduccion"=>"Caer"),
    array("Infinitivo"=>"Feel", "Pasado"=>"felt", "Participio"=>"felt", "Traduccion"=>"Sentir"),
    array("Infinitivo"=>"Feed", "Pasado"=>"Fed", "Participio"=>"Fed", "Traduccion"=>"Alimentar"),
    array("Infinitivo"=>"Fight", "Pasado"=>"Fought", "Participio"=>"Fought", "Traduccion"=>"Pelear"),
    array("Infinitivo"=>"Forget", "Pasado"=>"Forgot", "Participio"=>"Forgotten", "Traduccion"=>"Olvidar"),
    array("Infinitivo"=>"Get", "Pasado"=>"Got", "Participio"=>"Got", "Traduccion"=>"Obtener"),
    array("Infinitivo"=>"Go", "Pasado"=>"Went", "Participio"=>"Gone", "Traduccion"=>"Ir"),
    array("Infinitivo"=>"Have", "Pasado"=>"Had", "Participio"=>"Had", "Traduccion"=>"Tener"),
    array("Infinitivo"=>"Hide", "Pasado"=>"Hid", "Participio"=>"Hidden", "Traduccion"=>"Esconder"),
    array("Infinitivo"=>"Know", "Pasado"=>"Knew", "Participio"=>"Known", "Traduccion"=>"Saber"),
    array("Infinitivo"=>"Lose", "Pasado"=>"Lost", "Participio"=>"Lost", "Traduccion"=>"Perder"),
    array("Infinitivo"=>"Make", "Pasado"=>"Made", "Participio"=>"Made", "Traduccion"=>"Fabricar"),
    array("Infinitivo"=>"Pay", "Pasado"=>"Paid", "Participio"=>"Paid", "Traduccion"=>"Pagar"),
    array("Infinitivo"=>"Read", "Pasado"=>"Read", "Participio"=>"Read", "Traduccion"=>"Leer"),
    array("Infinitivo"=>"Say", "Pasado"=>"Said", "Participio"=>"Said", "Traduccion"=>"Decir"),
    array("Infinitivo"=>"fight", "Pasado"=>"fought", "Participio"=>"fought", "Traduccion"=>"luchar"),
    array("Infinitivo"=>"find", "Pasado"=>"found", "Participio"=>"found", "Traduccion"=>"encontrar"),
    array("Infinitivo"=>"throw", "Pasado"=>"threw", "Participio"=>"thrown", "Traduccion"=>"lanzar")
    );

    if ($_POST["vbsMostrar"]==null) {
        
    }

    $cantidadVbs=$_POST["vbsMostrar"];
    $contador=0;
    
    $darValor=true;
    $nCasillasRellenas=$_POST["nivel"];

    $procesaFormulario=false;
    $aNAleatorios=array();
    $aIndices=array();
    $vbsCorrectos=0;

   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>Verbos ingles</title>
</head>

<body>
    <h1>Verbos Irregulares</h1>
    <?

if(isset($_POST["terminar"])){
    ?>
    <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
        <?
    $arrayInputs= $_POST['arrayInput'];
    foreach ($arrayInputs as  $posicion => $informacionInput) {
        foreach ($informacionInput as $tiempo => $value) {
          $verboCorrecto=strtolower($verbos[$posicion][$tiempo]);
          
            if (strtolower($value) === $verboCorrecto) {
                $vbsCorrectos++;
                echo "<input  type=\"text\" readonly placeholder=$tiempo value=$value class=\"correctos\" > ";
            } else {
                echo "<input  type=\"text\" readonly placeholder=$tiempo value=$verboCorrecto class=\"incorrectos\" > ";
            }
               
    }
    echo "</br>";  
}
    echo "<p>Verbos correctos " .$vbsCorrectos."</p>";
    echo "</form>";
   

}elseif(isset($_POST["corregir"])){
    $arrayInputs= $_POST['arrayInput'];
    ?>
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
            <?

    foreach ($arrayInputs as  $posicion => $informacionInput) {
        foreach ($informacionInput as $tiempo => $value) {
          $verboCorrecto=strtolower($verbos[$posicion][$tiempo]);
          $id="arrayInput[".$posicion."][".$tiempo."]";

            if (strtolower($value) === $verboCorrecto) {
                $vbsCorrectos++;
                echo "<input type=\"text\" readonly value=$verboCorrecto class=\"correctos\" name=$id > ";
            } else {
                if (empty($value)) {
                    echo "<input type=\"text\" placeholder=$tiempo class=\"incorrectos\" name=$id> ";
                } else {
 
                    echo "<input type=\"text\" class=\"incorrectos\" value=$value name=$id > ";
                }
            }
    }
    echo "</br>";
}
    echo "<p>Verbos correctos " .$vbsCorrectos."</p>";
    echo "</br><input type=\"submit\" value=\"corregir\" name=\"corregir\">";
    echo "</br><input type=\"submit\" value=\"terminar\" name=\"terminar\">";

    echo "</form>";
}else{

    ?>
            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
                <?

//creo numero aleatorios sin que se repitan para que no se repitan los verbos al mostrarlos
do {
    $numeroAleatorio= rand(1,count($verbos))-1;

    if (!in_array($numeroAleatorio, $aNAleatorios)) {
        array_push($aNAleatorios, $numeroAleatorio);
    }
   
} while(count($aNAleatorios)<$cantidadVbs);

    for ($i=0; $i <$cantidadVbs ; $i++) { 
        
        $arrayDeVerbo = $verbos[$aNAleatorios[$i]];
        
      
        //pongo a 0 array y las casillas
        $aCasillaRellena=array();
        $casilla=0;
                   /**numero de las casillas ya rellenas 1,2,3 o 4*/

        do {
            $numeroAleatorio= rand(1,4);
            if (!in_array($numeroAleatorio, $aCasillaRellena)) {
                array_push($aCasillaRellena, $numeroAleatorio);
            }
           
        } while(count($aCasillaRellena)<$nCasillasRellenas);
        foreach ($arrayDeVerbo as $tiempo => $verbo) {
            $id="arrayInput[".$aNAleatorios[$i]."][".$tiempo."]";

           $casilla++;        
            if (in_array($casilla, $aCasillaRellena)) {
                echo "<input  type=\"text\" placeholder=$tiempo value =$verbo readonly  name=$id> ";
            } else {
                echo "<input  type=\"text\" placeholder=$tiempo name=$id> ";
            }

           
        }
        
        echo "</br>";
    }

    echo "</br><input type=\"submit\" value=\"corregir\" name=\"corregir\">";
    echo "</br><input type=\"submit\" value=\"terminar\" name=\"terminar\">";
}
?>

                <p><a href="index.php"><input type="button" value="index" name="Volver"></a></p>
            </form>
</body>

</html>