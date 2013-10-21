<?php
    session_start();
	
	include_once('DB/DB.php');	
	
	// TIPO DE CAMBIO DEL DOLAR
	if(isset($_SESSION['cambio'])){
		$cambio = $_SESSION['cambio'];
	}
	
	// ARRAY DE TIPOS DE MONEDA PARA SELECT
	$tipos = findTipos();
	
	// ARRAY DE DENOMINACION (0.1, 0.2, 5) PARA SELECT
	$denominacion = findDenominacion();
	
	// SELECCIONAR EL ULTIMO REGISTRO INGRESADO PARA PODER INGRESAR SUS DETALLES
	$rs = mysql_query("SELECT MAX(idRegistroMonetario) AS id FROM registromonetario");
	if ($row = mysql_fetch_row($rs)) {
		$ids = trim($row[0]);
	}
	
	// SUMA TODOS LOS MONTOS DE SOLES DEL ULTIMO REGISTRO MONETARIO
	$soles = mysql_query("SELECT SUM(total) AS total FROM detalleregistromonetario WHERE RegistroMonetario_idRegistroMonetario = '$ids' AND TipoMoneda_idTipoMoneda = 1");
	$sol = mysql_fetch_assoc($soles);
	
	// SUMA TODOS LOS MONTOS DE DOLARES DEL ULTIMO REGISTRO MONETARIO
	$dolares = mysql_query("SELECT SUM(total) AS total FROM detalleregistromonetario WHERE RegistroMonetario_idRegistroMonetario = '$ids' AND TipoMoneda_idTipoMoneda = 2");
	$dolar = mysql_fetch_assoc($dolares);

	// SUMA LOS MONTOS DE SOLES Y DOLARES AL CAMBIO
	$total = $sol['total'] + ($dolar['total']*$cambio);

	// ACTUALIZAR EL TOTAL DEL ULTIMO REGISTRO MONETARIO
	updateRegistroTotal( $total, $ids );	
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
	
	
		<h1>Caja</h1>
		<hr>
			<form action="OP/detalleInsert.php?registro= <?php echo $ids; ?>" method="post">
				<table class="table" style="width:600px;">
					<thead>
						<tr>
							<th>Monto</th>
							<th>Valor</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<select name="tipo">
								<?php foreach( $tipos as $item ){ ?>
										<option value="<?php echo $item['tipo'];?>"><?php echo $item['descripcion'] ?></option>
								<?php } ?>
								</select>
							</td>
							<td>
								<select name="denominacion">
								<?php foreach( $denominacion as $item ){ ?>
										<option value="<?php echo $item['denominacion'];?>"><?php echo $item['valor'] ?></option>
								<?php } ?>
								</select>
							</td>
							<td><input type="text" name="cantidad"></td>
							<td><button>Guardar</button></td>
						</tr>
						<tr>
							<td colspan="2">Monto de Caja en Soles:</td>
							<td colspan="2"><?php echo $sol['total']; ?></td>
						</tr>
						<tr>
							<td colspan="2">Monto de Caja en Dolares:</td>
							<td colspan="2"><?php echo $dolar['total']; ?></td>
						</tr>
					</tbody>
				</table>
				<p>Tipo de Cambio:</p>
				<label>S/.</label><input type="text" name="cambio" value="<?php echo $cambio; ?>">
			</form>
		<hr>
		
		<h2>Total: S/. <?php echo $total; ?></h2>


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
