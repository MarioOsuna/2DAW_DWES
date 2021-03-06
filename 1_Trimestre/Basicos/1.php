<?php
/*
*
*
*/
?>

<html>
<head>
 <title></title>
</head>
	<body>
	<h1>Ficha alumno</h1>
		<p>
		<?php
		$Name = "Mario";
		$Ap = "Osuna";
		$Foto = 'imagen/foto.jpg';
		
		echo "<section>";
		echo "Hola soy <b>$Name $Ap</b><br>";
		//echo "<img scr=$Foto>";
		//echo $Foto;
		echo '<p>Foto: <img src='.$Foto.' width="100" height="100"/></p>';
			 
		echo "</section>";
		
		?>
		</p>
	</body>
</html> 
