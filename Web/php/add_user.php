<?php
	require_once('./db_connect.php');

		
	//recogemos los datos de registro y vamos validándolos
	if (isset ($_POST['user'])) {
		$login = $_POST['user'];
		if ($login == '')
			header("Location: ./../notificacion.php?noti=wrong_reg&lost=username");
		else {
			if (isset ($_POST['pass']))	{	
				$pass = $_POST['pass'];
				if ($pass == '')
					header("Location: ./../notificacion.php?noti=wrong_reg&lost=pass");
				else {
					if (isset ($_POST['pass2'])) {		
						$pass2 = $_POST['pass2'];
						if ($pass2 == '')
							header("Location: ./../notificacion.php?noti=wrong_reg&lost=pass_2");
						else {
							if ($pass != $pass2)
								header("Location: ./../notificacion.php?noti=wrong_reg&bad=pass_2");
							else {
								if (isset ($_POST['email'])) {	
									$email = $_POST['email'];
									if ($email == '')
										header("Location: ./../notificacion.php?noti=wrong_reg&lost=mail");
									else {
										if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
											header("Location: ./../notificacion.php?noti=wrong_reg&bad=mail");
										} else {
											//Escapamos las cadenas por motivos de seguridad
											$login = mysql_real_escape_string($login);
											$pass = mysql_real_escape_string($pass);
											$email = mysql_real_escape_string($email);

											//pedimos a la BD usuarios con ese nombre
											$sql="SELECT * FROM usuario WHERE username='$login';"; 
											$result = mysql_query($sql, $con);

											$num_rows = mysql_num_rows($result);

											if ($num_rows == 0){ //Si no hay ninguno que coincida
												//Codificamos la contraseña
												$pass= sha1($pass.'cinefilando1793AW');

												//Insertamos en la BD
												$sql="INSERT INTO usuario (username, password, mail, rol) VALUES ('$login','$pass','$email', 'usuario');";
												
												//Si error lo anulamos y si no redirigimos
												if (!mysql_query($sql,$con)) {
													die('Error: ' . mysql_error());
													header("Location: ./../notificacion.php?noti=wrong_query");
												}
												else{
													header("Location: ./../notificacion.php?noti=ok_reg");
												}
											}
											else {
												header("Location: ./../notificacion.php?noti=wrong_reg");
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
?>
