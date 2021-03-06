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
	<h1>Ejercicio 2</h1>
		<p>
		<?php
		$mes = 2;
		$year = 2020;
		
		$num = cal_days_in_month(CAL_GREGORIAN, $mes, $year); // 31
		
		echo "<section>";
		
		echo "Hubo $num días en el mes $mes del año $year";

			 
		echo "</section>";
		
		?>
		</p>
	</body>
</html> 
