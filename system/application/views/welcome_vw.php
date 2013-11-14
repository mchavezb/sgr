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
    <script src="<?=$this->config->item('base_url')?>f/js/validar.js"></script>
       <script type="text/javascript">
            $(function(){
                //Para escribir solo letras
                $('.letras').validM(' abcdefghijklmnñopqrstuvwxyzáéiou');

                //Para escribir solo numeros    
                $('.numeros').validM('0123456789'); 
                $('.numerosp').validM('.0123456789');   
            });
        </script>
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
            
                <h1 class="form-message sangria">¡ Bienvenido <?php echo $this->session->userdata('nombres');?> !</h1>
              
         
                <!-- print_r($this->session->all_userdata()); -->
                
              
                <?php if($this->session->userdata('caja_ok')==0){?>
                <p class="subtitulo sangria">No existe una caja activa, por favor realiza una apertura de caja.</p>
                <?php }else{
                            if($this->session->userdata('idPerfil')==01 || $this->session->userdata('idPerfil')==04){?>
                <p class="subtitulo sangria">Última cotización del dólar, vigente al <?php echo date_format(date_create($cotizacion[0]['fecha']),'d/m g:i a');?>.</p>
                <p class="subtitulo sangria">Compra : <?php echo $cotizacion[0]['v_compra']?></p>
                <p class="subtitulo sangria">Venta : <?php echo $cotizacion[0]['v_venta']?></p>
                <form method='post' action="<?php echo base_url()?>caja/cotizar">
                    <table class="pagos-table">
                        <thead>
                            <tr>
                                <th colspan="2">Tipo de Cambio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pull-right">Compra :</td>
                                <td><input class="numerosp" type="text" name="v_compra"></td>
                            </tr>
                            <tr>
                                <td class="pull-right">Venta :</td>
                                <td><input class="numerosp" type="text" name="v_venta"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="pull-right"><input type="submit" value="Ingresar"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <?php } } ?>
                
         
        </div>
    </div>
  </body>
</html>