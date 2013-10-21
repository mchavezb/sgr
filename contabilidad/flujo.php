<?php
    include_once('DB/DB.php');

	// BUSCAR PLATOS PAGADOS PARA PONERLOS EN LA TABLA
    $comanda = findPlatos();
	
	// SELECCIONAR MONTO TOTAL DE EFECTIVO DE INGRESOS
	$efectivo = mysql_query("SELECT SUM(total) AS efectivo FROM pago WHERE MedioPago_idMedioPago = 1");
	$efect = mysql_fetch_assoc($efectivo);
	
	// SELECCIONAR MONTO TOTAL DE TARJETAS DE INGRESOS
	$tarjetas = mysql_query("SELECT SUM(total) AS tarjetas FROM pago WHERE MedioPago_idMedioPago = 2");
	$tarj = mysql_fetch_assoc($tarjetas);
	
	// SELECCIONAR MONTO TOTAL DE INGRESOS
	$total = mysql_query("SELECT SUM(total) AS total FROM pago");
	$tot = mysql_fetch_assoc($total);

	// SELECCIONAR SALDO INICIAL DE LA APERTURA DEL DIA
	$inicial = mysql_query("SELECT total FROM registromonetario WHERE TipoRegistro_idTipoRegistro = 1 AND fecha = CURRENT_DATE");
	$ini = mysql_fetch_assoc($inicial);
	
	//CALCULAR EL SALDO FINAL DE CAJA
	$final = $tot['total'] + $ini['total'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>SGR</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <script src="../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
	
	
		<h1>Flujo de Efectivo</h1>
		<hr>
		<?php
			if ( count( $comanda) > 0 ){ 
				$i = 1;
		?>
			<table class="table" style="width:600px;">
				<thead>
					<tr>
						<th>#</th>
						<th>Comanda</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Cantidad</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $comanda as $item ){ ?>
						<tr>
							<td><?php echo $i++  ?></td>
							<td><?php echo $item['comanda'] ?></td>
							<td><?php echo $item['nombre'] ?></td>
							<td><?php echo $item['precio'] ?></td>
							<td><?php echo $item['cantidad'] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } ?> 
		<hr>
		<h2>Ingresos</h2>

			<table class="table">
				<thead>
					<tr>
						<th>Efectivo</th>
						<th>Tarjetas</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $efect['efectivo'] ?></td>
						<td><?php echo $tarj['tarjetas'] ?></td>
						<td><?php echo $tot['total'] ?></td>
					</tr>
				</tbody>
			</table>
		
		<table class="table">
			<thead>
				<tr>
					<th>Saldo Inicial</th>
					<th>Saldo Final</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td><?php echo $ini['total']; ?></td>
					<td><?php echo $final; ?></td>
				</tr>
			</tbody>
		</table>
		
		
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
