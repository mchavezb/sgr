<?php setlocale(LC_ALL,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
  </head>
  <body>
    <div id="header">
        <?php $this->load->view('common/header_vw');?>
    </div>
    <div id="separator"></div>
    <div id="container">
        <div id="aside-left">
            <div id="aside">
                <?php $this->load->view('common/menu_vw');?>
            </div>
        </div>
        <div id="main-content">
            <div id="contenido">
                <div id="comanda"><?php print_r($info_mesa); $orig = array('Monday','September' ); $new = array('Lunes','Setiembre');?>
                    <?php if($info_comanda!=FALSE){?>
                    <div class="titulo-comanda">Comanda # <?php echo $idComanda ?></div>
                    <div class="mesa-comanda">Mesa <select><option><?php echo $numMesa?></option></select></div>
                    <div class="fecha-comanda"><?php echo str_replace($orig, $new, date_format($fecha, 'l j \d\e F \d\e\l Y'));?></div>
                    <div class="hora-comanda"><?php echo date_format($fecha, 'g:i A');?></div>
                    <div class="mozo-comanda">Mozo <select width="150px" style="width: 150px"><option><?php echo $nombres.' '.$apellidos;?></option></select></div>
                    <div class="client-comanda">Clientes <select><option><?php echo $clientes_mesa?></option></select></div>
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
                    <?php } ?>
                </div>
                <div id="platillos">
                    <div class="busqueda-platillo"><input type="text"><input type="button" value="BUSCAR" /></div>

                </div>
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