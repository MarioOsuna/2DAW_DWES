<!doctype html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Resume</title>
</head>

<body>

<table border="1" align="center" width=100 >

 

    <?php

    echo "Mario Osuna Ordóñez";
    //Declaración de variables mes, dia y año
    
    $month=date("n");
    $year=date("Y");
    $diaActual=date("j");

    //Obtenemos el dia de la semana del primer dia
    //Devuelve 0 para domingo, 6 para sabado
    $diaSemana=date("w",mktime(0,0,0,$month,1,$year))+7;

   // $ultimoDiaMes=date("d",(mktime(0,0,0,$month+1,1,$year)-1)); //Último día del mes

    $ultimoDiaMes=cal_days_in_month(CAL_GREGORIAN, $month, $year);

    $meses=array(1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

     $last_cell=$diaSemana+$ultimoDiaMes;
        // hacemos un bucle hasta 42, que es el máximo de valores que puede
        

        echo "<tr><th colspan=7>".$month."</th></tr>       
        <tr>
            <th>Lun</th><th>Mar</th><th>Mie</th><th>Jue</th>
            <th>Vie</th><th>Sab</th><th>Dom</th>
        </tr>";

        for($i=1;$i<=42;$i++)
		{
			if($i==$diaSemana)
			{
				// determinamos en que dia empieza
				$day=1;
			}
			if($i<$diaSemana || $i>=$last_cell)
			{
			
                    //echo "<td bgcolor='red'></td>";
                
                    echo "<td></td>";
                
                
			}else{
				// mostramos el dia
                if($day==$diaActual)
                {
                    echo "<td bgcolor='green'>$day</td>";
                }
				else{
                        if($i%7==0)
                        {
                            echo "<td bgcolor='red'>$day</td>";
                        }else{
                            echo "<td>$day</td>";
                        }
                   
                }
				$day++;
			}
			// cuando llega al final de la semana, iniciamos una columna nueva
			if($i%7==0)
			{
				echo "</tr><tr>\n";
			}
		}
          
                          
                          
    ?>      
    </table>

</body>

</html>