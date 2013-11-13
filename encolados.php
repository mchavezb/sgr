<?php $encolados = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_1.json"));
                if(isset($encolados->inf_ped1) && !empty($encolados->inf_ped1)){
                  foreach ($encolados->inf_ped1 as $key => $value) {
                    echo '<div class="platos"><form style="display: inline;" method="post" action="http://localhost/sgr/pedidos/preparar"><div class="platos-carta">'.$value->p_nombre.' - '.$value->nota.' - '; if($value->TipoAtencion_idTipoAtencion=='00'){echo 'p/p';}else{echo 'o/c';}echo ' </div><div class="platos-cont"><div class="platos-cocinero"><select><option value="cocinero1">cocinero 1</option><option>cocinero 2</option></select></div><div class="platos-mesa">MESA N°'.$value->mesa_num.'<input type="hidden" id="idPedido" name="idPedido" value="'.$value->idPedido.'"><input type="submit" value="ACEPTAR"></div></div><div class="platos-tiempo"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></form></div>';

                  }
                }
                ?>