<?php 
	require('./db_connect.php');


	if (isset($_POST['new_pass'])){ //Si el usuario ha introducido una nueva contraseña
		if ($_POST['new_pass'] == $_POST['new_pass_2']) { //Y la contraseña esta bien introducida
			
			$user= $_SESSION['user'];
			$sql="SELECT password FROM usuario WHERE username='{$user}';"; //Pido la contraseña actual de ese usuario
			$result = mysql_query($sql, $con);
			$row = mysql_fetch_array($result);
			$pass= sha1($_POST['pass'].'cinefilando1793AW'); //Codifico la contraseña actual que ha introducido
	
			if ($row[0] == $pass) { //Si coincide (ha introducido bien la contraseña actual)
				$newpass= sha1($_POST['new_pass'].'cinefilando1793AW'); //Codifico la nueva contraseña
				$sql= "UPDATE usuario SET  password='{$newpass}' WHERE username='{$user}' ;" ; //La actualizo en la BD
				$result = mysql_query($sql, $con);
				header ("Location: ./../notificacion.php?noti=pass_changed");
			} else 
				header ("Location: ./../notificacion.php?noti=wrong_pass");
		} else
			header ("Location: ./../notificacion.php?noti=wrong_pass");
	}
	else
		header ("Location: ./../perfil.php");
?>
