<?php
	
	$mysqli = new mysqli('localhost', 'biblioteca', '123', 'eLibris');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>