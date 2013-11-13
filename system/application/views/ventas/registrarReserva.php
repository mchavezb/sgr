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
              <h1 style="background-color: #FACC2E; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Reservas</h1>
              <hr>
              <div class="row-fluid">
                <form method='post'>
                <fieldset>
                <legend>Registrar Reserva</legend>
                <?php if(isset($mensaje)):?>
                <p style="color:blue"><?php echo $mensaje; ?></p>
                <?php endif?>
                <table>
                <tr>
                <td><label>Num. Mesa</label></td>
                <td><input type="text" placeholder="..." name="id_mesa"></td>
                </tr>
                <tr>
                <td><label>Fecha y Hora</label></td>
                <td><input type="text" placeholder="AAAA:MM:DD hh:mm:ss" name="fecha"></td>
                </tr>
                <tr>
                <td><label>Num. Personas</label></td>
                <td><input type="text" placeholder="..." name="num_personas"></td>
                </tr>
                <tr>
                <td><label>Cliente</label></td>
                <td><input type="text" placeholder="..." name="cliente"></td>
                </tr>
                </table>
                </br>
                <input type="submit" name="registrar" value ="Registrar" ><a href="<?php echo base_url() ;?>reservas" class="btn btn-danger">Cancelar</a>
                </fieldset>
                </form>
              </div><!--/row-->
            </div>
        </div>
    </div>

   
          
         
        

  </body>
</html>