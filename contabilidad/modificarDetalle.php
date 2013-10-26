<?php
	session_start();
	
	include_once('DB/DB.php');

	
	$detalle = findDetalleRegistroMonetarioById( $_GET['id']);

	$denominacion = findDenominacion();
	$tipos = findTipos();
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
		<h2>Detalle (Modificar)</h2>
		<hr>
		</br>
		<form action="OP/updateDetalle.php?id=<?php echo $_GET['id']; ?>" method="POST">
		<p>Cantidad:</p>
		<input type="text" name="cantidad" value="<?php echo $detalle['cantidad']; ?>"></br></br>
		<p>Valor:</p>
		<select name="denominacion">
			<option value="<?php echo $detalle['idDenominacion'];?>"><?php echo $detalle['denominacion'] ?></option>
			<?php foreach( $denominacion as $item ){ ?>
				<option value="<?php echo $item['denominacion'];?>"><?php echo $item['valor']; ?></option>
			<?php } ?>
		</select></br></br>
		<p>Tipo</p>
		<select name="tipo">
			<option value="<?php echo $detalle['idTipomoneda'];?>"><?php echo $detalle['moneda'] ?></option>
			<?php foreach( $tipos as $item ){ ?>
				<option value="<?php echo $item['tipo'];?>"><?php echo $item['descripcion'] ?></option>
			<?php } ?>
		</select></br></br>
		<button type="submit">Guardar</button>
		</form>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
