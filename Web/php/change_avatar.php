<?php 
	require('./db_connect.php');


	$usuario=$_GET["id"];

if (is_uploaded_file($_FILES['avatar']['tmp_name'])) {
	
	//recojo la imagen
	$imagen = $_FILES['avatar']['name'];
	
	//Obtengo el nombre de la imagen y la extensión de la foto
	$extension = "jpg";

	$nombre_imagen = $usuario.".".$extension;
	
	//Coloco la imagen del usuario en la carpeta correspondiente con el nuevo nombre
	$ruta="./../data/usuarios/".$nombre_imagen;

	if (rename($_FILES['avatar']['tmp_name'], $ruta)) 	
		header ("Location:  ./../perfil.php");
}
else
	header ("Location:  ./../perfil.php");
?>
