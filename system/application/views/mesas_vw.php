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
            <?php foreach ($inf_mesas as $value){
    			echo "<div class='mesa'><a href='".$this->config->item('base_url')."index.php/comanda/m/".$value->idMesa."'><div class='bloque-mesa'></div><img src='".$this->config->item('base_url')."f/img/mesa";if($value->mesa_estado==0){echo "Libre";}elseif($value->mesa_estado==1){echo "Ocupada";}else{echo "Reservada";};echo ".png'><div class='num-mesa'><span># ".$value->mesa_num."</span></div><div class='capac-mesa'><span>Cap ".$value->client_mesa."/".$value->capacidad."</span></div></a></div>";
					}?>
            </div>
        </div>
    </div>
  </body>
</html>