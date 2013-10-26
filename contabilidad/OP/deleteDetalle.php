<?php
	session_start();
	
	include_once('../DB/DB.php');
	
	deleteDetalleRegistro( $_GET['id']);

	header('Location: ../buscar.php');
?>