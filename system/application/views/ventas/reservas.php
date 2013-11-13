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
      <div id="main-content">
        <div id="contenido">
          <h1 style="background-color: #FACC2E; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Reservas</h1>
          <a href="reservas/registrar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Registrar</a>
          <hr>
      
          <div class="row-fluid">
            <table>
              
                <tr>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">#</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Mesa</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Fecha</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Número Personas</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Cliente</td>
                </tr>
              
                
                  <?php 
                  if($reservas==false){
                    echo "<p>No hay reservas pendientes</p>";
                  }else{
                  foreach ($reservas->result() as $row) {
                
                    echo '<tr>';
                    echo '<td>'.$row->idReserva.'</td>';
                    echo '<td>'.$row->Mesa_idMesa.'</td>';
                    echo '<td>'.$row->fecha.'</td>';
                    echo '<td>'.$row->numero_personas.'</td>';
                    echo '<td>'.$row->nombre_cliente.'</td>';
                    echo '<td><a href="'.base_url().'reservas/modificarReserva/'.$row->idReserva.'" class="btn btn-info">Modificar</a><a href="" class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>';
                    echo '<td><a href="'.base_url().'reservas/cancelarReserva/'.$row->idReserva.'" class="btn btn-info">Cancelar</a><a href=""  class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>';
                    echo '</tr>';
                }}?>
              
            </table>
          </div>
        </div>
      </div>
    </div>    
   
  </body>
</html>