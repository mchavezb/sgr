<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
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
        <div id="main-content">
            <div id="contenido">
              <h1>Reservas</h1>
              <hr>
              <form>
                <fieldset>
                <legend>Modificar Reserva</legend>
                <label># Mesa</label>
                <input type="text" value="3"></br>
                <label>Hora</label>
                <input type="text" value="4:10 pm"></br>
                <label># Personas</label>
                <input type="text" value="4"></br>
                <label>Cliente</label>
                <input type="text" value="María Lopez"></br>
                </br>
                <a href="" class="btn btn-primary">Guardar</a><a href="reservas.php" class="btn btn-danger">Cancelar</a>
                </fieldset>
              </form>
            </div>
        </div>
    </div>          
  </body>
</html>