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
        $q6 = "UPDATE comandaxpedido SET estado = 6 WHERE Comanda_idComanda = '".$idcom."' ;";
        $this->db->query($q6);
    }
    function listar_comandas(){
        $q7 = "SELECT * FROM comanda WHERE estado = 3;";
        $r7 = $this->db->query($q7);
        return $r7->result();
    }

    function cobrar_comanda($idcomanda){
        /*$q7 = "UPDATE comanda SET estado = 4 WHERE idComanda = '".$idcomanda."' ;";query original
        $this->db->query($q7);*/
        $q8 = "UPDATE comanda SET estado = 4 WHERE idComanda = '".$idcomanda."' ;";
        $this->db->query($q8);
    }

    function list_comxped_e6(){
        $q9 = "SELECT comandaxpedido.idPedido, comandaxpedido.Comanda_idComanda, comandaxpedido.Producto_idProducto, producto.p_precio FROM comandaxpedido INNER JOIN producto ON comandaxpedido.Producto_idProducto = producto.idProducto WHERE estado = 6;";
        $r9 = $this->db->query($q9);
        return $r9->result();
    }

    function act_mozo_com($idmozo , $idcomanda){
        $q10 = "UPDATE comanda SET Usuario_idUsuario = '".$idmozo."' WHERE idComanda = '".$idcomanda."' ;";
        $this->db->query($q10);

    }
}

?>