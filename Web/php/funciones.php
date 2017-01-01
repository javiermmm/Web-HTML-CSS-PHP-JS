<?php
	require_once('./php/db_connect.php');
	
	
	class HTMLCreator {
		
		//Funcion para construit el cuadro de logueo, teniendo en cuenta si se ha iniciado sesion o no.
		public static function construyeLogin() {
			if (isset($_SESSION["user"])){
				echo "<p id='log_on'>Logueado como <span id='user_log'><a id='link_profile' href='./perfil.php'>" . $_SESSION["user"] . "</a></span>";
				echo "<br>";
				echo "<a id='link_registro' href='./php/logout.php'>Salir</a></p>";
			} else
				echo "<form id='form_login' action='./php/login.php' method='post'>
					<fieldset id='field_login'>
						<legend>Login</legend>
						<label for='user_log'>
							Nombre de Usuario:
						</label>
						<br>
						<input id='user_log' class=':required' type='text' name='user'/>
						<br>
						<label for='clave'>
							Contraseña:
						</label>
						<br>
						<input id='clave' class=':required' type='password' name='pass'/>
						<input type='hidden' name='page' value='" . htmlspecialchars($_SERVER['REQUEST_URI']) . "'>
						<br>
						<br>
						<button>
							Enviar
						</button>
						<p>¿Aún no te has registrado? <a id='link_registro' href='registro.php'>Registrate ahora!</a></p>
					</fieldset>
				</form>";
		}
		
		
		
		
		
		
		
		
		
		
		//Funcion para montar la tabla del directorio de peliculas, sacando la informacion de la base de datos
		public static function construyeDirectorio($con) {
			
			//Empezamos a montar la tabla
			echo "<table id='tabla_directorio'>";
			echo "<caption>Directorio de peliculas</caption>";
				//Pintamos la cabecera del directorio
				HTMLCreator::pintaCabeceraDirectorio();
				
				//Hacemos la consulta a la base de datos
				$sql="SELECT * FROM pelicula WHERE estado='publicada' ORDER BY titulo";
				$result = mysql_query($sql, $con);
				$i=0;
				$num_rows=mysql_num_rows($result);
				
				while($i < $num_rows) {  //Para cada fila (pelicula) devuelta
				
					//pintamos la fila correspondiente
					HTMLCreator::pintaFilaDirectorio($result, $i);
					
					//Incrementamos contador del bucle
					$i = $i + 1;
				}
			
			//Añadimos la etiqueta de cierre de la tabla
			echo "</table>";
		}
		
		
		
		
		
		
		
		
		
		
		//Funcion para montar la tabla del directorio de peliculas, sacando la informacion de la base de datos
		public static function construyeDirectorioPorGenero($con, $genero) {
			
			//Empezamos a montar la tabla
			echo "<table id='tabla_directorio'>";
			echo "<caption>Películas de género " . $genero . "</caption>";
				//Pintamos la cabecera del directorio
				HTMLCreator::pintaCabeceraDirectorio();
				
				//Hacemos la consulta a la base de datos
				$sql="SELECT * FROM pelicula WHERE FIND_IN_SET('{$genero}',genero)>0 AND estado='publicada' ORDER BY titulo";
				$result = mysql_query($sql, $con);
				$i=0;
				$num_rows=mysql_num_rows($result);
				
				while($i < $num_rows) {  //Para cada fila (pelicula) devuelta
				
					//pintamos la fila correspondiente
					HTMLCreator::pintaFilaDirectorio($result, $i);

					//Incrementamos contador del bucle
					$i = $i + 1;
				}
			
			//Añadimos la etiqueta de cierre de la tabla
			echo "</table>";
		}
		
		
		
		
		
		
		
		
		//Funcion para montar la tabla del directorio de peliculas, sacando la informacion de la base de datos
		//a partir de una busqueda realizada por el usuario
		public static function construyeDirectorioBusqueda($con, $busqueda) {
			
			$busqueda = htmlspecialchars($busqueda);
				
			//Pedimos las peliculas que contienen en alguno de sus campos un patron del estilo algo+busqueda+algo
			$sql = "SELECT * FROM pelicula WHERE (titulo LIKE '%$busqueda%' OR año LIKE '%$busqueda%' OR director LIKE '%$busqueda%' OR reparto LIKE '%$busqueda%' OR sinopsis LIKE '%$busqueda%') AND estado='publicada' ORDER BY 'titulo';";
			//$sql = utf8_decode($sql);//Esta funcion era para "traducir" la 'ñ' del campo año al buscar, pero ya no hace falta (VER FICHERO db_connect)
			$result = mysql_query($sql, $con);
			$num_rows=mysql_num_rows($result);
			
			if ($num_rows > 0) {
			
				//Empezamos a montar la tabla
				echo "<table id='tabla_directorio'>";
				echo "<caption>Resultados de la búsqueda</caption>";
					//Pintamos la cabecera del directorio
					HTMLCreator::pintaCabeceraDirectorio();
					
					$i=0;
					while($i < $num_rows) {  //Para cada fila (pelicula) devuelta
					
						//pintamos la fila correspondiente
						HTMLCreator::pintaFilaDirectorio($result, $i);

						//Incrementamos contador del bucle
						$i = $i + 1;
					}
				
				//Añadimos la etiqueta de cierre de la tabla
				echo "</table>";
			}
			else
				header ("Location: ./notificacion.php?noti=no_result");
		}
		









		//funcion para construir la tabla con informacion de una pelicula
		public static function construyePelicula($con, $id) {
			
			//Hacemos la consulta a la base de datos
			$sql="SELECT * FROM pelicula WHERE id={$id} AND estado='publicada'";
			$result = mysql_query($sql, $con);
			$num_rows=mysql_num_rows($result);
			
			if ($num_rows > 0) {
			
				//nos quedamos sus datos
				$row = mysql_fetch_array($result);
				$id = $row[0];
				$pelicula = $row[1];
				$pelicula = htmlspecialchars($pelicula);
					
				//Montamos la tabla de informacion de la peli
				HTMLCreator::pintaTablaPeli ($row);
					
				//Ahora montamos la parte de los comentarios, tanto para verlos como para hacerlos.
				//Si el usuario esta logueado, le mostramos los comentarios y le damos la opcion de comentar
				if (isset($_SESSION["user"])){
					
					//Hacemos la consulta a la base de datos
					$sql='SELECT * FROM comentario WHERE pelicula="' . $pelicula . '" ORDER BY fecha';
					$result = mysql_query($sql, $con);
					$num_rows=mysql_num_rows($result);

					//si no hay comentarios, mostramos un mensaje que lo indique
					if ($num_rows == 0)
						echo "	<p id='comment_intro'>Aún no hay comentarios ¡Sé el primero en publicar uno!</p>";
					else {
						//si hay comentarios, los mostramos
						echo "	<p id='comment_intro'>Algunos usuarios han comentado esto sobre la pelicula:</p>";
						$i=0;
						
						while($i < $num_rows) {  //Para cada comentario devuelto
							HTMLCreator::pintaComentario($result, $i);
							$i = $i + 1;
						}
					}
					
					//Por último, mostramos el textArea para que los usuarios comenten
					HTMLCreator::pintaTextAreaParaComentar($pelicula, $id);
				}
				else {
					echo "
						<article id='aviso_login'>
								<p>Si quieres ver algunos comentarios acerca de la peli, o añadir tú mismo tu opinion sobre ella, Haz login en el panel de la izquierda</p>
						</article>";
				}
			} else
				header ("Location: ./notificacion.php?noti=not_found");
		}
		
		
		
		
		
		
		
		
		
		
		//funcion para construir la tabla con informacion de un usuario
		public static function construyeUsuario($con) {
			
			//Hacemos las consultas a la base de datos
			$sql="SELECT * FROM usuario WHERE username='{$_SESSION["user"]}'";
			$result = mysql_query($sql, $con);
			
			$sql2="SELECT COUNT(id) FROM comentario WHERE usuario='{$_SESSION["user"]}'";
			$result2 = mysql_query($sql2, $con);
			
			//nos quedamos los datos
			$row = mysql_fetch_array($result);
			
			$num_comentarios = mysql_result($result2, 0);
			
			
			//Antes de montar la tabla comprobamos la imagen del avatar del usuario
			$imagen = "./data/usuarios/{$_SESSION["user"]}.jpg";
			if ( ! file_exists($imagen))
				$imagen = "./images/default_avatar.jpg";
			
			
			//Montamos la tabla
			echo "
				<table id='tabla_perfil'>
				<caption>Datos del usuario</caption>
					<tr>
						<td rowspan='3'><img id='avatar' src='{$imagen}' alt=''/></td>
						<th class='th_perfil'>
							Nick:
						</th>
						<td class='td_perfil'>
							{$row[0]}
						</td>
					</tr>
					<tr>
						<th class='th_perfil'>
							Mail:
						</th>
						<td class='td_perfil'>
							{$row[2]}
						</td>
					</tr>
					<tr>
						<th class='th_perfil'>
							Número de comentarios:
						</th>
						<td class='td_perfil'>
							{$num_comentarios}
						</td>
					</tr>
				</table>";
		}
		
		// Con esta función nos aseguramos de que una pelicula siempre tenga portada cuando sea publicada.
		// Lo que se hace es: si la peli es subida por un usuario y sube una foto, la portada se pone en una carpeta 
		// distinta llamada 'pendientes'. Luego, si finalmente se publica, si hay portada la mostramos y si no, 
		// mostramos una imagen por defecto de 'portada no disponible'.
		public static function gestionaFotosPeli($id) {
		
			$imagen = "./data/peliculas/pendientes/{$id}.jpg";
			if ( ! file_exists($imagen)) { //Si no esta en pendientes
				$imagen = "./data/peliculas/{$id}.jpg"; //la buscamos en peliculas
				if ( ! file_exists($imagen)) //y si tampoco esta
					$imagen = "./images/default_cover.jpg"; //ponemos una por defecto
			} else { //si estaba en pendientes
				rename("./data/peliculas/pendientes/{$id}.jpg", "./data/peliculas/{$id}.jpg"); //la movemos a peliculas
				$imagen = "./data/peliculas/{$id}.jpg";
			}
			return $imagen;
		}
	
	
	
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ 
	//~~~~~~~~~~~~~~~~~~~~~FUNCIONES PRIVADAS~~~~~~~~~~~~~~~~~~~
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
		//Funcion que pinta la cabecera de la tabla del directorio de peliculas
		private static function pintaCabeceraDirectorio() {
				echo "
					<tr>
						<th class='th_dir'>
							Titulo
						</th>
						<th class='th_dir'>
							Puntuación cinéfila
						</th>
					</tr>";
		}
		
		//Funcion que pinta una fila de la tabla del directorio de peliculas
		private static function pintaFilaDirectorio($result, $i) {
			//nos quedamos los datos
			$id = mysql_result($result, $i, 0);
			$titulo = mysql_result($result, $i, 1);
			$puntuacion = mysql_result($result, $i, 8);
			
			//Montamos la fila de cada pelicula
			echo	"<tr>
						<td class='td_dir'>
							<a href='". htmlspecialchars("pelicula.php?id={$id}&title=" . urlencode($titulo)) . "'>" . htmlspecialchars($titulo) . "</a>
						</td>
						<td class='td_dir'>" . 
							htmlspecialchars($puntuacion) . 
						"</td>
					</tr>";
		}
		
		//Funcion que pinta una fila de la tabla de informacion de una pelicula
		private static function pintaFilaPelicula($campo, $valor) {
			echo "
				<tr>
					<th class='th_peli'>" . 
						htmlspecialchars($campo) . 
					"</th>
					<td class='td_peli'>" . 
						htmlspecialchars($valor) . 
					"</td>
				</tr>";
		}
		
		//Funcion que pinta la tabla de informacion de una pelicula, a partir de la funcion anterior
		private static function pintaTablaPeli($row) {
			echo "
				<article>
					<table>";
			echo "<caption>Ficha de la película</caption>";		
						HTMLCreator::pintaFilaPelicula("Título", $row[1]);
						HTMLCreator::pintaFilaPelicula("Año", $row[2]);
						HTMLCreator::pintaFilaPelicula("Duración", $row[3] . " min");
						HTMLCreator::pintaFilaPelicula("Director", $row[4]);
						HTMLCreator::pintaFilaPelicula("Reparto", $row[5]);
						HTMLCreator::pintaFilaPelicula("Género", $row[6]);
						HTMLCreator::pintaFilaPelicula("Sinopsis", $row[7]);
						HTMLCreator::pintaFilaPelicula("Puntuación cinéfila", $row[8]);
			echo "
					</table>
				</article>";
		}
		
		//funcion que pinta un comentario de un usuario en una pelicula
		private static function pintaComentario($result, $i) {
			//nos quedamos los datos
			$usuario = mysql_result($result, $i, 1);
			$fecha = mysql_result($result, $i, 3);
			$contenido = mysql_result($result, $i, 4);
			
			//preparamos la imagen
			$imagen = "./data/usuarios/{$usuario}.jpg";
			if ( ! file_exists($imagen))
				$imagen = "./images/default_avatar.jpg";
			
			//lo mostramos en pantalla
			echo "
				<article class='comment_global'>
					<img class='avatar_comment' src='{$imagen}' alt=''/>
					<p class='comment'>" . htmlspecialchars($contenido) . "</p>
					<p class='comment_by'>Publicado por " . htmlspecialchars($usuario) . " el " . htmlspecialchars($fecha) . "</p>
				</article>";
		}
		
		//funcion que pinta el textarea que aparece en la pagina de una pelicula para dejar un comentario
		private static function pintaTextAreaParaComentar($pelicula, $id) {
			echo "
				<article id='comment_invite' class='last'>
					<h1>¿La has visto? ¡Deja un comentario sobre la peli!</h1>
					<hr>
					<p>Deja tu opinión para el resto de usuarios en el siguiente espacio:</p>
					<form action='./php/add_comment.php' method='post'>
						<label for='opinion'>Comentario:</label>
						<textarea id='opinion' name='comentario' cols='90' rows='10'></textarea>
						<input type='hidden' name='pelicula' value='" . urlencode($pelicula) . "'/>
						<input type='hidden' name='id_pelicula' value='" . $id . "'/>
						<br>
						<button>Comentar</button>
					</form>
				</article>";
		}
	}
?>
