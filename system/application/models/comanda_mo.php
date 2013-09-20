<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LA COMANDA DE ACUERDO AL ID DE LA MESA SI ESTÁ EN PROCESO DE ATENCIÓN ---*/
    function get_comanda_by_table($id_mesa){
    	$q = "SELECT idComanda, fecha, Usuario_idUsuario, Mesa_idMesa FROM comanda WHERE Mesa_idMesa = ".$id_mesa." AND estado = 'en proceso' ;";
    	$r = $this->db->query($q);
            if($r->num_rows()>0){
                return $r->result();
            }
            else{
                return FALSE;
            }
  	}

}

?>