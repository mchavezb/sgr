<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
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
          <h1 style="background-color: #FACC2E; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Platos</h1>
          <a href="adm_platos/registrar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Registrar Platos</a>
          <hr>
      
          <div class="row-fluid">
            <table class="table table-hover">
              
                <tr>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Nombre</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Tiempo Estimado</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Precio</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Tipo Plato</td>
                </tr>
              
            
                <?php foreach ($productos->result() as $row) {
                echo '<tr>';
                echo '<td>'.$row->p_nombre.'</td>';
                echo '<td>'.$row->p_tiempoestimado.'</td>';
                echo '<td>'.$row->p_precio.'</td>';
                
                if($row->TipoProducto_idTipoProducto==1){
                   echo '<td>Entrada</td>';
                }elseif($row->TipoProducto_idTipoProducto==2){
                     echo '<td>Carnes</td>';
                  }elseif($row->TipoProducto_idTipoProducto==3){
                     echo '<td>Sopas</td>';
                   }elseif($row->TipoProducto_idTipoProducto==4){
                     echo '<td>Pescados y Mariscos</td>';
                   }elseif($row->TipoProducto_idTipoProducto==5){
                     echo '<td>Pastas</td>';
                   }else{
                      
                      echo '<td>Postres</td>';
                  }
                echo '<td><a href="'.base_url().'adm_platos/modificarPlato/'.$row->idProducto.'" class="btn btn-info">Modificar</a><a href="" class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>';
                echo '<td><a href="'.base_url().'adm_platos/eliminarPlato/'.$row->idProducto.'" class="btn btn-info">Eliminar</a><a href=""  class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>';
                echo '</tr>';
            
               }?>
              
            </table>
          </div>
        </div>
      </div>
    </div>    
   
  </body>
</html>