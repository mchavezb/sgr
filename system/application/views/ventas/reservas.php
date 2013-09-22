<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
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
              <li><a href="pedidos.php">Pedidos</a></li>
              <li><a href="deliverys.php">Deliverys</a></li>
              <li><a href="reservas.php">Reservas</a></li>
              <li class="nav-header">Contabilidad</li>
              <li><a href="../contabilidad/apertura.php">Apertura de Caja</a></li>
              <li><a href="../contabilidad/arqueo.php">Arqueo de Caja</a></li>
              <li><a href="../contabilidad/flujo.php">Flujo de Efectivo</a></li>
			  <li class="nav-header">Administracion</li>
              <li><a href="../administracion/mesas.php">Mesas</a></li>
              <li><a href="../administracion/platos.php">Platos</a></li>
              <li><a href="../administracion/usuario.php">Usuarios</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <h1>Reservas</h1>
		  <a href="reservas/registrar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Registrar</a>
		  <hr>
		  
          <div class="row-fluid">
            <table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th># Mesa</th>
						<th>Hora</th>
						<th># Personas</th>
						<th>Cliente</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>3</td>
						<td>4:10 pm</td>
						<td>4</td>
						<td>Maria Lopez</td>
						<td><a href="modificarReserva.php" class="btn btn-info">Modificar</a><a href="" class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>
					</tr>
				</tbody>
			</table>
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