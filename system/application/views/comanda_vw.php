<?php setlocale(LC_ALL,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/jquery-ui-1.10.3.custom.min.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/busc.js'></script>
   
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
                <div id="comanda">
                    <input type="submit" value="Cancelar Comanda" style="width:128px;">
                    <form style="display: inline;" method="post" action="<?php echo base_url()?>pedidos/enviar"><input type="hidden" id="comanda_id" name="comanda_id" value='<?php echo $idComanda?>'><input type="hidden" id="mesaid" name="mesaid" value='<?php echo $idmesa?>'><input type="submit" value="Enviar Pedido" style="width:128px;"></form>
                    <input type="submit" value="Imprimir Cuenta" style="width:128px;">
                    <form style="display: inline;" method="post" action="<?php echo base_url()?>mesas/desocupar"><input type="submit" value="Desocupar Mesa" style="width:128px;"><input type="hidden" id="comanda_d" name="comanda_d" value='<?php echo $idComanda ?>'><input type="hidden" id="mesa_d" name="mesa_d" value='<?php echo $idmesa?>'></form>

                  <?php $orig = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday','September','October' ); $new = array('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo','Setiembre','Octubre');?>
                    <?php if($info_comanda!==FALSE){?>
                    <div class="titulo-comanda">Comanda # <?php echo $idComanda ?></div>
                    <div class="mesa-comanda">Mesa <select><option><?php echo $numMesa?></option></select></div>
                    <div class="fecha-comanda"><?php echo str_replace($orig, $new, date_format($fecha, 'l j \d\e F \d\e\l Y'));?></div>
                    <div class="hora-comanda"><?php echo date_format($fecha, 'g:i A');?></div>
                    <div class="mozo-comanda">Mozo <select width="150px" style="width: 150px"><option><?php echo $nombres.' '.$apellidos;?></option></select></div>
                    <div class="client-comanda">Clientes <select><option><?php echo $clientes_mesa?></option></select></div>
                    <div class="mozo-comanda" style="width:199px"><input type="submit" value="AGREGAR OTRA MESA" id="agr-mesa"/></div>
                    <div class="tit-codigo-producto">#</div>
                    <div class="tit-cant-producto">Nota</div>
                    <div class="tit-cant-producto">Est.</div>
                    <div class="tit-desc-producto">Descripción</div>
                    <div class="tit-precio-u-producto">Precio</div>
                    <?php $i=0;
                         foreach ($detalle_com as $value) { ?>
                        <div class="quitar-producto"><a href="/sgr/comanda/exonerar"><img src='<?=$this->config->item('base_url')?>f/img/delete.png' width="22px" height="22px"/></a></div>
                        <div class="cant-producto"><img src='<?=$this->config->item('base_url')?>f/img/nota.png' width="20px" height="20px"/>
                        </div>
                        <div class="cant-producto"><img src='<?=$this->config->item('base_url')?>f/img/<?php if($value->estado==0){echo 'blank.png';}elseif($value->estado==1){echo 'green.gif';}elseif($value->estado==2){echo 'yellow.gif';}elseif($value->estado==3){echo 'red.gif';}elseif($value->estado==4){echo 'check.png';}?>' width="20px" height="20px"/>
                        </div>
                        <div class="desc-producto"><?php echo $value->p_nombre?></div>
                        <div class="precio-u-producto"><?php echo $value->p_precio?></div>
                        <?php $i = $value->p_precio + $i;
                          } ?>
                        <div class="precio-total"><?php echo $i;?></div><div class="nombre-total">SUB-TOTAL</div><div class="separator"></div>
                        <div class="precio-igv"><?php echo $i*0.19;?></div><div class="nombre-igv">I.G.V.</div><div class="separator"></div>
                        <div class="precio-total"><?php echo $i*1.19;?></div><div class="nombre-total">TOTAL</div><div class="separator"></div>
                <?php }else {?>
                        <div class="titulo-comanda">Comanda # </div>
                        <div class="mesa-comanda">Mesa <select><option><?php echo $numMesa?></option></select></div>
                        <div class="fecha-comanda"></div>
                        <div class="hora-comanda"></div>
                        <div class="mozo-comanda">Mozo <select width="150px" style="width: 150px"><option></option></select></div>
                        <div class="client-comanda">Clientes <select><option><?php echo $clientes_mesa?></option></select></div>
                        <div class="mozo-comanda" style="width:199px"><!-- div de prueba para separar--></div>
                        <div class="tit-codigo-producto">#</div>
                        <div class="tit-cant-producto">Nota</div>
                        <div class="tit-cant-producto">Est.</div>
                        <div class="tit-desc-producto">Descripción</div>
                        <div class="tit-precio-u-producto">Precio</div>
                        <?php } ?>
                </div>
                <div id="buscador">
                    Tipo de Atención : <br>
                    <form>
                      <input type="radio" name="tipoA" value="plato" checked="checked">Plato por plato<br>
                      <input type="radio" name="tipoA" value="orden">Orden Completa<br>
                    </form>
                    <div class="busqueda-platillo">
                        <input type="text" id="busc"><input type="submit" value="BUSCAR" id="busc-submit"/>
                        <input type="hidden" id="comandamesa" name="comandamesa" value='<?php echo $idComanda ?>/<?php echo $idmesa?>'>
                    </div>  
                    <div id="busc-data"></div> 
                    <?php $this->load->view('common/buscador_vw');?>
                </div>
            </div>
        </div>
    </div>
  <!-- pop-up -->
<div id="dialog2" title="Agregar mesas :">
    <?php $this->load->view('pop-up/agregar_mesas_vw');?>
</div>
<!-- fin del pop-up-->
<script>
    $(document).ready(function() {
        $("#dialog2").dialog({
            autoOpen:false,
            hide: 'fade',
            modal: true
        });
        $("#agr-mesa").on("click",function(){
            $("#dialog2").dialog("open");
        });
    }); 
</script>
  </body>
</html>