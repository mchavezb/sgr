<?php //$terminados = @json_decode(file_get_contents("C://xampp/htdocs/sgr/data/data_pedidos_3.json"));

				//$dato3['inf_ped3'] = $this->pedidos_mo->get_pedidos(3);
				$q3 = "SELECT comandaxpedido.idPedido, comandaxpedido.nota, comandaxpedido.TipoAtencion_idTipoAtencion, comandaxpedido.hora, producto.p_nombre, producto.p_tiempoestimado, comanda.Mesa_idMesa, mesa.mesa_num FROM comandaxpedido INNER JOIN producto ON comandaxpedido.Producto_idProducto = producto.idProducto INNER JOIN comanda ON comandaxpedido.Comanda_idComanda = comanda.idComanda INNER JOIN mesa ON comanda.Mesa_idMesa = mesa.mesa_num WHERE comandaxpedido.estado = '3' ;";
				//mysql_connect("localhost","root","","sgr");
				$return="";
				
				$link = mysqli_connect("localhost", "root", "", "sgr");	
				
				//$mysqli = ConexionBD::ConexBD();
				$rs = mysqli_query($link,$q3);
				
				/* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
				while($row = mysqli_fetch_array($rs, MYSQLI_ASSOC)) {				
					$return .= '<div class="platos-m"><form style="display: inline;" method="post" action="http://localhost/sgr/pedidos/servir">';
					$return .= '<div class="platos-carta-m">';
					$return .= $row["p_nombre"].' - '.$row["nota"].' - '; 
					if($row["TipoAtencion_idTipoAtencion"]=='00')
					{
						$return .= 'p/p';
					}
					else
					{
						$return .= 'o/c';
					}
					$return .= '</div><div class="platos-cont-m"><div class="platos-cocinero-m">';
					$return .= 'MESA N° '.$row["mesa_num"].'</div><div class="platos-mesa-m">';
					$return .= '<input type="hidden" id="idPedido" name="idPedido" value="'.$row["idPedido"].'">';
					$return .= '<input type="submit" value="SERVIDO"></div></div><div class="platos-tiempo-m">';
					$return .= '<span class="minuto luzu">'.date('i:s',time() - strtotime($row["hora"])).'</span></div></form></div>';
				}

				//$mysqli->close();
				
				
				
				
				/*$r3 = $this->db->query($q3);
					if($r3->num_rows()>0){
						return $r3->result_array();
					}
					else{
						return FALSE;
					}
                if(isset($terminados->inf_ped3) && !empty($terminados->inf_ped3)){
                  foreach ($terminados->inf_ped3 as $key => $value) {
                    echo '<div class="platos-m"><form style="display: inline;" method="post" action="http://localhost/sgr/pedidos/servir"><div class="platos-carta-m">'.$value->p_nombre.' - '.$value->nota.' - '; if($value->TipoAtencion_idTipoAtencion=='00'){echo 'p/p';}else{echo 'o/c';}echo ' </div><div class="platos-cont-m"><div class="platos-cocinero-m">MESA N° '.$value->mesa_num.'</div><div class="platos-mesa-m"><input type="hidden" id="idPedido" name="idPedido" value="'.$value->idPedido.'"><input type="submit" value="SERVIDO"></div></div><div class="platos-tiempo-m"><span class="minuto luzu">'.date('i:s',time() - strtotime($value->hora)).'</span></div></form></div>';
                  }
                }*/
				
				echo($return);
                ?>