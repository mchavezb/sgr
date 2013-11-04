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
    <div id="separator"><!-- <img src="<?php echo base_url();?>f/img/green.gif" width="20px" height="20px"> En cocina <img src="<?php echo base_url();?>f/img/yellow.gif" width="20px" height="20px"> En preparación <img src="<?php echo base_url();?>f/img/red.gif" width="20px" height="20px"> Terminado <img src="<?php echo base_url();?>f/img/check.png" width="20px" height="20px"> Servido  --></div>
    <div id="container">
        <div id="aside-left">
            <div id="aside">
                <?php $this->load->view('common/menu_vw');?>
            </div>
        </div>
        <div id="main-content">
            <div id="contenido">
                <div id="comanda">
                    <!-- <input type="submit" value="Cancelar Comanda" style="width:128px;">
                    
                    <form style="display: inline;" method="post" action="<?php echo base_url()?>pedidos/enviar"><input type="hidden" id="comanda_id" name="comanda_id" value='<?php echo $idComanda?>'><input type="hidden" id="mesaid" name="mesaid" value='<?php echo $idmesa?>'><input type="submit" value="Enviar Pedido" style="width:128px;"></form>
                    
                    <form style="display: inline;" method="post" action="<?php echo base_url()?>comanda/imprimir"><input type="submit" value="Imprimir Cuenta" style="width:128px;" onclick="window.print()"></form>
                    
                    <form style="display: inline;" method="post" action="<?php echo base_url()?>mesas/desocupar"><input type="submit" value="Desocupar Mesa" style="width:128px;"><input type="hidden" id="comanda_d" name="comanda_d" value='<?php echo $idComanda ?>'><input type="hidden" id="mesa_d" name="mesa_d" value='<?php echo $idmesa?>'></form>

                    <form style="display: inline;" method="post" action="<?php echo base_url()?>comanda/cobrar"><input type="submit" value="Enviar a Caja" style="width:128px;"><input type="hidden" id="comanda_d" name="comanda_d" value='<?php echo $idComanda ?>'></form> -->

                  <?php $orig = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday','September','October','November' ); $new = array('Lunes','Martes','Miércoles','Jueves','Viernes','Sábado','Domingo','Setiembre','Octubre','Noviembre');?>
                    <?php if($info_comanda!==FALSE){?>
                    <table class="comprobante-table">
                        <thead>
                            <tr>
                                <th colspan="4">Comanda # <?php echo $idComanda ?></th>
                            </tr>
                            <tr>
                                <th>Mesa <?php echo $numMesa?></th>
                                <th colspan="2"><?php echo str_replace($orig, $new, date_format($fecha, 'l j \d\e F \d\e\l Y'));?></th>
                                <th><?php echo date_format($fecha, 'g:i A');?></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="pull-right">Mozo</th>
                                <th colspan="2" class="pull-left"><?php echo $nombres.' '.$apellidos;?></th>
                            </tr>
                            <tr>
                                <th colspan="2" class="pull-right">DNI/RUC</th>
                                <th colspan="2" class="pull-left"><input type="text"></th>
                            </tr>
                            <tr>
                                <th colspan="2"class="pull-right">Nombre/Razón Social</th>
                                <th colspan="2" class="pull-left"><input type="text"></th>
                            </tr>
                            <tr>
                                <th colspan="2"class="pull-right">Dirección</th>
                                <th colspan="2" class="pull-left"><input type="text"></th>
                            </tr>
                            <tr>
                                <th width="70px">#</th>
                                <th colspan="2">Descripción</th>
                                <th width="70px">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;
                         foreach ($detalle_com as $value) {
                                if($value->estado != 5){ ?>
                            <tr>
                                <td class="pull-center"><a href="#" class="elim_pedido"><input type="hidden" id="idPedidoel" value="<?php echo $value->idPedido?>"><img src='<?=$this->config->item('base_url')?>f/img/delete.png' width="22px" height="22px"/></a>
                                    
                                </td>
                                
                                <td colspan="2" class="pull-left"><?php echo $value->p_nombre?></td>
                                <td class="pull-right"><?php echo $value->p_precio?></td>
                            </tr>
                        <?php $i = $value->p_precio + $i;}
                          } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="pull-right">SUB-TOTAL</td>
                                <td class="pull-right"><?php echo number_format($i,2);?></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="pull-right">I.G.V.</td>
                                <td class="pull-right"><?php echo $i*0.19;?></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="pull-right">TOTAL</td>
                                <td class="pull-right"><?php echo $i*1.19;?></td>
                            </tr>
                        </tfoot>
                    </table>
                        <?php }?>


           
                </div>
                <div id="buscador">
                    <form style="display: inline;" method="post" action="<?php echo base_url()?>pedidos/cobrar">

                        <table class="pagos-table">
                            <thead>
                                <tr>
                                    <th colspan="2">Pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Caja</td>
                                    <td>
                                        <select name="idcaja">
                                            <option value="01">Caja 1</option><!-- Cambiar para que lea automaticamente -->
                                            <option value="02">Caja 2</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Comprobante</td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="radio" id="boleta" name="comprobante" value="boleta">Boleta
                                    </td>
                                    <td>
                                        <input type="radio" id="factura" name="comprobante" value="factura">Factura
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">Forma de Pago</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="radio" id="efectivo" name="medio_pago" value="efectivo">Efectivo</td>
                                </tr>
                                <tr>   
                                    <td colspan="2"><input type="radio" id="tarjeta" name="medio_pago" value="tarjeta">Tarjeta de Crédito</td>
                                </tr>
                                <tr>    
                                    <td colspan="2"><input type="radio" id="ambos" name="medio_pago" value="ambos">Ambos</td>
                                </tr>
                        
                            </tbody>
                        </table>
                        <span id="input_efectivo">
                            <h3>Efectivo :</h3>
                            Soles :<br><input type="text" name="ef_soles"><br>
                            Dólares :<br><input type="text" name="ef_dolares"><br>
                        </span>
                        <span id="input_tarjeta">
                            <h3>Tarjeta :</h3>
                            Soles :<br><input type="text" name="tarj_soles"><br>
                            Dólares :<br><input type="text" name="tarj_dolares"><br>
                        </span>  
                        <input type="hidden" id="comanda_id" name="comanda_id" value='<?php echo $idComanda?>'>
                        <input type="hidden" id="total" name="total" value='<?php echo $total?>'>
                        <input type="hidden" id="mesaid" name="mesaid" value='<?php echo $idmesa?>'>
                        <input type="submit" value="COBRAR" style="width:128px;"></form>
                    <!-- Tipo de Atención : <br>
                    <form>
                      <input type="radio" name="tipoA" value="plato" checked="checked">Plato por plato<br>
                      <input type="radio" name="tipoA" value="orden">Orden Completa<br>
                    </form>
                    <div class="busqueda-platillo">
                        <input type="text" id="busc"><input type="submit" value="BUSCAR" id="busc-submit"/>
                        <input type="hidden" id="comandamesa" name="comandamesa" value='<?php echo $idComanda ?>/<?php echo $idmesa?>'>
                    </div>

                    <input type="hidden" id="idTipo1" name="idTipo1" value='001'><input type="submit" value="Entradas" id="entradas-submit" style="width:80px;">
                    <input type="hidden" id="idTipo2" name="idTipo2" value='002'><input type="submit" value="Carnes" id="carnes-submit" style="width:80px;">
                    <input type="hidden" id="idTipo3" name="idTipo3" value='003'><input type="submit" value="Sopas" id="sopas-submit" style="width:80px;">
                    <input type="hidden" id="idTipo4" name="idTipo4" value='004'><input type="submit" value="Pescados" id="pescados-submit" style="width:80px;">
                    <input type="hidden" id="idTipo5" name="idTipo5" value='005'><input type="submit" value="Pastas" id="pastas-submit" style="width:80px;">
                    <input type="hidden" id="idTipo6" name="idTipo6" value='006'><input type="submit" value="Postres" id="postres-submit" style="width:80px;">
                   
                    <div id="busc-data"></div>


                    <?php $this->load->view('common/buscador_vw');?> -->
                </div>
            </div>
        </div>
    </div>
  <!-- pop-up -->
