<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LA COMANDA DE ACUERDO AL ID DE LA MESA SI ESTÁ EN PROCESO DE ATENCIÓN ---*/
    function get_comanda_by_table($id_mesa){
    	$q1 = "SELECT idComanda, fecha, Usuario_idUsuario, Mesa_idMesa FROM comanda WHERE Mesa_idMesa = ".$id_mesa." AND estado = '0' ;";
    	$r1 = $this->db->query($q1);
            if($r1->num_rows()>0){
                return $r1->result_array();
            }
            else{
                return FALSE;
            }
  	}

    function get_detalle_comanda($id_c){
        $this->db->select('*');  
        $this->db->from('comandaxpedido');  
        $this->db->join('producto','comandaxpedido.Producto_idProducto = producto.idProducto','INNER'); 
        $this->db->where('comandaxpedido.Comanda_idComanda',$id_c);
        $q5 = $this->db->get();
        return $q5->result();
    }
    function add_new_comanda($idMesa,$idMozo){ //HAY QUE REVISAR LOS DOS PRIMEROS CAMPOS
        $q9 = "INSERT INTO comanda (`Comprobante_idComprobante`,`TipoComanda_idTipoComanda`,`Usuario_idUsuario`,`Mesa_idMesa`,`estado`) VALUES ('01','01','".$idMozo."','".$idMesa."','0')";
        $this->db->query($q9);
    }
}

?>