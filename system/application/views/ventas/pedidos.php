<!DOCTYPE html>
<html lang="en">
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
          <h1>Pedidos</h1>
		  <hr>
		  
          <div class="row-fluid">
            <table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Mesa</th>
						<th>Mozo</th>
						<th>Hora</th>
						<th>Importe</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>1</td>
						<td>Pepe Perez</td>
						<td>3:40 pm</td>
						<td>70.00</td>
						<td><a href="" class="btn btn-info">Ver</a><a href="#myModal" role="button" class="btn btn-success" data-toggle="modal">Pagar</a>
					</tr>
				</tbody>
			</table>
				 
			<!-- Modal -->
			<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3 id="myModalLabel">Pagar</h3>
				</div>
				<div class="modal-body">
					<h4>Monto a pagar: S/. 70.00</h4>
					<hr>
					<label class="checkbox">
					  <input type="checkbox" value="">
					  Efectivo
					</label>
					<input type="text" value=""></br>
					<label class="checkbox">
					  <input type="checkbox" value="">
					  Tarjeta
					</label>
					<input type="text" value=""></br>
					<a href="" class="btn">Calcular</a>
					<hr>
					<h4>Vuelto: S/.</h4>
					
					
					
					
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
					<button class="btn btn-primary">Registrar</button>
				</div>
			</div>
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
	<script src="../assets/js/bootstrap-modal.js"></script>
    

  </body>
</html>