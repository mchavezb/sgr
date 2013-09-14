<?php
	include_once('../DB/mesaDB.php');
	
	if( $_POST['estado'] == '' )
	{
		$estado = 'libre';
	}

	$result = Mesas::update(  $_POST['id'] , $_POST['numero'] , $estado , $_POST['capacidad'] );

	header('Location: http://sgr.host56.com/administracion/mesas.php');
?>