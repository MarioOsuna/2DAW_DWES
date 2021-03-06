<?php

/**
 *  Se desea desarrollar una aplicación web que muestre al usuario las noticias almacenadas en el array
 *  Según sus intereses. Los intereses serán establecidos en un script de preferencias, donde el usuario 
 *  marcará en un checkbox sees temas preferentes
 * 
 */
session_start();

if (!isset($_SESSION['usuario'])) {

    header('Location: index.php');

} else {
    if ($_SESSION['usuario'] == "EJ1" || $_SESSION['usuario'] == "ADMIN") {


        $noticias = array(
            "videojuegos" => array("Videojuego1", "Videojuego2", "Videojuego3"),
            "Literatura" => array("Literatura1", "Literatura2"),
            "Cine" => array("Cine1", "Cine2", "Cine3", "Cine4"),
            "series" => array("Series1", "Series2")
        );

        $cadena = "";
        $cad = "";

        if (isset($_COOKIE['noticias'])) {
            $cadena =  $_COOKIE['noticias'];
        } else {

            $cadena = "<h1>Preferencias</h1><hr><br>";

            $cadena .= "<h2>Bienvenido " . $_SESSION['usuario'] . "</h2><br>";
            foreach ($noticias as $key => $value) {
                $cadena .= "<input type='checkbox' value='$key' name='$key'>$key<br>";
            }
            $cadena .= "<br><input type='submit' value='enviar' name='enviar'>";

            if (isset($_POST["enviar"])) {
                $cadena = "<h1>Resumen de noticias</h1><hr><br>";

                $cadena .= "<h2>Bienvenido " . $_SESSION['usuario'] . "</h2><br>";


                $cadena .= "<ul>";
                foreach ($noticias as $key => $value) {

                    if (isset($_POST[$key])) {

                        if ($_POST[$key] == $key) {

                            foreach ($value as $k => $v) {
                                $cadena .= "<li>" . $v . "<br></li>";
                            }
                        }
                    }
                }

                $cadena .= "</ul>";
                //echo $cadena;
                setcookie("noticias", $cadena, time() + 3600);
            }

            
        }
    } else {
        $cadena = "No eres un usuario autorizado<br>";
        
    }
    $cad= "<a href='index.php'>Inicio</a>&nbsp;&nbsp;<a href='cerrarsesion.php'>Cerrar sesión</a>";
}




?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escenario 1</title>
</head>

<body>
    <form action="1.php" enctype="multipart/form-data" method="post">


        <?php

        echo $cadena;
        echo $cad;

        ?>




    </form>

</body>

</html>