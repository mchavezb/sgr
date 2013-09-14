<?php
	include_once('../DB/platoDB.php');


	$result = Platos::insert( $_POST['nombre'] , $_POST['estado'], $_POST['tiempo'], $_POST['precio'] );


	header('Location: http://sgr.host56.com/administracion/platos.php');
?>