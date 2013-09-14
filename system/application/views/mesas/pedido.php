<?php
    session_start();
	
    include_once('../administracion/DB/platoDB.php');

    if( isset( $_SESSION['platos'] ) )
    {
        $array = $_SESSION['platos'];
        unset( $_SESSION['platos'] );
    }
    else
    {
		$platos = new Platos();
		$array = $platos->findAll(); 
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
	  #comanda{
		float:left;
		position:relative;
		width:670px;
		margin-top:50px;
	  }
	  #productos{
		float:left;
		position:relative;
		width:220px;
		margin-top:50px;
		margin-left:40px;
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
		<div class="nav-collapse collapse">
            <ul class="nav">
              <li><a href="index.php"><i class="icon-circle-arrow-left icon-white"></i> Regresar</a></li>

            </ul>
         </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
		<div id="comanda">
			<table class="table table-bordered table-condensed" style="width:670px;">
				<tbody>
					<tr>
						<td align="center"><strong>MESA N° 1</strong></td>
						<td align="center" colspan="2"><strong>FECHA: </strong>24 de agosto 2013</td>
						<td align="right" style='padding-right:5px'><strong>HORA: </strong></td>
						<td align="center" colspan="2">04:55 pm</td>
					</tr>
					<tr>
						<td style='padding-left:5px'><strong>Mozo :</strong></td>
						<td style='padding-left:5px' colspan="2">
							<select>
								<option value="001">001 - José Céspedes</option>
								<option value="002">002 - Luis Chávez</option>
								<option value="003" selected="selected">003 - Juan Pérez</option>
							</select>
						</td>
						<td align="right" style='padding-right:5px'><strong>N° comensales :</strong></td>
						<td align="center" colspan="2"><input style="width:50px;" type="text" value="3" size="5"/></td>
					</tr>
					<tr>
						<td align="center"><strong>#</strong></td>
						<td align="center"><strong>Descripción</strong></td>
						<td align="center"><strong>Cobrar</strong></td>
						<td align="center"><strong>Cantidad</strong></td>
						<td align="center"><strong>Precio Unit.</strong></td>
						<td align="center"><strong>Importe</strong></td>
					</tr>
					<tr>
						<td align="center">01205</td>
						<td style='padding-left:5px'>Lomo Saltado (sin cebolla)</td>
						<td style="padding-left:5px">
							<select style="width: 60px;">
								<option value="si" selected="selected">Si</option>
								<option value="no">No</option>
							</select>
						</td>
						<td style="text-align:center">2</td>
						<td style='padding-right:5px' align="right">15.00</td>
						<td style='padding-right:5px' align="right">30.00</td>
					</tr>
					<tr>
						<td align="center">01258</td>
						<td style='padding-left:5px'>Ají de Gallina</td>
						<td style="padding-left:5px">
							<select style="width: 60px;">
								<option value="si" selected="selected">Si</option>
								<option value="no">No</option>
							</select>
						</td>
						<td style="text-align:center">1</td>
						<td style='padding-right:5px' align="right">12.00</td>
						<td style='padding-right:5px' align="right">12.00</td>
					</tr>
					<tr>
						<td align="center">01988</td>
						<td style='padding-left:5px'>Jarra de Chicha</td>
						<td style="padding-left:5px">
							<select style="width: 60px;">
								<option value="si" selected="selected">Si</option>
								<option value="no">No</option>
							</select>
						</td>
						<td style="text-align:center">1</td>
						<td style='padding-right:5px' align="right">7.00</td>
						<td style='padding-right:5px' align="right">7.00</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td align="center"><strong>Sub-total</strong></td>
						<td  style='padding-right:5px' align="right">49.00</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td align="center"><strong>Dscto.</strong></td>
						<td style='padding-right:5px' align="right"></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td align="center"><strong>I.G.V.</strong></td>
						<td style='padding-right:5px' align="right">9.31</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td align="center"><strong>Total</strong></td>
						<td style='padding-right:5px' align="right">58.31</td>
					</tr>
				</tbody>
			</table>
			</br>
			<table>
				<tr>
					<td><input style="width: 170px"  class="btn btn-large" type="button" value="Quitar Producto"></td>
					<td><input style="width: 170px"  class="btn btn-large" type="button" value="Cancelar Pedido" onClick="location.href='index.php'"></td>
					<td><input style="width: 170px" class="btn btn-large" type="button" value="Imprimir Boleta" onClick="location.href='boleta.php'"></td>
					
				</tr>
				<tr>
					<td><input style="width: 170px" class="btn btn-large" type="button" value="Agregar Nota"></td>
					<td><input style="width: 170px" class="btn btn-large" type="button" value="Enviar Pedido" onClick="location.href='../cocina/index.php'"></td>
					<td><input style="width: 170px" class="btn btn-large" type="button" value="Imprimir Factura" onClick="location.href='factura.php'"></td>
				</tr>
				<tr>
					<td><input style="width: 170px" class="btn btn-large" type="button" value="Desocupar Mesa" onClick="location.href='index.php'"></td>
				</tr>
			</table>
		</div>
		<div id="productos">
			<?php if ( count( $array) > 0 ){ ?>
			<table class="table table-bordered table-condensed">
				<tbody>
					<tr>
						<td colspan="3"><input type="text" size="35"></td>
						<td width="300px"><input type="button" value="BUSCAR"></td>
					</tr>
					<tr>
						<td style='padding: 0 5px 0 5px'><strong>ITEM</strong></td>
						<td style='padding: 0 65px 0 5px'><strong>PRODUCTO</strong></td>
						<td style='padding: 0 5px 0 5px'><strong>PRECIO</strong></td>
						<td style='padding: 0 5px 0 5px'><strong>AGREGAR</strong></td>
					</tr>
					<?php foreach( $array as $item ){ ?>
					<tr>
						<td align="center"><?php echo $item['id'] ?></td>
						<td style='padding-left:5px'><?php echo $item['nombre'] ?></td>
						<td align="center"><?php echo $item['precio'] ?></td>
						<td align="center"><input type="button" value="AGREGAR"></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } ?>
		</div>
		
		

    </div> <!-- /container -->
	
	
	
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    

  </body>
</html>
