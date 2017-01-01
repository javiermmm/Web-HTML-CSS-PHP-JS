<?php
	require_once("./php/db_connect.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cinefilando</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/layout.css" type="text/css">
	
	<!--
		Validacion de formularios con vanadiumJS
	-->
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="./js/vanadium_es.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/vanadium.css">
</head>


<body>
	<div class="wrapper row1">
	  <header id="header" class="clear">

		  <h1><a href="index.php">Cinefilando</a></h1>
		  <h2>Tu web de cine</h2>
		
		<nav>
		  <ul>
			<li><a href="index.php">Home</a></li>
			<?php
				if ( (isset ($_SESSION['rol'])) && ($_SESSION['rol'] == "colaborador"))
					echo "<li><a href='colabora.php'>Colabora</a></li>";
			?>
			<li><a href="directorio.php">Peliculas</a></li>
			<li><a href="contacto.php">Contacto</a></li>
			<li class="last"><a href="acerca.php">Acerca de</a></li>
		  </ul>
		</nav>
	  </header>
	  <hr>
	</div>
