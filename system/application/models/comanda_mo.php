<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LA COMANDA DE ACUERDO AL ID DE LA MESA SI ESTÁ EN PROCESO DE ATENCIÓN ---*/
    function get_comanda_by_table($id_mesa){
    	$q1 = "SELECT idComanda, fecha, Usuario_idUsuario, Mesa_idMesa FROM comanda WHERE Mesa_idMesa = ".$id_mesa." AND estado = 'en proceso' ;";
    	$r1 = $this->db->query($q1);
            if($r1->num_rows()>0){
                return $r1->result_array();
            }
            else{
                return FALSE;
            }
  	}

    function get_detalle_comanda($id_c){
        $q5 = "SELECT idPedido, Producto_idProducto, estado FROM comandaxpedido WHERE Comanda_idComanda = ".$id_c.";";
        $r5 = $this->db->query($q5);
        return $r5->result();
    }

}

?>