<?php $terminados = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_3.json"));
                if(isset($terminados->inf_ped3) && !empty($terminados->inf_ped3)){
                  foreach ($terminados->inf_ped3 as $key => $value) {
                    echo '<div class="platos-m"><form style="display: inline;" method="post" action="http://localhost/sgr/pedidos/servir"><div class="platos-carta-m">'.$value->p_nombre.' - '.$value->nota.' - '; if($value->TipoAtencion_idTipoAtencion=='00'){echo 'p/p';}else{echo 'o/c';}echo ' </div><div class="platos-cont-m"><div class="platos-cocinero-m">MESA N° '.$value->mesa_num.'</div><div class="platos-mesa-m"><input type="hidden" id="idPedido" name="idPedido" value="'.$value->idPedido.'"><input type="submit" value="SERVIDO"></div></div><div class="platos-tiempo-m"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></form></div>';
                  }
                }
                ?>