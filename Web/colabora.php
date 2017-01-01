<?php 
require_once("./php/comun.php");

if (  (isset($_SESSION["rol"])) && ($_SESSION["rol"] == "colaborador")  ) {
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
					<h1> ¡Ayúdanos a contagiar nuestra pasión cinéfila!</h1>
					<br>
					<p>Desde cinefilando agradecemos tu iniciativa para ayudarnos a hacer crecer nuestra base de datos de peliculas, y esperamos que tu colaboración con nosotros sea larga y fructífera. </p>
					<p>Para empezar a colaborar, sólo tienes que rellenar el siguiente formulario con los datos de la película. Por favor, trata de seguir la línea de las películas con las que ya contamos en la web:</p>
					<br>
					<form id="form_peli" method="post" action="./php/add_movie.php" enctype='multipart/form-data'>
						<label for="titulo">Titulo: </label>
						<br>
						<input id="titulo" class=":required" type="text" name="titulo" size="35" maxlength="50">
						<br>
						<br>
						<label for="anyo">Año: </label>
						<br>
						<input id="anyo" class=":required :integer" type="text" name="anyo" size="35" maxlength="4">
						<br>
						<br>
						<label for="duracion">Duración: </label>
						<br>
						<input id="duracion" class=":required :integer" type="text" name="duracion" size="35" maxlength="3">
						<br>
						<br>
						<label for="director">Director: </label>
						<br>
						<input id="director" class=":required" type="text" name="director" size="35" maxlength="50">
						<br>
						<br>
						<label for='reparto'>Reparto: </label>
						<br>
						<textarea id='reparto' name='reparto' class=":required" cols='35' rows='5' maxlength="600"></textarea>
						<br>
						<br>
						<label for='genre'>Género: </label>
						<br>
						<select id='genre' name="genero">
							<option value="comedia">Comedia</option>
							<option value="drama">Drama</option>
							<option value="accion">Acción</option>
							<option value="thriller">Thriller</option>
							<option value="ciencia-ficcion">Ciencia-Ficción</option>
						</select>
						<br>
						<br>
						<label for='argu'>Sinopsis: </label>
						<br>
						<textarea id='argu' name='sinopsis' class=":required" cols='35' rows='5' maxlength="800"></textarea>
						<br>
						<br>
						<label for="portada_file">Opcionalmente, puedes subir la portada de la peli:</label>
						<br>
						<input id="portada_file" type="file" name="portada">
						<br>
						<br>
						<button class='enviaImagen' name='enviar'>
							Mandar Pelicula
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
