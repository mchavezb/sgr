<?php
	//session_start();
	
	include_once('../DB/DB.php');

	//$_SESSION['operacion'] = $_POST['operacion'];
	
	$query = insertRegistro( $_POST["operacion"], $_POST["turno"] );
	
	header('Location: ../registro.php');
?>