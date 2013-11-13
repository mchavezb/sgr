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
                <legend>Modificar Reserva</legend>
                <?php if(isset($mensaje)):?>
                <p style="color:blue"><?php echo $mensaje; ?></p>
                <?php endif?>
                <table>
                <tr>
                <td><label>Num. Mesa</label></td>
                <td><input type="text" value="<?=$id_mesa?>" name="id_mesa"></td>
                </tr>
                <tr>
                <td><label>Hora</label></td>
                <td><input type="text" value="<?=$fecha?>" name="fecha"></td>
                </tr>
                <tr>
                <td><label>Num. Personas</label></td>
                <td><input type="text" value="<?=$num_personas?>" name="num_personas"></td>
                </tr>
                <tr>
                <td><label>Cliente</label></td>
                <td><input type="text" value="<?=$nombre_cliente?>" name="cliente"></td>
                </tr>
            </table>
                </br>
                <input type="submit" value="Modificar" name="modificar"></br>
                
                </fieldset>
                </form>
              </div><!--/row-->
            </div>
        </div>
    </div>

   
          
         
        

  </body>
</html>