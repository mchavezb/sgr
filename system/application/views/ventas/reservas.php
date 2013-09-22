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
          <a href="reservas/registrar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Registrar</a>
          <hr>
      
          <div class="row-fluid">
            <table class="table table-hover">
            <thead>
            <tr>
            <th>#</th>
            <th># Mesa</th>
            <th>Hora</th>
            <th># Personas</th>
            <th>Cliente</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>1</td>
            <td>3</td>
            <td>4:10 pm</td>
            <td>4</td>
            <td>Maria Lopez</td>
            <td><a href="modificarReserva.php" class="btn btn-info">Modificar</a><a href="" class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>
            </tr>
            </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>    

  </body>
</html>