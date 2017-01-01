<?php
	require_once('./db_connect.php');

		
	//recogemos los datos de registro y vamos validándolos
	if (isset ($_POST['titulo'])) {
		$titulo = $_POST['titulo'];
		if ($titulo == '')
			header("Location: ./../notificacion.php?noti=wrong_data&lost=title");
		else {
			if (isset ($_POST['anyo']))	{	
				$anyo = $_POST['anyo'];
				if ($anyo == '')
					header("Location: ./../notificacion.php?noti=wrong_data&lost=year");
				else {
					if (! filter_var($anyo, FILTER_VALIDATE_INT))
						header("Location: ./../notificacion.php?noti=wrong_data&bad=year");
					else {
						if (($anyo < 1915) || ($anyo > 2015))
							header("Location: ./../notificacion.php?noti=wrong_data&bad=year");
						else {
							if (isset ($_POST['duracion'])) {	
								$duracion = $_POST['duracion'];
								if ($duracion == '')
									header("Location: ./../notificacion.php?noti=wrong_data&lost=duration");
								else {
									if (! filter_var($duracion, FILTER_VALIDATE_INT))
										header("Location: ./../notificacion.php?noti=wrong_data&bad=duration");
									else {
										if (($duracion < 45) || ($duracion > 240))
											header("Location: ./../notificacion.php?noti=wrong_data&bad=duration");
										else {
											if (isset ($_POST['director'])) {	
												$director = $_POST['director'];
												if ($director == '')
													header("Location: ./../notificacion.php?noti=wrong_data&lost=director");
												else {
													if (isset ($_POST['reparto'])) {		
														$reparto = $_POST['reparto'];
														if ($reparto == '')
															header("Location: ./../notificacion.php?noti=wrong_data&lost=cast");
														else {
															if (isset ($_POST['genero'])) {		
																$genero = $_POST['genero'];
																if ($genero == '')
																	header("Location: ./../notificacion.php?noti=wrong_data&lost=genre");
																else {
																	if (isset ($_POST['sinopsis'])) {		
																		$sinopsis = $_POST['sinopsis'];
																		if ($sinopsis == '')
																			header("Location: ./../notificacion.php?noti=wrong_data&lost=sinopsis");
																		else {
																			//Escapamos las cadenas por motivos de seguridad
																			$titulo = mysql_real_escape_string($titulo);
																			$anyo = mysql_real_escape_string($anyo);
																			$duracion = mysql_real_escape_string($duracion);
																			$director = mysql_real_escape_string($director);
																			$reparto = mysql_real_escape_string($reparto);
																			$genero = mysql_real_escape_string($genero);
																			$sinopsis = mysql_real_escape_string($sinopsis);
																			
																			//pedimos a la BD peliculas con ese nombre
																			$sql="SELECT * FROM pelicula WHERE titulo='$titulo';"; 
																			$result = mysql_query($sql, $con);

																			$num_rows = mysql_num_rows($result);
																			
																			if ($num_rows == 0){ //Si no hay ninguna que coincida

																				//Insertamos en la BD
																				$sql="INSERT INTO pelicula (titulo, año, duracion, director, reparto, genero, sinopsis) VALUES ('$titulo', '$anyo', '$duracion', '$director', '$reparto', '$genero', '$sinopsis');";
																				//$sql = utf8_decode($sql);//Esta funcion es para "traducir" la 'ñ' del campo año al buscar
																				
																				//Si hay error lo anulamos y si no subimos la foto
																				if (! mysql_query($sql,$con)) {
																					die('Error: ' . mysql_error());
																					header("Location: ./../notificacion.php?noti=wrong_query");
																				}
																				else{
																					var_dump($_FILES);
																					var_dump($_POST);
																					if (is_uploaded_file($_FILES['portada']['tmp_name'])) {
																						
																						//Recuperamos el id con el que hemos añadido la pelicula, para nombrar la imagen con su portada
																						$sql="SELECT * FROM pelicula WHERE titulo='{$titulo}' AND director='{$director}' AND reparto='{$reparto}';";
																						$result = mysql_query($sql, $con);
																						$id = mysql_result($result, 0, 0);
																						
																						echo $sql;
																						
																						//recojo la imagen
																						$imagen = $_FILES['portada']['name'];
																						echo $imagen;
																						
																						//Obtengo el nombre de la imagen y la extensión de la foto
																						$extension = "jpg";

																						$nombre_imagen = $id.".".$extension;
																						echo $nombre_imagen;
																						
																						//Coloco la imagen del usuario en la carpeta correspondiente con el nuevo nombre
																						$ruta="./../data/peliculas/pendientes/".$nombre_imagen;
																						
																						//Renombramos la imagen
																						rename($_FILES['portada']['tmp_name'], $ruta);
																					}
																					header("Location: ./../notificacion.php?noti=ok_new_movie");
																				}
																			}
																			else {
																				header("Location: ./../notificacion.php?noti=wrong_data");
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
								}
							}
						}
					}
				}
			}
		}
	}
?>
