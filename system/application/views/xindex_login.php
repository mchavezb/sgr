<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css">
    <script type='text/javascript' src='<?=$this->config->item('base_url')?>f/js/jquery-1.10.2.js'></script>
  </head>

  <body>

    <div class="container">

      <form class="form-signin" method="post">
		<img src="f/img/logo.png" alt="">
        <h2 class="form-signin-heading">SGR</h2>
        <input type="text" class="input-block-level" placeholder="Usuario" name="usuario">
        <input type="password" class="input-block-level" placeholder="Contraseña" name="password">
        <button class="btn btn-large btn-primary" type="submit">Iniciar Sesión</button>
      </form>

    </div> 
  </body>
</html>
