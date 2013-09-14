<?php
    session_start();
	
    include_once('DB/mesaDB.php');

    if( isset( $_SESSION['mesas'] ) )
    {
        $array = $_SESSION['mesas'];
        unset( $_SESSION['mesas'] );
    }
    else
    {
		$mesas = new Mesas();
		$array = $mesas->findAll(); 
    }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SGR</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SGR</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">Panel de Control</li>
			  <li class="nav-header">Mesas</li>
              <li><a href="../mesas/index.php">Ver Mesas</a></li>
              <li class="nav-header">Ventas</li>
              <li><a href="../ventas/pedidos.php">Pedidos</a></li>
              <li><a href="../ventas/deliverys.php">Deliverys</a></li>
              <li><a href="../ventas/reservas.php">Reservas</a></li>
              <li class="nav-header">Contabilidad</li>
              <li><a href="../contabilidad/apertura.php">Apertura de Caja</a></li>
              <li><a href="../contabilidad/arqueo.php">Arqueo de Caja</a></li>
              <li><a href="../contabilidad/flujo.php">Flujo de Efectivo</a></li>
			  <li class="nav-header">Administracion</li>
              <li class="active"><a href="mesas.php">Mesas</a></li>
              <li><a href="platos.php">Platos</a></li>
              <li><a href="usuarios.php">Usuarios</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <h1>Mesas</h1>
		  <a href="registrarMesa.php" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Registrar</a>
		  <hr>
		  
          <div class="row-fluid">
			<?php if ( count( $array) > 0 ){ ?>
            <table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Mesa</th>
						<th>Capacidad</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $array as $item ){ ?>
					<tr>
						<td><?php echo $item['id'] ?></td>
						<td><?php echo $item['numero'] ?></td>
						<td><?php echo $item['capacidad'] ?></td>
						<td><a href="modificarMesa.php?id=<?php echo $item['id'] ?>" class="btn btn-info">Modificar</a><a href="" class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>
          </div><!--/row-->
          
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; SGR 2013</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    

  </body>
</html>