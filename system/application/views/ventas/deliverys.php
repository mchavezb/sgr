<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
  </head>
  <body>

   <div id="header">
        <?php $this->load->view('common/header_vw'); ?>
    </div>
    <div id="separator"></div>
    <div id="container">
        <div id="aside-left">
            <div id="aside">
                <?php $this->load->view('common/menu_vw'); ?>
            </div>
        </div>
        <div id="main-content">
            <div id="contenido"></div>
        </div>
    </div>

    <script>
    function initMenu() {
      $('#menu ul').hide(); // Hide the submenu
      if ($('#menu li').has('ul')) $('#menu ul').prev().addClass('expandable'); // Expand/collapse a submenu when it exists  
      $('.expandable').click(
        function() {
            $(this).next().slideToggle();
            $(this).toggleClass('expanded');
          }
        );
      }
    
    // When document ready, call initMenu() function 
    $(document).ready(function() {initMenu();});    
    </script>
    <script>
    $(function(){
        $("#menu ul li a").click(function(){
            var page = this.hash.substr(1);
            $.get("<?=$this->config->item('base_url')?>index.php/"+page, function(miHtml){
                $("#contenido").html(miHtml);
            });
        });
    });
    </script>
         <div class="span9">
          <h1>Delivery</h1>
		  <a href="registrarDelivery.php" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Registrar</a>
		  <hr>
		  
          <div class="row-fluid">
            <table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Estado</th>
						<th>Responsable</th>
						<th>Distrito</th>
						<th>Telefono</th>
						<th>Importe (S/.)</th>
					</tr>
				</thead>
				<tbody>

          <?php foreach($query as $row){ ?>  
            <tr>             
            <td><?php echo $row->id_delivery; ?> </td> 
            <td><?php echo $row->estado; ?> </td> 
            <td><?php echo $row->responsable; ?> </td> 
            <td><?php echo $row->distrito; ?> </td> 
            <td><?php echo $row->telefono; ?> </td> 
            <td><?php echo $row->importe; ?> </td> 
            <td><a href="" class="btn btn-info">Ver Pedido</a><a href="modificarDelivery.php" class="btn btn-info">Modificar</a><a href="" class="btn btn-success">Enviar</a></td>
            </tr> 
          <?php  } ?> 
					<!--<tr>
						<td>1</td>
						<td>2</td>
						<td>Terminado</td>
						<td>Pedro Marsano</td>
						<td>Las Palmeras 350</td>
						<td>La Molina</td>
						<td>958624545</td>
						<td>120.00</td>
						<td><a href="" class="btn btn-info">Ver Pedido</a><a href="modificarDelivery.php" class="btn btn-info">Modificar</a><a href="" class="btn btn-success">Enviar</a></td>
					</tr>-->
				</tbody>
			</table>
          </div><!--/row-->
          
        </div><!--/span-->
      

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