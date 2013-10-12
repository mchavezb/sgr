<?php setlocale(LC_TIME,"es_ES", "es_ES.utf8");?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="<?=$this->config->item('base_url')?>f/css/stylev2.css?v2">
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
          <?php $encolados = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json"));
                if(isset($encolados->inf_ped1) && !empty($encolados->inf_ped1)){
                  
                 
                  foreach ($encolados->inf_ped1 as $key => $value) {

                   




                    echo '<div class="platos"><form style="display: inline;" method="post" action="'.base_url().'pedidos/preparar"><div class="platos-carta">'.$value->p_nombre.' - '.$value->nota.'</div><div class="platos-cont"><div class="platos-cocinero"><select><option value="cocinero1">cocinero 1</option><option>cocinero 2</option></select></div><div class="platos-mesa">MESA N°'.$value->mesa_num.'<input type="hidden" id="idPedido" name="idPedido" value="'.$value->idPedido.'"><input type="submit" value="ACEPTAR"></div></div><div class="platos-tiempo"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></form></div>';



                  }


            
                }
                ?>
          
          <!--<div id="data-encolados"></div>-->
        </div>
        <div id="content-en-atencion">
          <h2>En preparación</h2>
          <?php $enprep = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_2.json"));
                if(isset($enprep->inf_ped2) && !empty($enprep->inf_ped2)){
                  foreach ($enprep->inf_ped2 as $key => $value) {
                    echo '<div class="platos"><form style="display: inline;" method="post" action="'.base_url().'pedidos/terminar"><div class="platos-carta">'.$value->p_nombre.' - '.$value->nota.'</div><div class="platos-cont"><div class="platos-cocinero">cocinero 1 </div><div class="platos-mesa">MESA N°'.$value->mesa_num.'<input type="hidden" id="idPedido" name="idPedido" value="'.$value->idPedido.'"><input type="submit" value="TERMINAR"></div></div><div class="platos-tiempo"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></form></div>';
                  }
                }
                ?>
          
          <!--<div id="data-preparacion"></div>-->



        </div>
        <div id="content-terminados">
          <h2>Terminados</h2>
          <?php $terminados = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_3.json"));
                if(isset($terminados->inf_ped3) && !empty($terminados->inf_ped3)){
                  foreach ($terminados->inf_ped3 as $key => $value) {
                    echo '<div class="platos"><div class="platos-carta">'.$value->p_nombre.' - '.$value->nota.'</div><div class="platos-cont"><div class="platos-cocinero">cocinero 1</div><div class="platos-mesa">MESA N°'.$value->mesa_num.'</div></div><div class="platos-tiempo"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></div>';
                  }
                }
                ?>

        <!--<div id="data-terminados"></div>-->

        </div>
    </div>
  <!--<script>
    $(document).ready(function(){
      $('#data-encolados').load('encolados.php');
      refresh();
    });
    function refresh(){
      setTimeout(function(){
        $('#data-encolados').load('encolados.php');
        refresh();
      },1000);
    }
  </script>
   <script>
    $(document).ready(function(){
      $('#data-preparacion').load('preparación.php');
      refresh();
    });
    function refresh(){
      setTimeout(function(){
        $('#data-preparacion').load('preparacion.php');
        refresh();
      },1000);
    }
  </script>
   <script>
    $(document).ready(function(){
      $('#data-terminados').load('terminados.php');
      refresh();
    });
    function refresh(){
      setTimeout(function(){
        $('#data-terminados').load('terminados.php');
        refresh();
      },1000);
    }
  </script>-->
  <script>
  $(document).ready(function(){
    setInterval(function(){
      var minuto = $(".minuto");
    if(minuto.hasClass('on')){
      minuto.removeClass("on");
    }else{
      minuto.addClass("luzu on");
    }},500);
  });
  </script>
  </body>
</html>