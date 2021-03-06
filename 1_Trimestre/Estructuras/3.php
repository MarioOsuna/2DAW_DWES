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
	<h1>Ejercicio 3</h1>
		<p>
		<?php
			//fecha actual
			/*echo date(d);
			echo date(m);
			echo date(Y);*/
			
			$dia=date('d');
			$mes=date('m');
			$ano=date('Y');

			//fecha de nacimiento

			$dianaz=26;
			$mesnaz=8;
			$anonaz=1999;

			//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual
			
			echo "<section>";
			
			if (($mesnaz == $mes) && ($dianaz > $dia)) {
			$ano=($ano-1); }

			//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

			if ($mesnaz > $mes) {
			$ano=($ano-1);}

			//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

			$edad=($ano-$anonaz);

			echo "Tiene $edad años";

		
	
		echo "</section>";
		
		?>
		</p>
	</body>
</html> 
