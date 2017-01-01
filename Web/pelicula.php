<?php 
	require_once("./inc/cabecera.inc.php");
	
	if (isset($_GET["id"]))
		$id = $_GET["id"];
?>
	
	<!-- content -->
	<div class="wrapper row2">
		<div id="container" class="clear">
			<?php 
				require_once("./inc/lateral.inc.php");
				
				//Antes de montar la tabla comprobamos la imagen de la portada de la peli 
				//y si estaba pendiente y ya esta publicada la movemos
				$imagen = HTMLCreator::gestionaFotosPeli($id);
			?>
		
			<aside id="right_column">
					<img id="portada" src="<?php echo $imagen;?>" alt=""/>
			</aside>

			<!-- main content -->
			<div id="content_film">
				<?php 
					HTMLCreator::construyePelicula($con, $id);
				?>
			</div>
			<!-- / content body -->
		</div>
	</div>

<?php 
	require_once("./inc/pie.inc.php");
?>
