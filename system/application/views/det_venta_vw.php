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
          <table class="ventas-table">
            <thead>
              <tr>
                <th colspan="6">
                  <form style="display: inline;" method="post" action="<?php echo base_url()?>reportes/ventas">
                    <input type="submit" value="Ventas" style="width:128px;">
                  </form>
                  <form style="display: inline;" method="post" action="<?php echo base_url()?>reportes/ingresos">
                    <input type="submit" value="Ingresos" style="width:128px;">
                  </form>
                  <form style="display: inline;" method="post" action="<?php echo base_url()?>reportes/egresos">
                    <input type="submit" value="Egresos" style="width:128px;">
                  </form>
                  <form style="display: inline;" method="post" action="<?php echo base_url()?>reportes/flujo">
                    <input type="submit" value="Flujo de Dinero" style="width:128px;">
                  </form>
                </th>
              </tr>
            </thead>
          </table>

            <table class="ventas-table">
              <thead>
                <tr>
                  <th colspan="6">Detalle de Venta</th> 
                </tr>
                <?php foreach ($detalle_venta as $key => $value) {
                      if($value->tipo_comprobante==1){?>
                <tr>
                  <th>Nombre</th>
                  <th>DNI</th>
                  <th>Dirección</th>
                </tr>
                <?php }elseif($value->tipo_comprobante==2){?>
                <tr>
                  <th>Razón Social</th>
                  <th>RUC</th>
                  <th>Dirección</th>
                </tr>
                <?php } ?>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $value->razon_social; ?></td>
                  <td><?php echo $value->ruc; ?></td>
                  <td><?php echo $value->direccion; ?></td>
                </tr>
              </tbody>
            </table>
            <table class="ventas-table">
              <thead>
                <tr>
                  <th>Hora/Fecha</th>
                  <th>N° Caja</th>
                  <th>Comprobante</th>
                  <th>Tipo de Pago</th>
                    <?php if($value->TipoPago_idTipoPago==2 || $value->TipoPago_idTipoPago==3){?>
                  <th>Tipo deTarjeta</th>
                    <?php } ?>  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo date_format(date_create($value->hora),'g:i a d/m/y');?></td>
                  <td><?php echo $value->cajaid;?></td>
                  <td><?php if($value->tipo_comprobante==0){echo 'NO APLICA';}elseif($value->tipo_comprobante==1){echo 'BOLETA';}elseif($value->tipo_comprobante==2){echo 'FACTURA';}?></td>
                  <td><?php if($value->TipoPago_idTipoPago==0){echo 'NO APLICA';}elseif($value->TipoPago_idTipoPago==1){echo 'EFECTIVO';}elseif($value->TipoPago_idTipoPago==2){echo 'TARJETA';}elseif($value->TipoPago_idTipoPago==3){echo 'AMBOS';}?></td>
                  <?php if($value->TipoPago_idTipoPago==2 || $value->TipoPago_idTipoPago==3){?>
                  <td><?php if($value->tipotarjeta==1){echo 'Visa';}elseif($value->tipotarjeta==2){echo 'MasterCard';}elseif($value->tipotarjeta==3){echo 'Am. Express';}elseif($value->tipotarjeta==4){echo 'Diners';}elseif($value->tipotarjeta==5){echo 'Otra';}?></td>
                    <?php } ?>
                </tr>
              </tbody>
              </table>
              <table class="ventas-table">
                <thead>
                  <tr>
                    <th>Total (S/.)</th>
                        <?php if($value->TipoPago_idTipoPago==1||$value->TipoPago_idTipoPago==3){?>
                    <th>Efectivo (S/.)</th>
                    <th>Efectivo ($.)</th>
                        <?php }?>
                        <?php if($value->TipoPago_idTipoPago==2||$value->TipoPago_idTipoPago==3){?>
                    <th>Tarjeta (S/.)</th>
                    <th>Tarjeta ($.)</th>
                        <?php }?>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?php echo $value->total;?></td>
                        <?php if($value->TipoPago_idTipoPago==1||$value->TipoPago_idTipoPago==3){?>
                    <td><?php echo $value->pago_efectivo_s;?></td>
                    <td><?php echo $value->pago_efectivo_d;?></td>
                        <?php }?>
                        <?php if($value->TipoPago_idTipoPago==2||$value->TipoPago_idTipoPago==3){?>
                    <td><?php echo $value->pago_tarjeta_s;?></td>
                    <td><?php echo $value->pago_tarjeta_d;?></td>
                        <?php }?>
                  </tr>
                </tbody>
              </table>
              <?php }?>
            


        </div>

    </div>
  </body>
</html>