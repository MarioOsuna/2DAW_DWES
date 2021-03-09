<?php
session_start();

/**
 * Comprobamos que el fichero sea correcto de tipo text/plain --> txt
 */


if ($_FILES["file"]["type"] == "text/plain"){
    if ($_FILES["file"]["error"] > 0) {
        //echo "Error: " . $_FILES["file"]["error"] . "<br/>";
         $_SESSION["error"]=$_FILES["file"]["error"];
    } 
}else {
    
     $_SESSION["error"]="archivo no válido, debe ser un archivo txt";
    header("Location: index.php");
}

function caracter($var)
{

    $var = trim($var);

    $var = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        'a',
        $var
    );

    $var = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        'e',
        $var
    );

    $var = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        'i',
        $var
    );

    $var = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô' ),
        'o',
 $var
    );

    $var = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        'u',
        $var
    );

    $var = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'n', 'c', 'C'),
        $var
    );

   

   return $var;

}

if (isset($_POST["enviar"]) && isset($_POST["tipo"])) {
    $arrayUsers=crearUsuarios();

    if ($_POST["tipo"]=="linux") {
        $nomArchivo= usuarioLinux($arrayUsers);
    }else{
        $nomArchivo=usuarioMysql($arrayUsers);
    }
    descargar($nomArchivo);
}
function crearUsuarios(){
   $aUsuarios=[];


$archivo = fopen('RelAluProMatUni.txt','r'); 

    while (!feof($archivo)){
        $linea = fgets($archivo);
        $linea=caracter(strtolower($linea));
        if(preg_match("/^[a-z]+(\s)+[a-z]+(\,)(\s)+[a-z]+/im", $linea)){
            $resultado="";
                if(preg_match_all("/\b[a-z]{2}/i", $linea, $matches)){
                    foreach ($matches as $key => $value) {
                        for ($i=0; $i < 3; $i++) { 
                            $resultado.= substr($value[$i], 0, 2);
                        }      
                    } 
                }
                $resultadotmp=$resultado;
                $contador=1;

                while (in_array($resultado, $aUsuarios)) {
                    $contador++;
                    $resultado=$resultadotmp.$contador;
                }
                
            array_push($aUsuarios, $resultado);
            
            }   
    }
fclose($archivo);

return $aUsuarios;

}

function usuarioLinux($aUsuarios){
    $curso=$_POST["curso"].$_POST["nombre"].$_POST["anio"];


    $fechaactual=date("Y-m-d");
    $nombreArchivo = "usuarios".$fechaactual.".sh";
    $archivo = fopen($nombreArchivo,'w'); 

    $curso=$_POST["nombre"];

    foreach ($aUsuarios as $value) {
        fwrite($archivo, "groupadd ".$value." \n");
        fwrite($archivo, "useradd ".$value." -m -d /home/".$curso."/".$value." -s /bin/bash -g ".$value." -p $(echo 'password') \n");
        fwrite($archivo, "mkdir /home/".$curso."/".$value."/public_html \n");
        fwrite($archivo, "chown -R ".$value .":".$value." /home/".$curso."/".$value." \n");
        fwrite($archivo, " \n");

    }
    return $nombreArchivo;

}

/**
 * crea usuario en mysql
 */
function usuarioMysql($aUsuarios){
    $curso=$_POST["curso"];
    $nombre=$_POST["nombre"];
    $anio=$_POST["anio"];
    $fechaactual=date("Y-m-d");
    $nombreArchivo = "usuarios".$fechaactual.".sql";
    $archivo = fopen($nombreArchivo,'w'); 

    foreach ($aUsuarios as $value) {

        $baseDatos= $curso.$nombre.$anio."_".$value;

        fwrite($archivo, "CREATE USER " . $value."@'localhost' IDENTIFIED BY 'password'; \n");
        fwrite($archivo, "CREATE DATABASE " . $baseDatos." ;\n");
        fwrite($archivo, "GRANT ALL PRIVILEGES ON " . $baseDatos . " TO '".$value."'@'localhost' IDENTIFIED BY 'password' ;\n");
        
        fwrite($archivo, " \n");

    }

    return $nombreArchivo;
    
}


function descargar($filename){
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    readfile($filename);
    die();
}
