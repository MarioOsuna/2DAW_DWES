<?php
	/*EJEMPLO VARIABLES*/

	if(!isset($_POST["enviar"])){
		//echo  "acceso no autorizado";//redirección
		header('Location: form1.html');
	}else{
	
	echo $_GET ['nombre']." ";
	echo $_GET ['apellidos'];
	}
	
	
	
?>