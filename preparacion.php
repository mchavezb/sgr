<?php $enprep = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_2.json"));
                if(isset($enprep->inf_ped2) && !empty($enprep->inf_ped2)){
                  foreach ($enprep->inf_ped2 as $key => $value) {
                    echo '<div class="platos"><form style="display: inline;" method="post" action="http://localhost/sgr/pedidos/terminar"><div class="platos-carta">'.$value->p_nombre.' - '.$value->nota.'</div><div class="platos-cont"><div class="platos-cocinero">cocinero 1 </div><div class="platos-mesa">MESA N°'.$value->mesa_num.'<input type="hidden" id="idPedido" name="idPedido" value="'.$value->idPedido.'"><input type="submit" value="TERMINAR"></div></div><div class="platos-tiempo"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></form></div>';
                  }
                }
                ?>