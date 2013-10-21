<?php
	session_start();
	
	include_once('../DB/DB.php');
	
	$_SESSION['cambio'] = $_POST['cambio'];
	
	// SELECCIONAR EL VALOR DE LA DENOMINACION (0.1, 5, 10)
	$denominacion = mysql_query("SELECT valor FROM denominacion WHERE idDenominacion = ".$_POST['denominacion']."");
	$valor = mysql_fetch_assoc($denominacion);
	
	$total = $valor['valor'] * $_POST['cantidad'];
	
	insertDetalleRegistro( $_POST['cantidad'], $total, $_POST['denominacion'], $_POST['tipo'], $_GET['registro']);

	header('Location: ../registro.php');
?>