<?php 
require_once("./php/comun.php");

if (!isset($_SESSION["user"])) {
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
				<article>
					<h1> Introduce tus datos a continuación:</h1>
					<br>
					<form method="post" action="./php/add_user.php">
						<label for="username">Nick: </label>
						<br>
						<input id="username" class=":required" type="text" name="user" size="35" maxlength="16">
						<br>
						<br>
						<label for="pass">Contraseña: </label>
						<br>
						<input id="pass" class=":required" type="password" name="pass" size="35">
						<br>
						<br>
						<label for="pass2">Repite la Contraseña: </label>
						<br>
						<input id="pass2" class=":same_as;pass" type="password" name="pass2" size="35">
						<br>
						<br>
						<label for="mail">Correo electrónico: </label>
						<br>
						<input id="mail" class=":email :required" type="text" name="email" size="35">
						<br>
						<br>
						<button>
							Registrar
						</button>
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
