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
			<article>
				<form method="post" action="mailto:tucorreo@correo.com">
					<label for="nick">Nick: </label>
					<br>
					<input id="nick" type="text" size="35"/>
					<br>
					<br>
					<label for="mail">Correo: </label>
					<br>
					<input id="mail" type="text" size="35"/>
					<br>
					<br>
					<label for="question">Consulta: </label>
					<br>
					<textarea id="question" cols="27"></textarea>
					<br>
					<button>
						Enviar
					</button>
				</form>
			</article>
		</div>
		<!-- / content body -->
	  </div>
	</div>

<?php 
	require_once("./inc/pie.inc.php");
?>
