<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
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
              <h1>Reservas</h1>
              <hr>
              <div class="row-fluid">
                <form method='post'>
                <fieldset>
                <legend>Registrar Reserva</legend>
                <?php if(isset($mensaje)):?>
                <p style="color:blue"><?php echo $mensaje; ?></p>
                <?php endif?>
        
                <label># Mesa</label>
                <input type="text" placeholder="..." name="id_mesa"></br>
                <label>Hora</label>
                <input type="text" placeholder="..." name="fecha"></br>
                <label># Personas</label>
                <input type="text" placeholder="..." name="num_personas"></br>
                <label>Cliente</label>
                <input type="text" placeholder="..." name="cliente"></br>
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