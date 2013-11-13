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
              <h1 style="background-color: #FACC2E; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Mesas</h1>
              <br/>
              <br/>
              <hr>
              <div class="row-fluid">
                <form method='post'>
                <fieldset>
                <legend>Registrar Mesas</legend>
                <table>
                <tr>
                <td><label>Número de Mesa</label></td>
                <td><input type="text" placeholder="..." name="mesa_num"></td>
                </tr>
                <tr>
                <td><label>Capacidad</label></td>
                <td><input type="text" placeholder="..." name="capacidad"></td>
                </tr>
              </table>
                
                </br>
                <input type="submit" name="registrar" value ="Registrar" ><a href="<?php echo base_url() ;?>mesas" class="btn btn-danger">Cancelar</a>
                </fieldset>
                </form>
              </div><!--/row-->
            </div>
        </div>
    </div>

   
          
         
        

  </body>
</html>