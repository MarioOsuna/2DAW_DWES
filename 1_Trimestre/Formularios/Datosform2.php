<?php
	/*EJEMPLO VARIABLES*/
	if(!isset($_GET["enviar"])){
		//echo  "acceso no autorizado";//redirección
		header('Location: form2.php');
	}else{
	
	for($i=0;$i<2;$i++){
		echo $_GET [$i]." ";
	}
}
	
	
	
	
?>