<?php

echo "GALERÍA DE FOTOS<br>";


function galeria()
{
    $ruta = "fotos/";

    $gestor = opendir($ruta);

    while (($archivo = readdir($gestor)) !== false) {

        $ruta_completa = $ruta . "/" . $archivo;

        // Se muestran todos los archivos y carpetas excepto "." y ".."
        if ($archivo != "." && $archivo != "..") {
            // Si es un directorio se recorre recursivamente

            echo "<img src=\"fotos/$archivo\" width='300' height='300' alt=''>&nbsp;";
        }
    }

    // Cierra el gestor de directorios
    closedir($gestor);
}
galeria();
echo "<hr>";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file"><br />
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>