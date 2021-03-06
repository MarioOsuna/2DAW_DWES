<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Ejercicio 1</title>
</head>

<body>

  <?php
  echo "Mario Osuna Ordóñez</br>";


  #Primera parte

  /*$comunidades=array(
"Andalucia"=>array("Córdoba","Granada","Jaen","Huelva","Sevilla","Malaga"),
"Castilla y león"=>array("Valladolid","Leon","Palencia","Burgos","Soria","Avila","Segovia","Zamora","Salamanca"),
"Madrid"=>array("Madrid"));


foreach($comunidades as $clave=>$provincia)
{
  echo "</br><b>Comunidades: ".$clave."</b></br>";
 foreach($provincia as $cl=>$ciudad)
 {
  echo $ciudad." ";
  }

}*/


  #Segunda parte
  /*
$aComunidades= array(
  array("comunidad"=>"Andalucia","provincias"=>array("Córdoba","Granada","Jaen","Huelva","Sevilla","Malaga","Almería","Cádiz")),
  array("comunidad"=>"Galicia","provincias"=>array("Coruña","Orense","Lugo","Pontevedra")),
  array("Comunidad"=>"Aragón","provincias"=>array("Huesca","Teruel","Zaragoza")),
  array("Comunidad"=>"Asturias","provincias"=>array("Oviedo")),
  array("Comunidad"=>"Baleares","provincias"=>array("Palma de Mallorca")),
  array("Comunidad"=>"Canarias","provincias"=>array("Santa Cruz de Tenerife","Las Palmas de Gran Canaria")),
  array("Comunidad"=>"Cantabria","provincias"=>array("Santander")),
  array("Comunidad"=>"Castilla-La Mancha","provincias"=>array("Albacete","Ciudad Real","Cuenca","Guadalajara","Toledo")),
  array("Comunidad"=>"Castilla y León","provincias"=>array("Ávila","Burgos","León","Salamanca","Segovia","Soria","Valladolid","Zamora")),
  array("Comunidad"=>"Cataluña","provincias"=>array("Barcelona","Gerona","Lérida","Tarragona")),
  array("Comunidad"=>"Comunidad Valenciana","provincias"=>array("Alicante","Castellón de la Plana","Valencia")),
  array("Comunidad"=>"Extremadura","provincias"=>array("Badajoz","Cáceres")),
  array("Comunidad"=>"Murcia","provincias"=>array("Murcia")),
  array("Comunidad"=>"Madrid","provincias"=>array("Madrid")),
  array("Comunidad"=>"Navarra","provincias"=>array("Pamplona")),
  array("Comunidad"=>"País Vasco","provincias"=>array("Bilbao","San Sebastián","Vitoria")),
  array("Comunidad"=>"La Rioja","provincias"=>array("Logroño"))

);

foreach($aComunidades as $valor){
  foreach($valor as $clave=>$comunidad){
    if (is_array($comunidad))//if($clave=="provincias")
    {
      for($i=0;$i<count($comunidad);$i++){
        echo $comunidad[$i]." ";
      }

    }else{
      echo "</br><b>".$comunidad."</b></br>";

    }
    
  }
}*/
  #tercera parte

  $aComunidades = array(
    array("comunidad" => "Andalucia", "provincias" => array("Córdoba" => 145, "Granada" => 53, "Jaen" => 65, "Huelva" => 47, "Sevilla" => 35, "Malaga" => 74, "Almería" => 100, "Cádiz" => 14)),
    array("comunidad" => "Galicia", "provincias" => array("Coruña" => 5, "Orense" => 9, "Lugo" => 3, "Pontevedra" => 10)),
    array("Comunidad" => "Aragón", "provincias" => array("Huesca" => 4, "Teruel" => 16, "Zaragoza" => 4)),
    array("Comunidad" => "Asturias", "provincias" => array("Oviedo" => 13)),
    array("Comunidad" => "Baleares", "provincias" => array("Palma de Mallorca" => 53)),
    array("Comunidad" => "Canarias", "provincias" => array("Santa Cruz de Tenerife" => 54, "Las Palmas de Gran Canaria" => 19)),
    array("Comunidad" => "Cantabria", "provincias" => array("Santander" => 76)),
    array("Comunidad" => "Castilla-La Mancha", "provincias" => array("Albacete" => 4, "Ciudad Real" => 12, "Cuenca" => 34, "Guadalajara" => 12, "Toledo" => 19)),
    array("Comunidad" => "Castilla y León", "provincias" => array("Ávila" => 12, "Burgos" => 45, "León" => 21, "Salamanca" => 102, "Segovia" => 43, "Soria" => 14, "Valladolid" => 22, "Zamora" => 17)),
    array("Comunidad" => "Cataluña", "provincias" => array("Barcelona" => 3456, "Gerona" => 134, "Lérida" => 105, "Tarragona" => 146)),
    array("Comunidad" => "Comunidad Valenciana", "provincias" => array("Alicante" => 12, "Castellón de la Plana" => 38, "Valencia" => 81)),
    array("Comunidad" => "Extremadura", "provincias" => array("Badajoz" => 10, "Cáceres" => 10)),
    array("Comunidad" => "Murcia", "provincias" => array("Murcia" => 23)),
    array("Comunidad" => "Madrid", "provincias" => array("Madrid" => 510)),
    array("Comunidad" => "Navarra", "provincias" => array("Pamplona" => 120)),
    array("Comunidad" => "País Vasco", "provincias" => array("Bilbao" => 134, "San Sebastián" => 73, "Vitoria" => 31)),
    array("Comunidad" => "La Rioja", "provincias" => array("Logroño" => 56))

  );

  echo "CONTAGIOS</br>";
  $suma = 0;
  foreach ($aComunidades as $valor) {
    //echo $valor["Comunidad"]." TOTAL ENFERMOS: ".$valor["Contagios"]."</br>";

    foreach ($valor as $clave => $comunidad) {
      if (is_array($comunidad)) //if($clave=="provincias")
      {
        foreach ($comunidad as $c => $cont) {
          echo $c . " tiene " . $cont . " enfermos<br/>";
          $suma += $cont;
        }

        /*for($i=0;$i<count($comunidad);$i++){
        echo $comunidad[$i]." ";
      }*/
      } else {

        echo "</br><b>" . $comunidad . "</b></br></br>";
      }
    }
    if ($suma < 500) {
      echo "<b>En total hay <font color='green'>" . $suma . "</font> enfermos</b></br>";
    } else {
      echo "<b>En total hay <font color='red'>" . $suma . "</font> enfermos</b></br>";
    }
    $suma = 0;
  }




  ?>

</body>

</html>