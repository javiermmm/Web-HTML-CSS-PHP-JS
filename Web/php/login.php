<?php
	require('./db_connect.php');

	if (isset($_POST['user'])) {
		$login = $_POST['user'];
		
		if (isset($_POST['pass'])) {
			$pass = $_POST['pass'];

			//Pedimos a la BD un usuario con el nombre introducido
			$result = mysql_query("SELECT * FROM usuario WHERE username='$login';", $con);
			$num_rows = mysql_num_rows($result);

			if ($num_rows != 0) { //Si hay alguno que coincida
				$sql="SELECT password, rol FROM usuario WHERE username='$login';"; //Pedimos contraseña y rol
				$result = mysql_query($sql, $con);
				$row = mysql_fetch_array($result);
				$rol = $row[1];

				//Codificamos la contraseña introducida para compararlas
				$pass= sha1($pass.'cinefilando1793AW');

				if ($row[0] != $pass){ //comprueba que las contraseñas sean iguales
					header ("Location: ./../notificacion.php?noti=wrong_pass");
				} else {
					//Añadimos el nombre de usuario a la sesión
					$_SESSION["user"] = $login;
					$_SESSION["rol"] = $rol;
					
					//Recogemos la página en la que estamos para redirigir sin tener que volver a navegar
					if (isset($_POST["page"])){
						list ($nada, $carpeta, $pagina) = explode('/', $_POST["page"]);
					}
					header ("Location: ./../" . $pagina);
				}
			} else 
				header ("Location: ./../notificacion.php?noti=wrong_user");
		} else
			header ("Location: ./../notificacion.php?noti=wrong_pass");
	} else 
		header ("Location: ./../notificacion.php?noti=wrong_user");
?>
