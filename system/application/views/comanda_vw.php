<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
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
            <div id="contenido">
                <div id="comanda">
                    <div class="titulo-comanda">Comanda # 00001</div>
                    <div class="mesa-comanda">Mesa <select><option>002</option></select></div>
                    <div class="fecha-comanda">jueves 19 de Setiembre del 2013</div>
                    <div class="hora-comanda">11:35 pm</div>
                    <div class="mozo-comanda">Mozo <select width="150px" style="width: 150px"><option>Juan Pérez</option></select></div>
                    <div class="client-comanda">Clientes <select><option>1</option></select></div>
                    <div class="mozo-comanda" style="width:199px"><!-- div de prueba para separar--></div>
                    <div class="tit-codigo-producto">#</div>
                    <div class="tit-desc-producto">Descripción</div>
                    <div class="tit-cant-producto">Cant.</div>
                    <div class="tit-precio-u-producto">Precio</div>
                    <div class="tit-importe-producto">Importe</div>
                    <div class="codigo-producto">12345</div>
                    <div class="desc-producto">Lomo saltado - término medio</div>
                    <div class="cant-producto">2</div>
                    <div class="precio-u-producto">10.00</div>
                    <div class="importe-producto">14.98</div>
                    <div class="codigo-producto">12345</div>
                    <div class="desc-producto">Tallarines a la Alfredo</div>
                    <div class="cant-producto">2</div>
                    <div class="precio-u-producto">10.00</div>
                    <div class="importe-producto">56.98</div>
                </div>
                <div id="platillos">Comanda # 00001</div>
            </div>
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
  </body>
</html>