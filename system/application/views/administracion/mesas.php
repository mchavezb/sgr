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
          <h1 style="background-color: #FACC2E; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Mesas</h1>
          <br/>
          <br/>
          <a href="adm_mesas/registrar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Registrar Mesa</a>
          <hr>
          <?php if(isset($mensaje)) echo $mensaje;?>

      
          <div class="row-fluid">
            <table class="table table-hover">
              
                <tr>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Número de Mesa</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Estado actual</td>
                <td style="background-color:gray; border-radius:5px; height:18px; width: 150px; text-align:center;">Capacidad</td>
                </tr>
              
            
                <?php foreach ($mesas->result() as $row) {
                
                echo '<tr>';
                echo '<td>'.$row->mesa_num.'</td>';
                if($row->mesa_estado==0){
                   echo '<td>Libre</td>';;
                }elseif($row->mesa_estado==1){
                     echo '<td>Ocupada</td>';
                  }elseif($row->mesa_estado==2){
                     echo '<td>Reservada</td>';
                   }else{
                      
                      echo '<td>Juntada</td>';
                  }
               
                echo '<td>'.$row->capacidad.'</td>';
                echo '<td><a href="'.base_url().'adm_mesas/modificarMesa/'.$row->idMesa.'" class="btn btn-info">Modificar</a><a href="" class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>';
                echo '<td><a href="'.base_url().'adm_mesas/eliminarMesa/'.$row->idMesa.'" class="btn btn-info">Eliminar</a><a href=""  class="btn btn-danger"><i class="icon-trash icon-white"></i></a></td>';
                echo '</tr>';
            
               }?>
              
            </table>
          </div>
        </div>
      </div>
    </div>    
   
  </body>
</html>