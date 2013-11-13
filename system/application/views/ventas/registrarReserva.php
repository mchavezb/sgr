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
                <?php echo form_error('id_mesa');?>
                </tr>
                <tr>
                <td><label>Fecha</label></td>
                <td><input type="date" name="fecha" size="12" /></td>
                <?php echo form_error('fecha');?>
                </tr>
                <tr>
                <td><label>Hora</label></td>
                <td><input type="time" name="hora" size="12" /></td>
                <?php echo form_error('hora');?>
                </tr>
                <tr>
                <td><label>Num. Personas</label></td>
                <td><input type="text" placeholder="..." name="num_personas"></td>
                <?php echo form_error('num_personas');?>
                </tr>
                <tr>
                <td><label>Cliente</label></td>
                <td><input type="text" placeholder="..." name="cliente"></td>
                <?php echo form_error('cliente');?>
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