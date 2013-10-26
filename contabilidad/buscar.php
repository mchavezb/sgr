<?php
	session_start();
	include_once('DB/DB.php');
	
	if($_POST['fecha'] != null){
		$detalles = findDetalleRegistroMonetario( $_POST['fecha']);
		$_SESSION['fecha'] = $_POST['fecha'];
	}
	
	if(isset($_SESSION['fecha'])){
		$detalles = findDetalleRegistroMonetario( $_SESSION['fecha']);
	}
	else{
		$detalles = findDetalleRegistroMonetario( $_POST['fecha']);
		$_SESSION['fecha'] = $_POST['fecha'];
		echo $_POST['fecha'];
	}
	
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
		<h2>Detalle Registro Diario</h2>
		<hr>
		</br>
		<?php
			if ( count( $detalles) > 0 ){ 
				$i = 1;
		?>
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Cantidad</th>
					<th>Denominacion</th>
					<th>Total</th>
					<th>Moneda</th>
					<th>Tipo Registro</th>
					<th>Turno</th>
					<th colspan="2">Acción</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach( $detalles as $item ){ ?>
				<tr>
					<td><?php echo $i++  ?></td>
					<td><?php echo $item['cantidad'] ?></td>
					<td><?php echo $item['denominacion'] ?></td>
					<td><?php echo $item['total'] ?></td>
					<td><?php echo $item['moneda'] ?></td>
					<td><?php echo $item['tiporegistro'] ?></td>
					<td><?php echo $item['turno'] ?></td>
					<td><a type="button" href="modificarDetalle.php?id=<?php echo $item['id'] ?>">Modificar</a></td>
					<td><a type="button" href="OP/deleteDetalle.php?id=<?php echo $item['id'] ?>">Eliminar</a></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<?php } ?>
		
		
		

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
