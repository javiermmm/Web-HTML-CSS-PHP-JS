<?php
	require_once("./comun.php");
	
	session_destroy();
	
	header ("Location: " . $_SERVER['HTTP_REFERER']);
?>
