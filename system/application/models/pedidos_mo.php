<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pedidos_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    function get_pedidos0_by_com($com){
        $q1 = "SELECT idPedido FROM comandaxpedido WHERE estado = 0 AND Comanda_idComanda = ".$com.";";
        $r1 = $this->db->query($q1);
            if($r1->num_rows()>0){
                return $r1->result_array();
            }
            else{
                return FALSE;
            }
    }

    function env_ped_cocina($idped){
        $q2 = "UPDATE comandaxpedido SET estado = 1 WHERE idPedido = '".$idped."' ;";
        $this->db->query($q2);
    }

    function get_pedidos($n){
        $q3 = "SELECT comandaxpedido.idPedido, comandaxpedido.nota, comandaxpedido.hora, producto.p_nombre, producto.p_tiempoestimado, comanda.Mesa_idMesa, mesa.mesa_num FROM comandaxpedido INNER JOIN producto ON comandaxpedido.Producto_idProducto = producto.idProducto INNER JOIN comanda ON comandaxpedido.Comanda_idComanda = comanda.idComanda INNER JOIN mesa ON comanda.Mesa_idMesa = mesa.mesa_num WHERE comandaxpedido.estado = '".$n."' ;";
        $r3 = $this->db->query($q3);
            if($r3->num_rows()>0){
                return $r3->result_array();
            }
            else{
                return FALSE;
            }
    }

    function preparar_pedido($idped){
        $q4 = "UPDATE comandaxpedido SET estado = 2 WHERE idPedido = '".$idped."' ;";
        $this->db->query($q4);
    }

    function terminar_pedido($idped){
        $q5 = "UPDATE comandaxpedido SET estado = 3 WHERE idPedido = '".$idped."' ;";
        $this->db->query($q5);
    }
    function servir_pedido($idped){
        $q6 = "UPDATE comandaxpedido SET estado = 4 WHERE idPedido = '".$idped."' ;";
        $this->db->query($q6);
    }

    function agregar_nota($nota, $idped){
        $q7 = "UPDATE comandaxpedido SET nota = '".$nota."' WHERE idPedido = '".$idped."';";
        $this->db->query($q7);  
    }
<<<<<<< HEAD
    function eliminar_pedido($idped){
        $q8 = "UPDATE comandaxpedido SET estado = 5 WHERE idPedido = '".$idped."' ;";
        $this->db->query($q8);
    }
=======
>>>>>>> 9b38beca98ee6c1d4230643bb4fe1d6db26b32d0
  /*--- 
    function add_prod($com,$prod){
        $q8 = "INSERT INTO comandaxpedido(`Comanda_idComanda`,`Producto_idProducto`,`estado`) values('".$com."','".$prod."','0')";
        $i = $this->db->query($q8);
    }

    function finalizar_comanda($idcomanda){
        $q15 = "UPDATE comanda SET estado = 1 WHERE idComanda = '".$idcomanda."' ;";
        $this->db->query($q15);
    } */
}

?>