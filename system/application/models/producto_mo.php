<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LOS DATOS DEL PRODUCTO DE ACUERDO AL ID ---*/
    function get_producto_by_id($id_p){
    	$q6 = "SELECT * FROM producto WHERE idProducto = ".$id_p.";";
    	$r6 = $this->db->query($q6);
            if($r6->num_rows()>0){
                return $r6->result();
            }
            else{
                return FALSE;
            }
  	}
    function get_producto_like_name($term){
        $this->db->select('*');  
        $this->db->from('producto');
        $this->db->like('p_nombre', $term);
        $q7 = $this->db->get();
        return $q7->result();
    }

    function add_prod($com,$prod){
        $q8 = "INSERT INTO comandaxpedido(`Comanda_idComanda`,`Producto_idProducto`,`estado`) values('".$com."','".$prod."','0')";
        $i = $this->db->query($q8);
    }
}

?>