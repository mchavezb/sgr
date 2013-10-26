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
              <h1 style="background-color: #FACC2E; border-radius: 10px; height:46px;text-align: center;margin: auto; padding-top:10px; ">Usuarios</h1>
              <br/>
              <br/>
              <hr>
              <div class="row-fluid">
                <form method='post'>
                <fieldset>
                <legend>Registrar Usuarios</legend>
                <?php if(isset($mensaje)):?>
                <p style="color:blue"><?php echo $mensaje; ?></p>
                <?php endif?>
                <table>
                <tr>
                <td><label>Usuario</label></td>
                <td><input type="text" placeholder="..." name="usuario"></td>
            </tr>
                <tr>
                <td><label>Password</label></td>
               <td> <input type="password" placeholder="..." name="password"></td>
               </tr>
               <tr>
                <td><label>Nombres</label></td>
                <td><input type="text" placeholder="..." name="nombres"></td>
                </tr>
                <tr>
                <td><label>Apellidos</label></td>
                <td><input type="text" placeholder="..." name="apellidos"></td>
                </tr>
                <tr>
                <td><label>Perfil</label></td>
               <td> 
               <select name="Perfil_idPerfil" value="<?=$Perfil_idPerfil?>">
                    <option value="01">Administrador</option>
                    <option value="02">Cocinero</option>
                    <option value="03">Mozo</option>
                    <option value="04">Cajero</option>
                </select></td>
               </tr>
                </table>
                </br>
                <input type="submit" name="registrar" value ="Registrar" ><a href="<?php echo base_url() ;?>adm_usuarios" class="btn btn-danger">Cancelar</a>
                </fieldset>
                </form>
              </div><!--/row-->
            </div>
        </div>
    </div>

   
          
         
        

  </body>
</html>