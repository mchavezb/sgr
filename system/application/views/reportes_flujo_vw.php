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
                  <form style="display: inline;" method="post" action="<?php echo base_url()?>reportes/ver_ingresos">
                    <input type="submit" value="Ingresos" style="width:128px;">
                  </form>
                  <form style="display: inline;" method="post" action="<?php echo base_url()?>reportes/ver_egresos">
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
                  <th colspan="10">Flujo de Dinero</th> 
                </tr> 
                <tr>
                  <th></th>
                  <th colspan="4">Ingresos</th>
                  <th colspan="4">Egresos</th>
                  <th></th>
                </tr>
                <tr>
                  <th>Fecha</th>
                  <th>Ef.(S/.)</th>
                  <th>Ef.($.)</th>
                  <th>Cr.(S/.)</th>
                  <th>Cr.($.)</th>
                  <th>Ef.(S/.)</th>
                  <th>Ef.($.)</th>
                  <th>Cr.(S/.)</th>
                  <th>Cr.($.)</th>
                  <th>Notas</th>
                </tr>
              </thead>
              <tbody>
                <?php $ing_efe_sol = 0.00 ; $ing_efe_dol = 0.00 ; $ing_tar_sol = 0.00 ; $ing_tar_dol = 0.00 ; $egr_efe_sol = 0.00 ; $egr_efe_dol = 0.00 ; $egr_tar_sol = 0.00 ; $egr_tar_dol = 0.00 ; ?>
                <?php foreach ($flujo as $key => $value) {
                        $ing_efe_sol = $ing_efe_sol + $value['ing_efe_sol'] ;
                        $ing_efe_dol = $ing_efe_dol + $value['ing_efe_dol'] ;
                        $ing_tar_sol = $ing_tar_sol + $value['ing_tar_sol'] ;
                        $ing_tar_dol = $ing_tar_dol + $value['ing_tar_dol'] ;
                        $egr_efe_sol = $egr_efe_sol + $value['egr_efe_sol'] ;
                        $egr_efe_dol = $egr_efe_dol + $value['egr_efe_dol'] ;
                        $egr_tar_sol = $egr_tar_sol + $value['egr_tar_sol'] ;
                        $egr_tar_dol = $egr_tar_dol + $value['egr_tar_dol'] ;
                      ?>                  
                <tr>
                  <td><?php echo date_format(date_create($value['fecha']),'g:i a d/m/y');?></td>
                  <td><?php echo $value['ing_efe_sol'];?></td>
                  <td><?php echo $value['ing_efe_dol'];?></td>
                  <td><?php echo $value['ing_tar_sol'];?></td>
                  <td><?php echo $value['ing_tar_dol'];?></td>
                  <td><?php echo $value['egr_efe_sol'];?></td>
                  <td><?php echo $value['egr_efe_dol'];?></td>
                  <td><?php echo $value['egr_tar_sol'];?></td>
                  <td><?php echo $value['egr_tar_dol'];?></td>
                  <td><?php echo $value['comentario'];?></td>
                </tr>
                <?php } ?>
              </tbody>
                <thead>
                  <tr>
                    <th>Totales</th>
                    <th><?php echo number_format($ing_efe_sol,2) ;?></th>
                    <th><?php echo number_format($ing_efe_dol,2) ;?></th>
                    <th><?php echo number_format($ing_tar_sol,2) ;?></th>
                    <th><?php echo number_format($ing_tar_dol,2) ;?></th>
                    <th><?php echo number_format($egr_efe_sol,2) ;?></th>
                    <th><?php echo number_format($egr_efe_dol,2) ;?></th>
                    <th><?php echo number_format($egr_tar_sol,2) ;?></th>
                    <th><?php echo number_format($egr_tar_dol,2) ;?></th>
                  </tr>
                </thead>
            </table>
            <table class="balance-table">
              <thead>
                <tr>
                  <th colspan="2">Balance</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Efectivo (S/.)</td>
                  <td><?php echo number_format($ing_efe_sol-$egr_efe_sol,2);?></td>
                </tr>
                <tr>
                  <td>Efectivo ($.)</td>
                  <td><?php echo number_format($ing_efe_dol-$egr_efe_dol,2);?></td>
                </tr>
                <tr>
                  <td>Crédito (S/.)</td>
                  <td><?php echo number_format($ing_tar_sol-$egr_tar_sol,2);?></td>
                </tr>
                <tr>
                  <td>Crédito ($.)</td>
                  <td><?php echo number_format($ing_tar_dol-$egr_tar_dol,2);?></td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
  </body>
</html>