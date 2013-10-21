<?php
	include_once('DB/DB.php');
	
	// SELECCIONAR EL ULTIMO REGISTRO DE TIPO APERTURA 
	$maxap = mysql_query("SELECT MAX(idRegistroMonetario) AS registro FROM registromonetario WHERE TipoRegistro_idTipoRegistro = 1");
	$regap = mysql_fetch_assoc($maxap);

	// SELECCIONAR INFORMACION DE EL ULTIMO REGISTRO DE APERTURA
	$aper = mysql_query("SELECT idRegistroMonetario AS registro, turno, total FROM registromonetario WHERE idRegistroMonetario =".$regap['registro']."");
	$ape = mysql_fetch_assoc($aper);

	// SELECCIONAR EL ULTIMO REGISTRO DE TIPO CIERRE
	$maxci = mysql_query("SELECT MAX(idRegistroMonetario) AS registro FROM registromonetario WHERE TipoRegistro_idTipoRegistro = 2");
	$regci = mysql_fetch_assoc($maxci);

	// SELECCIONAR INFORMACION DE EL ULTIMO REGISTRO DE CIERRE
	$cier = mysql_query("SELECT idRegistroMonetario AS registro, turno, total FROM registromonetario WHERE idRegistroMonetario =".$regci['registro']."");
	$cie = mysql_fetch_assoc($cier);
	
	// BUSCAR DETALLE DEL ULTIMO REGISTRO DE TIPO APERTURA
	$apertura = findDetalleRegistroApertura( $ape['registro'], $ape['turno'] );
	
	// BUSCAR DETALLE DEL ULTIMO REGISTRO DE TIPO CIERRE
	$cierre = findDetalleRegistroCierre( $cie['registro'], $cie['turno'] );
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
	
	
		<h1>Arqueo de Caja</h1>
		<hr>
		<?php
			if ( count( $apertura) > 0 ){ 
				$i = 1;
		?>
		<p>Detalle de Apertura</p></br>
			<table class="table" style="width:600px;">
				<thead>
					<tr>
						<th>#</th>
						<th>Cantidad</th>
						<th>Denominacion</th>
						<th>Total</th>
						<th>Moneda</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $apertura as $item ){ ?>
						<tr>
							<td><?php echo $i++  ?></td>
							<td><?php echo $item['cantidad'] ?></td>
							<td><?php echo $item['denominacion'] ?></td>
							<td><?php echo $item['total'] ?></td>
							<td><?php echo $item['moneda'] ?></td>
						</tr>
					<?php } ?>
						<tr>
							<td colspan="2"></td>
							<td colspan="2">Total Apertura:</td>
							<td colspan="1"><?php echo $ape['total']; ?></td>
						</tr>
				</tbody>
			</table>
		<?php } ?>
		</br>
		<?php
			if ( count( $cierre) > 0 ){ 
				$i = 1;
		?>
		<p>Detalle de Cierre</p></br>
			<table class="table" style="width:600px;">
				<thead>
					<tr>
						<th>#</th>
						<th>Cantidad</th>
						<th>Denominacion</th>
						<th>Total</th>
						<th>Moneda</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $cierre as $item ){ ?>
						<tr>
							<td><?php echo $i++  ?></td>
							<td><?php echo $item['cantidad'] ?></td>
							<td><?php echo $item['denominacion'] ?></td>
							<td><?php echo $item['total'] ?></td>
							<td><?php echo $item['moneda'] ?></td>
						</tr>
					<?php } ?>
						<tr>
							<td colspan="2"></td>
							<td colspan="2">Total Cierre:</td>
							<td colspan="1"><?php echo $cie['total']; ?></td>
						</tr>
				</tbody>
			</table>
		<?php } ?> 
		<hr>

		
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
