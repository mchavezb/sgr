<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
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
        <?php $this->load->view('common/header_vw'); ?>
    </div>
    <div id="separator"></div>
    <div id="container">
        <div id="aside-left">
            <div id="aside">
                <?php $this->load->view('common/menu_vw'); ?>
            </div>
        </div>
        <div id="main-content2">
            <div id="contenido">
                <h1 class="form-message sangria">¡ Bienvenido <?php echo $this->session->userdata('nombres');?> !</h1>
              
         
                <!-- print_r($this->session->all_userdata()); -->
                
              
                <?php if($this->session->userdata('caja_ok')==0){?>
                <p class="subtitulo sangria">No existe una caja activa, por favor realiza una apertura de caja.</p>
               <!--  <form method='post' action="<?php echo base_url()?>caja/cotizar"> -->
                    <!-- <table>
                        <thead>
                            <tr>
                                <th colspan="2">Tipo de Cambio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Compra :</td>
                                <td><input type="text" name="cambio_dia"></td>
                            </tr>
                            <tr>
                                <td>Venta :</td>
                                <td><input type="text" name="cambio_dia_2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" value="Ingresar"></td>
                            </tr>
                        </tbody>
                    </table> -->
                <!-- </form> -->
                <?php } ?>
                
            </div>
        </div>
    </div>
  </body>
</html>