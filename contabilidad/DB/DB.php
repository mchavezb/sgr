<?php
	// CONEXION A BASE DE DATOS
	mysql_connect( 'localhost' , 'root' , 'root' );
	mysql_query("SET NAMES 'utf8'");
	mysql_select_db( 'sgrv5' );	

	
	//INSERTAR NUEVO REGISTRO MONETARIO (OP/registroInsert.php)
	function insertRegistro( $id, $turno )
	{	
		$query = "INSERT INTO registromonetario VALUES( null , CURRENT_DATE, CURRENT_TIME, 0, 1, '$id', '$turno')";
			
		$result = mysql_query( $query );

		if( $result )
			return true;
		else
			return false;
	}
	
	//BUSCAR TIPOS DE MONEDAS PARA PONER EN EL SELECT (registro.php)
	function findTipos()
	{
		$lista = array();
			
		$query = "SELECT idTipoMoneda AS tipo, descripcion FROM tipomoneda";

		$result = mysql_query( $query );

		while( $row = mysql_fetch_assoc($result) )
		{
			$lista[] = $row;
		}
		
		return $lista;
	}
	
	//BUSCAR DENOMINACION PARA PONER EN EL SELECT (registro.php)
	function findDenominacion()
	{
		$lista = array();
			
		$query = "SELECT idDenominacion AS denominacion, valor FROM denominacion";

		$result = mysql_query( $query );

		while( $row = mysql_fetch_assoc($result) )
		{
			$lista[] = $row;
		}
			
		return $lista;
	}	
		
	//INSERTAR UN DETALLE DE UN REGISTRO MONETARIO (OP/detalleInsert.php)
	function insertDetalleRegistro( $cantidad, $total, $valor, $tipo, $registro )
	{			
		$result = mysql_query( "INSERT INTO detalleregistromonetario VALUES( null , '$cantidad', '$total', '$valor', '$tipo', '$registro')" );

		if( $result )
			return true;
		else
			return false;
	}
	
	//ACTUALIZAR EL MONTO TOTAL DEL ULTIMO REGISTRO MONETARIO (registro.php)
	function updateRegistroTotal( $total, $registro )
	{			
		$result = mysql_query( "UPDATE registromonetario SET total = '$total' WHERE idRegistroMonetario = '$registro'" );

		if( $result )
			return true;
		else
			return false;
	}
	
	// BUSCAR PLATOS PAGADOS EN LA TABLA PAGOS (flujo.php)
	function findPlatos()
	{
		$lista = array();
		
		$query = "SELECT comanda.idComanda AS comanda, producto.p_nombre AS nombre, producto.p_costo AS precio, comandaxpedido.cantidad AS cantidad 
		FROM pago JOIN comanda JOIN comandaxpedido JOIN producto ON pago.Comanda_idComanda = comanda.idComanda AND comanda.idComanda = comandaxpedido.Comanda_idComanda AND 
		producto.idProducto = comandaxpedido.Producto_idProducto WHERE comandaxpedido.EstadoPedido_idEstadoPedido = 3";

		$result = mysql_query( $query );

		while( $row = mysql_fetch_assoc($result) )
		{
			$lista[] = $row;
		}
		
		return $lista;
	}
	
	// BUSCAR EL DETALLE DEL ULTIMO REGISTRO MONETARIO QUE SEA DE TIPO APERTURA
	function findDetalleRegistroApertura( $registro, $turno )
	{
		$lista = array();
		
		$query = "SELECT detalleregistromonetario.cantidad AS cantidad, denominacion.valor AS denominacion, 
		detalleregistromonetario.total AS total, tipomoneda.descripcion AS moneda FROM detalleregistromonetario JOIN denominacion JOIN registromonetario 
		JOIN tipomoneda ON detalleregistromonetario.Denominacion_idDenominacion = denominacion.idDenominacion AND 
		detalleregistromonetario.RegistroMonetario_idRegistroMonetario = registromonetario.idRegistroMonetario AND
		detalleregistromonetario.TipoMoneda_idTipoMoneda = tipomoneda.idTipoMoneda WHERE registromonetario.TipoRegistro_idTipoRegistro = 1 
		AND registromonetario.idRegistroMonetario = '$registro' AND registromonetario.turno = '$turno'";

		$result = mysql_query( $query );

		while( $row = mysql_fetch_assoc($result) )
		{
			$lista[] = $row;
		}

		return $lista;
	}
	
	// BUSCAR EL DETALLE DEL ULTIMO REGISTRO MONETARIO QUE SEA DE TIPO CIERRE
	function findDetalleRegistroCierre( $registro, $turno )
	{
		$lista = array();
	
		$query = "SELECT detalleregistromonetario.cantidad AS cantidad, denominacion.valor AS denominacion, 
		detalleregistromonetario.total AS total, tipomoneda.descripcion AS moneda FROM detalleregistromonetario JOIN denominacion JOIN registromonetario JOIN tipomoneda
		ON detalleregistromonetario.Denominacion_idDenominacion = denominacion.idDenominacion AND 
		detalleregistromonetario.RegistroMonetario_idRegistroMonetario = registromonetario.idRegistroMonetario AND
		detalleregistromonetario.TipoMoneda_idTipoMoneda = tipomoneda.idTipoMoneda WHERE registromonetario.TipoRegistro_idTipoRegistro = 2 
		AND registromonetario.idRegistroMonetario = '$registro' AND registromonetario.turno = '$turno'";

		$result = mysql_query( $query );

		while( $row = mysql_fetch_assoc($result) )
		{
			$lista[] = $row;
		}

		return $lista;
	}
?>