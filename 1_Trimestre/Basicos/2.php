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
	<h1>Área del círculo</h1>
		<p>
		<?php
		$Radio = 10;
		$RadioC=$Radio*2;
		$Pi=3.14;
		$Foto = 'imagen/descarga.jpg';
		
		
		echo "<section>";
		echo "Radio: $Radio <br>";
		echo "Área: <b>".$Pi*$RadioC."</b><br>";	
		echo '<img src='.$Foto.' width="200" height="100"/>';		
		echo "</section>";
		
		?>
		</p>
	</body>
</html> 
