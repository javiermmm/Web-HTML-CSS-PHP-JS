<?php	
	require_once ("comun.php");

	/****************************************
	*Primero conectamos con la base de datos
	*****************************************/
	$con = mysql_connect("localhost","javi","12345");
	
	//Si hay algun error lo anulamos
	if (!$con){
		die('ERROR al conectar: ' . mysql_error());
		header("Location: ./../notificacion.php?noti=error_connect");
	}
	
	//elegimos la BD a la que nos conectamos
	mysql_select_db("cinefilando", $con);
	
	//Pedimos codificación UTF-8 a los datos devueltos por las consultas SQL
	mysql_query("SET NAMES 'utf8'", $con);
?>
