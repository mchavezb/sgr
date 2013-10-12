<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LOS DATOS DEL PRODUCTO DE ACUERDO AL ID ---*/
    function get_producto_by_id($id_p){
    	$q1 = "SELECT * FROM producto WHERE idProducto = ".$id_p.";";
    	$r1 = $this->db->query($q1);
            if($r1->num_rows()>0){
                return $r1->result();
            }
            else{
                return FALSE;
            }
  	}
    function get_producto_like_name($term){
        $this->db->select('*');  
        $this->db->from('producto');
        $this->db->like('p_nombre', $term);
        $q2 = $this->db->get();
        return $q2->result();
    }

    function add_prod($com,$prod){
        $q3 = "INSERT INTO comandaxpedido(`Comanda_idComanda`,`Producto_idProducto`,`estado`) values('".$com."','".$prod."','0')";
        $i = $this->db->query($q3);
    }

    function listar_cat(){
        $q4 = "SELECT idTipoProducto, descripcion FROM tipoproducto" ;
        $r4 = $this->db->query($q4);
        return $r4->result_array();
    }

    function get_producto_by_cat($id){
        $q5 = "SELECT * FROM producto WHERE TipoProducto_idTipoProducto = ".$id.";";
        $r5 = $this->db->query($q5);
            if($r5->num_rows()>0){
                return $r5->result();
            }
            else{
                return FALSE;
            }
    }
}

?>