<div id="dialog2" title="Agregar mesas :">
    <?php $this->load->view('pop-up/agregar_mesas_vw');?>
</div>
<div id="dialog3" title="Eliminar pedido">
    <?php $this->load->view('pop-up/elim_pedido_vw');?>
</div>
<div id="dialog4" title="Agregar nota :">
    <?php $this->load->view('pop-up/anotar_pedido_vw',$idmesa);?>
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
        $("#dialog3").dialog({
            autoOpen:false,
            hide: 'fade',
            modal: true
        });
        $(".elim_pedido").on("click",function(){
            var valor2 = $(this).children('input').val();
            $("#dialog3").dialog("open");
            $("#elim_pedido").val(valor2);
        });
        $("#dialog4").dialog({
            autoOpen:false,
            hide: 'fade',
            modal: true
        });
        $(".nota-pedido").on("click",function(){
            var valor = $(this).children('input').val();
            $("#dialog4").dialog("open");
            $("#id_pedido").val(valor);
        });
        // $(".close").on("click",function(){
        //     $("#dialog4").dialog({
        //         hide: 'fade',
        //         modal: false
        //     });
        // });
    }); 

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#input_efectivo").hide();
        $("#input_tarjeta").hide();
        if($('#efectivo').is(':checked')==true){
            $("#input_efectivo").show();
            $("#input_tarjeta").hide();
        }
        if($('#tarjeta').is(':checked')==true){
            $("#input_tarjeta").show();
            $("#input_efectivo").hide();
        }
        if($('#ambos').is(':checked')==true){
            $("#input_tarjeta").show();
            $("#input_efectivo").show();
        }
    });
</script>
<script>
    $('#efectivo').click(function(){
            $("#input_efectivo").show();
            $("#input_tarjeta").hide();
        });
    $('#tarjeta').click(function(){
            $("#input_efectivo").hide();
            $("#input_tarjeta").show();
        });
    $('#ambos').click(function(){
            $("#input_efectivo").show();
            $("#input_tarjeta").show();
        });
</script>
  </body>
</html>