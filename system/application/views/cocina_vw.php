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
        <div id="content-encolados">
          <h2>Platos en cola</h2>
          <?php $encolados = json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json"));
                $platos = $encolados->inf_ped1;
                foreach ($platos as $key => $value) {
                  echo $value->p_nombre.' - '.$value->nota.' - '.$value->hora.' - Mesa '.$value->mesa_num.'<br>';
                }
                ?>
        </div>
        <div id="content-en-atencion"><h2>En preparación</h2></div>
        <div id="content-terminados"><h2>Terminados</h2></div>
    </div>



    <div id="container">
            
    </div>



  </body>
</html>