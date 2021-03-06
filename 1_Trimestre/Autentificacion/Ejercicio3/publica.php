<?php

/*Creamos la sesión y declaramos*/
session_start();
if (!isset($_SESSION['aut'])) {
	$_SESSION['aut'] = false;     // Valor true al autentificar.
	$_SESSION['user'] = 'Invitado'; //Información de usuario.
}
$pagina = "";
if ($_SESSION['user'] = 'Invitado') {
	$pagina = "<p>Hola Bienvenido a mi página web, por lo que veo eres invitado. Te invito a que te registres o incices sesión si ya tienes una cuenta para disfrutar todas las ventajas que te puedo ofrecer</p>";
} else {
	if ($_SESSION['user'] = 'Administrador') {
		$pagina = "<p>Buenas Admin! Quieres modificar ago de la página hoy? </p>";
	} else {
		$pagina = "<p>Buenas " . $_SESSION['user'] . " Qué tal te va hoy? Un placer tenerte de vuelta :)</p>";
	}
}

?>

<!-- LA VISTA -->
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css" -->
	<title>Autentificación</title>
</head>

<body>
	<header>
		<h1>Autentificación</h1>
		<h2>Usted está como: <?php echo $_SESSION['user']; ?></h2>

		<?php
		/*Caja de información de cuenta o formulario de login en función de la autentificación*/
		if ($_SESSION['aut']) {
			echo "<a href=\"cerrarsesion.php\">Salir</a>";
		} else {
			echo $pagina;
		}
		?>
	</header>



	<p>pública</p>
</body>

</html>