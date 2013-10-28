<?php $terminados = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_3.json"));
                if(isset($terminados->inf_ped3) && !empty($terminados->inf_ped3)){
                  foreach ($terminados->inf_ped3 as $key => $value) {
                    echo '<div class="platos"><div class="platos-carta">'.$value->p_nombre.' - '.$value->nota.'</div><div class="platos-cont"><div class="platos-cocinero">cocinero 1</div><div class="platos-mesa">MESA N°'.$value->mesa_num.'</div></div><div class="platos-tiempo"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></div>';
                  }
                }
                ?>