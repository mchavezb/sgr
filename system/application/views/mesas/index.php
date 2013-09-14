<?php
    session_start();
	
    include_once('../administracion/DB/mesaDB.php');

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
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
	  .mesa{
		width:140px;
		float:left;
		margin:10px;
	  }
	  .mesa p{
		text-align:center;
		font-weight:bold;
	  }
	  #sidebar{
		float: right;
		width: 350px;
		height: 600px;
		margin-top: -410px;
		background-color:#333333;
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
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">SGR</a>

        </div>
      </div>
    </div>

    <div class="container" style="width: 1000px; margin-left:20px;">
		<?php if ( count( $array) > 0 ){ ?>
			<?php foreach( $array as $item ){ ?>
				<div class="mesa">
					<p>Mesa <?php echo $item['numero'] ?></p>
					<?php if ( $item['estado'] == 'libre'){ ?>
						<a class="btn" href="pedido.php"><img src="../assets/img/mesaLibre.png"></a>
					<?php } 
						elseif ( $item['estado'] == 'ocupado') { ?>
						<a class="btn" href="pedido.php"><img src="../assets/img/mesaOcupada.png"></a>
					<?php } 
						else { ?>
						<a class="btn" href="pedido.php"><img src="../assets/img/mesaReservada.png"></a>
					<?php } ?>
				</div>
			<?php } ?>
		<?php } ?>

    </div> <!-- /container -->
	<div id="sidebar">
			<table class="table" style="background-color:white">
					<h5 style="color:white">Platos Listos</h6>
					<thead>
						<tr style="background-color:gray; color:white">
							<th ># Mesa</th>
							<th>Plato</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Lomo Saltado</td>
							<td><a class="btn btn-primary" href="">OK</a></td>
						</tr>
						<tr>
							<td>1</td>
							<td>Aji de Gallina</td>
							<td><a class="btn btn-primary" href="">OK</a></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
			</table>
			</br>
			<table class="table" style="background-color:white">
					<h5 style="color:white">Bebidas</h6>
					<thead>
						<tr style="background-color:gray; color:white">
							<th># Mesa</th>
							<th>Bebida</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>3</td>
							<td>Cerveza</td>
							<td><a class="btn btn-primary" href="">OK</a></td>
						</tr>
						<tr>
							<td>4</td>
							<td>Gaseosa</td>
							<td><a class="btn btn-primary" href="">OK</a></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
			</table>
		</div>
	</br></br>
	<div class="span2">
		<!-- Button to trigger modal -->
		<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal">Juntar Mesas</a>
			 
		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Juntar Mesas</h3>
			</div>
			<div class="modal-body">
				<p>Mesa 1: <input type="checkbox"></p>
				<p>Mesa 2: <input type="checkbox"></p>
                <p>Mesa 3: <input type="checkbox"></p>
				<p>Mesa 4: <input type="checkbox"></p>
                <p>Mesa 5: <input type="checkbox"></p>
				<p>Mesa 6: <input type="checkbox"></p>
   				<p>Mesa 7: <input type="checkbox"></p>
                <p>Mesa 8: <input type="checkbox"></p>
                <p>Mesa 9: <input type="checkbox"></p>
                <p>Mesa 10: <input type="checkbox"></p>
                <p>Mesa 11: <input type="checkbox"></p>
                <p>Mesa 12: <input type="checkbox"></p>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
				<button class="btn btn-primary">Guardar</button>
			</div>
		</div>
	</div>
	
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
	<script src="../assets/js/bootstrap-modal.js"></script>
    

  </body>
</html>
