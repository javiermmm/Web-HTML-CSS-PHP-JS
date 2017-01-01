<?php 
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
			<article class="last">
				<?php
					if (isset($_GET["genero"])) {
						$genero = $_GET["genero"];
						HTMLCreator::construyeDirectorioPorGenero($con, $genero);
					} 
					else
						if (isset($_POST["search"])){
							$busqueda = $_POST["search"];
							HTMLCreator::construyeDirectorioBusqueda($con, $busqueda);
						}
						else
							HTMLCreator::construyeDirectorio($con);
				?>
			</article>
		</div>
		<!-- / content body -->
	  </div>
	</div>

<?php 
	require_once("./inc/pie.inc.php");
?>
