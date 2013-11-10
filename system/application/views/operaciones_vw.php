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
                <th colspan="6">Operaciones</th>
              </tr>
            </thead>
          </table>

            <table class="ventas-table">
              <thead>
                <tr>
                  <th colspan="4">Egresos</th> 
                </tr> 
                <tr>
                    <th>Efectivo (S/.)</th>
                    <th>Efectivo ($.)</th>
                    <th>Tarjeta (S/.)</th>
                    <th>Tarjeta ($.)</th>
                </tr>
              </thead>
              <tbody>              
                <tr>
                <form style="display: inline;" method="post" action="<?php echo base_url()?>caja/egresos">
                  <td><input type="text" placeholder="0.00" name="egr_efe_sol"></td>
                  <td><input type="text" placeholder="0.00" name="egr_efe_dol"></td>
                  <td><input type="text" placeholder="0.00" name="egr_tar_sol"></td>
                  <td><input type="text" placeholder="0.00" name="egr_tar_dol"></td>
                </tr>
                <tr>
                  <td colspan="3"><input style="width:530px" type="text" placeholder="Ingrese un comentario" name="comentario"></td>
                  <td><input type="submit" value="ACEPTAR"></td>
                </form>
                </tr>
              </tbody>
            </table>
            <table class="ventas-table">
              <thead>
                <tr>
                  <th colspan="4">Ingresos</th> 
                </tr> 
                <tr>
                    <th>Efectivo (S/.)</th>
                    <th>Efectivo ($.)</th>
                    <th>Tarjeta (S/.)</th>
                    <th>Tarjeta ($.)</th>
                </tr>
              </thead>
              <tbody>              
                <tr>
                <form style="display: inline;" method="post" action="<?php echo base_url()?>caja/ingresos">
                  <td><input type="text" placeholder="0.00" name="ing_efe_sol"></td>
                  <td><input type="text" placeholder="0.00" name="ing_efe_dol"></td>
                  <td><input type="text" placeholder="0.00" name="ing_tar_sol"></td>
                  <td><input type="text" placeholder="0.00" name="ing_tar_dol"></td>
                </tr>
                <tr>
                  <td colspan="3"><input style="width:530px" type="text" placeholder="Ingrese un comentario" name="comentario"></td>
                  <td><input type="submit" value="ACEPTAR"></td>
                </form>
                </tr>
              </tbody>
            </table>


        </div>

    </div>
  </body>
</html>