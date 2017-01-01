<?php 
require_once("./php/comun.php");

if (isset($_SESSION["user"])) {

	require_once("./inc/cabecera.inc.php");
	require_once("./php/funciones.php");
?>
	
	<!-- content -->
	<div class="wrapper row2">
	  <div id="container" class="clear">
		<?php 
			require_once("./inc/lateral.inc.php");
		?>

		<!-- main content -->
		<div id="content">
			<article>
				<h1>Resumen de tus datos:</h1>
				<?php 
					HTMLCreator::construyeUsuario($con);
				?>
			</article>
			<article>
				<h1>Cambia tu avatar</h1>
				<form method="post" action="./php/change_avatar.php?id=<?php echo $_SESSION['user']; ?>" enctype='multipart/form-data'>
					<fieldset>
						<legend>Elige tu nuevo avatar</legend>
						<label for="avatar_file">Sube una imagen nueva:</label>
						<br>
						<input id="avatar_file" type="file" name="avatar">
						<br>
						<br>
						<button class='enviaImagen' name='enviar'>
							Cambiar Imagen
						</button>
						<input name='limpiar' type='reset' value='Limpiar' />
					</fieldset>
				</form>
			</article>
			<article>
				<h1>Cambia tu password</h1>
				<form method="post" action="./php/change_pass.php">
					<fieldset>
						<legend>Modifica tu contraseña</legend>
						<label for="old_pass">Contraseña antigua: </label>
						<br>
						<input id="old_pass" class=":required" type="password" name="pass" size="20">
						<br>
						<br>
						<label for="new_pass">Contraseña nueva: </label>
						<br>
						<input id="new_pass" class=":required" type="password" name="new_pass" size="20">
						<br>
						<br>
						<label for="new_pass_2">Repite la contraseña nueva: </label>
						<br>
						<input id="new_pass_2" class=":required" type="password" name="new_pass_2" size="20">
						<br>
						<br>
						<button>
							Cambiar contraseña
						</button>
					</fieldset>
				</form>
			</article>
			<article>
				<h1>Cambia tu mail</h1>
				<form method="post" action="./php/change_mail.php">
					<fieldset>
						<legend>Modifica tu correo eléctrónico</legend>
						<label for="mail">Introduce tu nuevo mail:</label>
						<br>
						<input id="mail" class=":required :email" type="text" name="mail" size="20">
						<br>
						<br>
						<label for="pass">Introduce tu contraseña</label>
						<br>
						<input id="pass" class=":required" type="password" name="password" size="20">
						<br>
						<br>
						<button>
							Cambiar mail
						</button>
					</fieldset>
				</form>
			</article>
		</div>
		<!-- / content body -->
	  </div>
	</div>

<?php 
		require_once("./inc/pie.inc.php");
	}
	else
		header ("Location: ./index.php");
?>
