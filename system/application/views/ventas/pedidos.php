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
          <h1>Pedidos</h1>
          <hr>
            <table class="table table-hover">
            <thead>
            <tr>
            <th>#</th>
            <th>Mesa</th>
            <th>Mozo</th>
            <th>Hora</th>
            <th>Importe</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>1</td>
            <td>1</td>
            <td>Pepe Perez</td>
            <td>3:40 pm</td>
            <td>70.00</td>
            <td><a href="" class="btn btn-info">Ver</a><a href="#myModal" role="button" class="btn btn-success" data-toggle="modal">Pagar</a>
            </tr>
            </tbody>
            </table>
            <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Pagar</h3>
              </div>
              <div class="modal-body">
                <h4>Monto a pagar: S/. 70.00</h4>
                <hr>
                <label class="checkbox">
                <input type="checkbox" value="">
                Efectivo
                </label>
                <input type="text" value=""></br>
                <label class="checkbox">
                <input type="checkbox" value="">
                Tarjeta
                </label>
                <input type="text" value=""></br>
                <a href="" class="btn">Calcular</a>
                <hr>
                <h4>Vuelto: S/.</h4>
                <div class="modal-footer">
                  <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                  <button class="btn btn-primary">Registrar</button>
                </div>
              </div>
            </div>
        </div>
      </div>
</body>
</html>