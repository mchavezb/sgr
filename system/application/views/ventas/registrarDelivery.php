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
		  <hr>
		  
    <div class="row-fluid">
      <form method="post">
			  <fieldset>
				<legend>Registrar Delivery</legend>
				<label>Cliente</label>
				<input type="text" placeholder="..."></br>
				<label>Dirección</label>
				<input type="text" placeholder="..."></br>
				<label>Distrito</label>
				<input type="text" placeholder="..."></br>
				<label>Teléfono</label>
				<input type="text" placeholder="..."></br>
				</br>
				<input type="submit" name="registrar" value ="Registrar" ><a href="<?php echo base_url() ;?>delivery" class="btn btn-danger">Cancelar</a>
			  </fieldset>
			</form>
    </div><!--/row-->
        </hr>
        </div>  
  

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