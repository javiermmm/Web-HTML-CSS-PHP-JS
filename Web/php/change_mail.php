<?php 
	require('./db_connect.php');


	if (isset($_POST['mail'])){ //Si el usuario ha introducido una nueva contraseña
		if (isset($_POST['password'])) { //Y tambien ha mandado su pass
			
			$user= $_SESSION['user'];
			$sql="SELECT password FROM usuario WHERE username='{$user}';"; //Pido la contraseña actual de ese usuario
			$result = mysql_query($sql, $con);
			$row = mysql_fetch_array($result);
			$pass= sha1($_POST['password'].'cinefilando1793AW'); //Codifico la contraseña actual que ha introducido
	
			if ($row[0] == $pass) { //Si coincide (ha introducido bien la contraseña actual)
				$sql= "UPDATE usuario SET  mail='" . $_POST['mail'] . "' WHERE username='{$user}' ;" ; //La actualizo en la BD
				$result = mysql_query($sql, $con);
				header ("Location: ./../notificacion.php?noti=mail_changed");
			} else 
				header ("Location: ./../notificacion.php?noti=wrong_pass");
		} else
			header ("Location: ./../notificacion.php?noti=wrong_pass");
	}
	else
		header ("Location: ./../perfil.php");
?>
