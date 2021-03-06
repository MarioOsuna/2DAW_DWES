<?php

/* 
if ($_FILES["file"]["error"] > 0) {
 echo "Error: " . $_FILES["file"]["error"] . "<br>";
}
else {
 echo "Upload: " . $_FILES["file"]["name"] . "<br>";
 echo "Type: " . $_FILES["file"]["type"] . "<br>";
 echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 echo "Stored in: " . $_FILES["file"]["tmp_name"]; 
}*/
//print_r($_FILES["file"]);

$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);



if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 4000000)
    && in_array($extension, $allowedExts)
) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
    } else {
        echo "Upload: " . $_FILES["file"]["name"] . "<br/>";
        echo "Type: " . $_FILES["file"]["type"] . "<br/>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . "kB <br/>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br/>";

        $n = $_FILES["file"]["name"];

        if (file_exists("fotos/" . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
            echo "<img src=\"fotos/$n\" alt=''>";
            //galeria();
        } else {
            move_uploaded_file(
                $_FILES["file"]["tmp_name"],
                "fotos/" . $_FILES["file"]["name"]
            );
            echo "Stored in: " . "fotos/" . $_FILES["file"]["name"];
            // galeria();
            echo "<img src=\"fotos/$n\" alt=''>";
        }
    }
} else {
    echo "Invalid file";
}

function galeria()
{
    $ruta = "fotos/";

    $gestor = opendir($ruta);

    while (($archivo = readdir($gestor)) !== false) {

        $ruta_completa = $ruta . "/" . $archivo;

        // Se muestran todos los archivos y carpetas excepto "." y ".."
        if ($archivo != "." && $archivo != "..") {
            // Si es un directorio se recorre recursivamente

            echo "<img src=\"fotos/$archivo\" alt=''>";
        }
    }

    // Cierra el gestor de directorios
    closedir($gestor);
}
