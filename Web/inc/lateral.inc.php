<?php 
	require_once("./php/funciones.php");
?>

<!-- content body -->
<aside id="left_column">
	<h2 class="title">Inicio de sesión</h2>
	<nav>
		<?php 
			HTMLCreator::construyeLogin();
		?>
	</nav>
	<h2 class="title">Busca una peli</h2>
	<nav>
		<form id="busqueda" method="post" action="directorio.php">
			<fieldset>
				<legend>Búsqueda</legend>
					<label for='search'>Buscar</label>
					<input type="text" id="search" name="search"/>
					<button>
						Buscar
					</button>
			</fieldset>
		</form>
	</nav>
	<h2 class="title">Categorías</h2>
	<nav>
		<ul class="lista_lateral">
			<li><a href="./directorio.php?genero=comedia">Comedia</a></li>
			<li><a href="./directorio.php?genero=drama">Drama</a></li>
			<li><a href="./directorio.php?genero=accion">Acción</a></li>
			<li><a href="./directorio.php?genero=thriller">Thriller</a></li>
			<li class="last"><a href="./directorio.php?genero=ciencia-ficcion">Ciencia-Ficción</a></li>
		</ul>
	</nav>
</aside>
