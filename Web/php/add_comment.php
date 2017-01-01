<?php
	require('./db_connect.php');

	//Recogemos los datos
	$comentario = $_POST["comentario"];
	$pelicula = urldecode($_POST["pelicula"]);
	$id = $_POST["id_pelicula"];
	
	//Escapamos caracteres para evitar posibles ataques a la base de datos
	$comentario = mysql_real_escape_string($comentario);

	//Insertamos el comentario en la base de datos
	$sql="INSERT INTO comentario (id, usuario, pelicula, fecha, contenido) VALUES ('', '{$_SESSION['user']}','{$pelicula}', now(), '{$comentario}');";
	
	echo $sql;
	//Si error lo anulamos y si no redirigimos
	if (!mysql_query($sql,$con)) {
		die('Error: ' . mysql_error());
		//header("Location: ./../notificacion.php?noti=wrong_query");
	}
	else{
		header ("Location: ./../pelicula.php?id={$id}&title={$pelicula}");
	}
	
?>
