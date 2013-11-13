<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

  
	function insertar_reserva($fecha,$num_personas,$id_mesa,$id_usuario,$cliente){
		$data = array(
  		 'fecha' => $fecha ,
  		 'numero_personas' => $num_personas ,
  		 'Mesa_idMesa' => $id_mesa,
  		 'Usuario_idUsuario' => $id_usuario,
  		 #'cliente'=>$cliente
		);
		var_dump($data);
		//die();
		return true;
		#return $this->db->insert('reserva', $data); 

	}

    function modificar_reserva(){
		$data = array(
         'fecha' => $fecha ,
  		 'numero_personas' => $num_personas ,
  		 'Mesa_idMesa' => $id_mesa,
  		 'Usuario_idUsuario' => $id_usuario,
  		 'cliente'=>$cliente
            );
		$this->db->where('id_reserva', $id_reserva);
		$this->db->update('reserva', $data); 

    }

    function eliminar_reserva(){
    	$this->db->where('id_reserva', $id_reserva);
		$this->db->delete('reserva'); 

    }

    function seleccionar_reserva(){
    	$query = $this->db->get('reserva');
    	$data=array();
    	foreach ($query->result() as $row)
		{
   			$fecha = $row->fecha;
  		 	$numero_personas = $row->num_personas;
  		 	$Mesa_idMesa = $row->id_mesa;
  		    $Usuario_idUsuario = $row->id_usuario;
  		 	$cliente=$row->cliente;
  		 	$data[] = array('fecha'=>$fecha,'numero_personas'=>$numero_personas,'Mesa_idMesa'=>$Mesa_idMesa,'Usuario_idUsuario'=>$Usuario_idUsuario,'cliente'=>$cliente);
		}
		return $data;
	}

}

?>