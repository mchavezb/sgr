<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery_mo extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

  
	function insertar_delivery($fecha,$cliente,$direccion,$distrito,$telefono){
		$data = array(
  		 'fecha' => $fecha ,
  		 'cliente' => $cliente ,
  		 'direccion' => $direccion,
  		 'distrito' => $distrito,
  		 'telefono'=>$telefono
		);
		var_dump($data);
		//die();
		return true;
		#return $this->db->insert('reserva', $data); 

	}

    function modificar_delivery(){
		$data = array(
       'fecha' => $fecha ,
  		 'cliente' => $cliente ,
  		 'direccion' => $direccion,
  		 'distrito' => $distrito,
  		 'telefono'=>$telefono
            );
		$this->db->where('id_delivery', $id_delivery);
		$this->db->update('delivery', $data); 

    }

    function eliminar_delivery(){
    	$this->db->where('id_delivery', $id_delivery);
		$this->db->delete('delivery'); 

    }

    function listar_delivery(){
    	$query = $this->db->get('delivery');
      return $query->result();
    	//$data=array();

      /*if($query->num_rows() >0){
    	foreach ($query->result() as $row)
		  {
   			$fecha = $row->fecha;
  		 	$cliente = $row->cliente;
  		 	$direccion = $row->direccion;
  		  $distrito = $row->distrito;
  		 	$telefono=$row->telefono;
  		 	$data[] = array('fecha'=>$fecha,'cliente'=>$cliente,'direccion'=>$direccion,'distrito'=>$distrito,'telefono'=>$telefono);
		  }
      }
		  return $data;*/
	}

}

?>