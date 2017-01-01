<?php 
	require_once("./inc/cabecera.inc.php");
?>

	<!-- content -->
	<div class="wrapper row2">
	  <div id="container" class="clear">
		<?php 
			require_once("./inc/lateral.inc.php");
		?>

		<!-- main content -->
		<div id="content">
			<article class="last">
				<?php 
					if (isset($_GET["noti"]))
						$notificacion = $_GET["noti"];
						
					if ($notificacion == 'error_connect')
						echo "<h1>¡¡¡ERROR!!! Se produjo un fallo al conectar con la base de datos.</h1><br><h2>Por favor vuelve a intentar la operación</h2>";
					if ($notificacion == 'wrong_pass')
						echo "<h1>Vaya... parece que 'dedos rápidos' ha metido la pata...</h1><br><h2>Prueba de nuevo y esta vez pon bien la contraseña  ;-)</h2>";
					if ($notificacion == 'wrong_user')
						echo "<h1>Uyuyuyuyuy... Ese nombre de usuario no esta registrado...</h1><br><h2>Si quieres, puedes <a href='registro.php'>registrarlo</a></h2>";
					if ($notificacion == 'wrong_reg') {
						if (isset ($_GET["lost"])) {
							$campo = $_GET["lost"];
							if ($campo == 'username')
								echo "<h1>Te has dejado algún campo vacío en el formulario de registro. </h1><br><h2>Parece que ha sido el nick.<a href='registro.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'pass')
								echo "<h1>Te has dejado algún campo vacío en el formulario de registro. </h1><br><h2>Parece que ha sido el password.<a href='registro.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'pass_2')
								echo "<h1>Te has dejado algún campo vacío en el formulario de registro. </h1><br><h2>Parece que ha sido la repetición del password <a href='registro.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'mail')
								echo "<h1>Te has dejado algún campo vacío en el formulario de registro. </h1><br><h2>Parece que ha sido el correo electrónico.<a href='registro.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
						} else {
							if (isset ($_GET["bad"])) {
								$campo = $_GET["bad"];
								if ($campo == 'pass_2')
									echo "<h1>Te has equivocado al repetir la contraseña. </h1><br><h2><a href='registro.php'>Inténtalo de nuevo</a> a ver si hay más suerte</h2>";
								if ($campo == 'mail')
									echo "<h1>El e-mail introducido no tiene un formato válido</h1><br><h2>Por favor, ten cuidado e <a href='registro.php'>Inténtalo de nuevo</a></h2>";
							} else
								echo "<h1>Parece que alguien te ha tomado la delantera y ya hay un usuario registrado con ese nombre.</h1><br><h2><a href='registro.php'>Inténtalo de nuevo</a> y prueba con otro a ver si hay mas suerte.</h2>";
						}
					}
					if ($notificacion == 'wrong_data') {
						if (isset ($_GET["lost"])) {
							$campo = $_GET["lost"];
							if ($campo == 'title')
								echo "<h1>Te has dejado algún campo vacío en el formulario para añadir una nueva peli. </h1><br><h2>Parece que ha sido el titulo.<a href='colabora.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'year')
								echo "<h1>Te has dejado algún campo vacío en el formulario para añadir una nueva peli. </h1><br><h2>Parece que ha sido el año.<a href='colabora.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'duration')
								echo "<h1>Te has dejado algún campo vacío en el formulario para añadir una nueva peli. </h1><br><h2>Parece que ha sido la duración <a href='colabora.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'director')
								echo "<h1>Te has dejado algún campo vacío en el formulario para añadir una nueva peli. </h1><br><h2>Parece que ha sido el director.<a href='colabora.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'cast')
								echo "<h1>Te has dejado algún campo vacío en el formulario para añadir una nueva peli. </h1><br><h2>Parece que ha sido el director.<a href='colabora.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'genre')
								echo "<h1>Te has dejado algún campo vacío en el formulario para añadir una nueva peli. </h1><br><h2>Parece que ha sido el director.<a href='colabora.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
							if ($campo == 'sinopsis')
								echo "<h1>Te has dejado algún campo vacío en el formulario para añadir una nueva peli. </h1><br><h2>Parece que ha sido el director.<a href='colabora.php'>Inténtalo de nuevo</a> y esta vez, rellénalo</h2>";
						} else {
							if (isset ($_GET["bad"])) {
								$campo = $_GET["bad"];
								if ($campo == 'duration')
									echo "<h1>Te has equivocado al introducir la duracion de la peli. </h1><br><h2><a href='colabora.php'>Inténtalo de nuevo</a> y asegúrate de que lo que introduces es un número entero entre 45 y 240 (minutos)</h2>";
								if ($campo == 'year')
									echo "<h1>Te has equivocado al introducir el año de la peli. </h1><br><h2><a href='colabora.php'>Inténtalo de nuevo</a> y asegúrate de que lo que introduces es un número entero entre 1915 y 2015</h2>";
							} else
								echo "<h1>Parece que alguien te ha tomado la delantera y ya hay una pelicula registrada con ese nombre.</h1><br><h2><a href='colabora.php'>Inténtalo de nuevo</a> y prueba con otra a ver si hay mas suerte.</h2>";
						}
					}
					if ($notificacion == 'ok_reg')
						echo "<h1>Sabía que caerías...  ¡Parece que te has registrado con éxito!</h1><br><h2>Ahora ya puedes loguearte y disfrutar de las ventajas de ser usuario registrado</h2>";
					if ($notificacion == 'ok_new_movie')
						echo "<h1>Tu peli se ha enviado </h1><br><h2>Los administradores del sitio deliberarán sobre la peli que has enviado, y si lo consideran oportuno, puntuarán y publicarán tu envío.</h2>";
					if ($notificacion == 'wrong_query')
						echo "<h1>Ooooops! Hemos tenido un problemilla al consultar nuestra base de datos. </h1><br><h2>Por favor, prueba otra vez.</h2>";
					if ($notificacion == 'pass_changed')
						echo "<h1>Hemos cambiado tu contraseña</h1><br><h2>¡Recuerdala bien!</h2>";
					if ($notificacion == 'mail_changed')
						echo "<h1>Hemos cambiado tu mail</h1><br><h2>Puedes ver el cambio en tu perfil</h2>";
					if ($notificacion == 'no_result')
						echo "<h1>No encontramos peliculas con la busqueda introducida</h1><br><h2>Prueba con otra cosa o bucea en nuestro <a href='directorio.php'>directorio de peliculas</a></h2>";
					if ($notificacion == 'not_found')
						echo "<h1>Esta pelicula no existe. </h1><br><h2>Prueba con otra, o bucea en nuestro <a href='directorio.php'>directorio de peliculas</a></h2>";
				?>
			</article>
		</div>
		<!-- / content body -->
	  </div>
	</div>

<?php 
	require_once("./inc/pie.inc.php");
?>
