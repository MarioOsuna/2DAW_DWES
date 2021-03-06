<?php


$datos = array("Nombre", "Apellidos", "Email");




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
	<script>
		alert("Hola Mundo");
	</script>
</head>

<body>

	<!--<form action="Datosform2.php" enctype="multipart/form-data" method="get">-->
	<form action="Datosform2.php" enctype="multipart/form-data" method="get">
		<hr />
		<?php
		/*EJEMPLO VARIABLES*/

		for ($i = 0; $i < count($datos); $i++) {
			echo "<label >" . $datos[$i] . ": </label>";
			echo "<input type='text' placeholder='$datos[$i]' name='$datos[$i]'><br/>";
		}




		?>








		<hr />



		<button type="submit" name="enviar">Enviar</button><br />
		<!--<button type="reset">Borrar datos del formulario</button>-->


	</form>



</body>

</html>