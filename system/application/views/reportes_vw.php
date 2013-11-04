<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-ui-1.10.3.custom.min.js'></script>
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/busc.js'></script>
  </head>

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
              <h1 style="background-color: #9C9C9C; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Caja</h1>
              <br/>
              <br/>
              <hr>
              <div class="row-fluid">

                <?php if(isset($mensaje)):?>
                <p style="color:blue"><?php echo $mensaje; ?></p>
                <?php endif?>


                <fieldset>

                <legend>Arqueo de Caja</legend>
                
                <?php 
                  $tot_ef_s = $sol_apert;
                  $tot_ef_d = $dol_apert;
                  $tot_cr_s = 0;
                  $tot_cr_d = 0;
                    foreach ($info_ventas as $k => $v) {
                      $tot_ef_s = $tot_ef_s + $v->pago_efectivo_s;
                      $tot_ef_d = $tot_ef_d + $v->pago_efectivo_d;
                      $tot_cr_s = $tot_cr_s + $v->pago_tarjeta_s;
                      $tot_cr_d = $tot_cr_d + $v->pago_tarjeta_d;
                    }
                    $dif_ef_soles = $soles_final - $tot_ef_s;
                    $dif_ef_dolares = $dolares_final - $tot_ef_d;
                    $dif_cred_soles = $tar_soles-$tot_cr_s;
                    $dif_cred_dol = $tar_dol-$tot_cr_d;

                    ?>
                <table>
                  <tr>
                    <td>Usuario :</td>
                    <td><?php echo $usuariocaja;?></td>
                  </tr>
                  <tr>
                    <td>Caja :</td>
                    <td># <?php echo $idcaja;?></td>
                  </tr>
                  <tr>
                    <td>Fecha :</td>
                    <td><?php echo date_format(date_create($horafecha), 'd/m/Y');?></td>
                  </tr>
                  <tr>
                    <td>Hora :</td>
                    <td><?php echo date_format(date_create($horafecha), 'g:i a');?></td>
                  </tr>
                  <tr>
                    <td>Método de Pago</td>
                    <td>Importe Esperado</td>
                    <td>Importe Real</td>
                    <td>Diferencia</td>
                  </tr>
                  <tr>
                    <td>Efectivo S/.</td>
                    <td><?php echo $tot_ef_s;?></td>
                    <td><?php echo $soles_final;?></td>
                    <td><?php echo $dif_ef_soles;?></td>
                  </tr>
                  <tr>
                    <td>Efectivo $</td>
                    <td><?php echo $tot_ef_d;?></td>
                    <td><?php echo $dolares_final;?></td>
                    <td><?php echo $dif_ef_dolares;?></td>
                  </tr>
                  <tr>
                    <td>Crédito S/.</td>
                    <td><?php echo $tot_cr_s;?></td>
                    <td><?php echo $tar_soles;?></td>
                    <td><?php echo $dif_cred_soles;?></td>
                  </tr>
                  <tr>
                    <td>Crédito $</td>
                    <td><?php echo $tot_cr_d;?></td>
                    <td><?php echo $tar_dol;?></td>
                    <td><?php echo $dif_cred_dol;?></td>
                  </tr>
                  <tr>
                    <td>Totales</td>
                    <td><?php echo $tot_ef_s+$tot_ef_d+$tot_cr_s+$tot_cr_d;?></td>
                    <td><?php echo $soles_final+$dolares_final+$tar_soles+$tar_dol;?></td>
                    <td><?php echo $dif_ef_soles+$dif_ef_dolares+$dif_cred_soles+$dif_cred_dol;?></td>
                  </tr>
              </table>
                
                </br>
                </fieldset>
         
              </div><!--/row-->
            </div>
        </div>
    </div>    
         
        

  </body>
</html>