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
        <div id="login-main">
            <img src="<?=$this->config->item('base_url')?>f/img/logo.png">
            <br>
            <span class="form-message">Por favor inicia sesión</span>
            <?php echo form_open('main/validation');
            echo '<span  class="form-error">'.validation_errors().'</span>';
            echo '<p class="form-labels">Usuario :'.form_input('username').'</p>';
            echo '<p class="form-labels">Contraseña :'.form_password('password').'</p>';
            echo '<p>'.form_submit('login_submit','Ingresar').'</p>';
            echo form_close();
            ?>
        </div>
    </div>
  </body>
</html>