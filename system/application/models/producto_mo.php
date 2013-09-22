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

}

?>