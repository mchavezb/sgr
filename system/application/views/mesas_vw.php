<?php
foreach ($inf_mesas as $value){
    echo "<div class='mesa'><a href='".$this->config->item('base_url')."index.php/comanda/m/".$value->idMesa."'><div class='bloque-mesa'></div><img src='".$this->config->item('base_url')."f/img/mesa";if($value->mesa_estado==0){echo "Libre";}elseif($value->mesa_estado==1){echo "Ocupada";}else{echo "Reservada";};echo ".png'><div class='num-mesa'><span># ".$value->mesa_num."</span></div><div class='capac-mesa'><span>Cap ".$value->client_mesa."/".$value->capacidad."</span></div></a></div>";
	}
?>