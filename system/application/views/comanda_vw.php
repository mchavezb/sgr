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
                <div id="comanda"><?php $orig = array('Monday','September' ); $new = array('Lunes','Setiembre');?>
                    <?php if($info_comanda!=FALSE){?>
                    <div class="titulo-comanda">Comanda # <?php echo $idComanda ?></div>
                    <div class="mesa-comanda">Mesa <select><option><?php echo $numMesa?></option></select></div>
                    <div class="fecha-comanda"><?php echo str_replace($orig, $new, date_format($fecha, 'l j \d\e F \d\e\l Y'));?></div>
                    <div class="hora-comanda"><?php echo date_format($fecha, 'g:i A');?></div>
                    <div class="mozo-comanda">Mozo <select width="150px" style="width: 150px"><option><?php echo $nombres.' '.$apellidos;?></option></select></div>
                    <div class="client-comanda">Clientes <select><option><?php echo $clientes_mesa?></option></select></div>
                    <div class="mozo-comanda" style="width:199px"><!-- div de prueba para separar--></div>
                    <div class="tit-codigo-producto">#</div>
                    <div class="tit-cant-producto">Est.</div>
                    <div class="tit-desc-producto">Descripción</div>
                    <div class="tit-precio-u-producto">Precio</div>
                    <?php foreach ($detalle_com as $value) { ?>
                        <div class="quitar-producto"><img src='<?=$this->config->item('base_url')?>f/img/delete.png' widht="22px" height="22px"/></div>
                        <div class="cant-producto"><img src='<?=$this->config->item('base_url')?>f/img/<?php if($value->estado==0){echo 'green.gif';}elseif($value->estado==1){echo 'yellow.gif';}elseif($value->estado==2){echo 'red.gif';}elseif($value->estado==3){echo 'check.png';}?>' widht="20px" height="20px"/>
                        </div>
                        <div class="desc-producto"><?php echo $value->p_nombre?></div>
                        <div class="precio-u-producto"><?php echo $value->p_precio?></div>
                    <?php } ?>
                <?php } ?>
                </div>
                <div id="platillos">
                    <div class="busqueda-platillo"><input type="text"><input type="button" value="BUSCAR" /></div>

                </div>
            </div>
        </div>
    </div>
  </body>
</html>