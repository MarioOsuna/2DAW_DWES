<?php




function clearData($cadena)
{
	$cadena_limpia = trim($cadena);
	$cadena_limpia = htmlspecialchars($cadena);
	$cadena_limpia = stripslashes($cadena);
	return $cadena_limpia;
}
$nombre = $apellidos = $Email = " ";
$msgErrorNombre = $msgErrorApellidos = $msgErrorEmail = " ";
$lprocesaformulario = false;
//validacion	
if (isset($_POST["enviar"])) {

	$nombre = clearData($_POST["Nombre"]);
	$apellidos = clearData($_POST["Apellidos"]);
	$Email = clearData($_POST["Email"]);

	$lprocesaformulario = true;


	if (empty($nombre)) {
		$msgErrorNombre = "Nombre requerido";
		$lprocesaformulario = false;
	}
	if (empty($apellidos)) {
		$msgErrorApellidos = "Apellido requerido";
		$lprocesaformulario = false;
	}
	if (empty($Email)) {
		$msgErrorEmail = "Email requerido";
		$lprocesaformulario = false;
	}
} else {
}

if ($lprocesaformulario) {
	echo "mostrar datos del formulario: <br/>";
	echo $nombre . " " . $apellidos . " " . $Email;
} else {
}






?>

<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">

	<title>Formulario</title>

</head>

<body>

	<!--<form action="Datosform2.php" enctype="multipart/form-data" method="get">-->
	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data" method="post">
		<hr />
		<?php
		/*EJEMPLO VARIABLES*/

		echo "<label >Nombre: </label>";
		echo "<input type=\"text\" placeholder='Nombre' name=\"Nombre\" value=" . $nombre . "> <b style='color: red;'>" . $msgErrorNombre . "</b><br/>";
		echo "<label >Apellidos: </label>";
		echo "<input type='text' placeholder='Apellidos' name='Apellidos' value=" . $apellidos . "> <b style='color: red;'>" . $msgErrorApellidos . "</b><br/>";
		echo "<label >Email: </label>";
		echo "<input type='text' placeholder='Email' name='Email' value=" . $Email . "><b style='color: red;'> " . $msgErrorEmail . "</b><br/>";



		?>








		<hr />



		<button type="submit" name="enviar">Enviar</button><br />
		<!--<button type="reset">Borrar datos del formulario</button>-->


	</form>



</body>

</html>