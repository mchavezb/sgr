<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comanda_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LA COMANDA DE ACUERDO AL ID DE LA MESA SI ESTÁ EN PROCESO DE ATENCIÓN ---*/
    function get_comanda_by_table($id_mesa){
    	$q1 = "SELECT idComanda, fecha, Usuario_idUsuario, Mesa_idMesa, estado FROM comanda WHERE Mesa_idMesa = ".$id_mesa." AND ( estado = '0' OR estado = '3') ;";
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
        $q2 = $this->db->get();
        return $q2->result();
    }
    function add_new_comanda($idMesa,$idMozo){ //HAY QUE REVISAR LOS DOS PRIMEROS CAMPOS
        $q3 = "INSERT INTO comanda (`TipoComanda_idTipoComanda`,`Usuario_idUsuario`,`Mesa_idMesa`,`estado`) VALUES ('01','".$idMozo."','".$idMesa."','0')";
        $this->db->query($q3);
    }
    function finalizar_comanda($idcomanda){
        $q4 = "UPDATE comanda SET estado = 1 WHERE idComanda = '".$idcomanda."' ;";
        $this->db->query($q4);
    }
    function enviar_a_caja($idcom){
        $q5 = "UPDATE comanda SET estado = 3 WHERE idComanda = '".$idcom."' ;";
        $this->db->query($q5);
    }
    function listar_comandas(){
        $q6 = "SELECT * FROM comanda WHERE estado = 3;";
        $r6 = $this->db->query($q6);
        return $r6->result();
    }

    function cobrar_comanda($idcomanda){
        $q7 = "UPDATE comanda SET estado = 4 WHERE idComanda = '".$idcomanda."' ;";
        $this->db->query($q7);
    }
}

?>