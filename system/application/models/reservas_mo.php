<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
		$this->load->database();
	}

  
	function insertar_reserva($fecha,$num_personas,$id_mesa,$id_usuario,$cliente){
    $this->db->where('idMesa',$id_mesa);
    $query=$this->db->get('mesa');
    foreach ($query->result() as $row) {
      if($row->mesa_estado==0){
        $data = array(
          'fecha' => $fecha ,
          'numero_personas' => $num_personas ,
          'Mesa_idMesa' => $id_mesa,
          'Usuario_idUsuario' => $id_usuario,
          'nom_cliente'=>$cliente
        );
        
    return $this->db->insert('reserva2', $data);
    $data2=array('idMesa',2);
    $this->db->update('mesa',$data2);
    redirect('ventas/reservas');
      }else{
        return false;
      }
    }

		 
  }

	

    function modificar_reserva(){
		$data = array(
         'fecha' => $fecha ,
  		 'numero_personas' => $num_personas ,
  		 'Mesa_idMesa' => $id_mesa,
  		 'Usuario_idUsuario' => $id_usuario,
  		 'nom_cliente'=>$cliente
            );
		$this->db->where('idReserva2', $id_reserva);
		$this->db->update('reserva2', $data); 

    }

    function eliminar_reserva(){
    	$this->db->where('idReserva2', $id_reserva);
		$this->db->delete('reserva2'); 

    }

    function seleccionar_reserva(){
    	$query = $this->db->get('reserva2');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
    	}
    return $data; 

	}

    function modificar($id)
    {
      $this->db->where('idReserva2', $id);
      $query=$this->db->get('reserva2');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    }

    function cambiarReserva($id,$data)
    {
      $this->db->where('idReserva2', $id);
      $query=$this->db->update('reserva2',$data);
    }

    function cancelarReserva($id)
    {
      $this->db->where('idReserva2', $id);
      $query=$this->db->delete('reserva2');
    }


}

?>