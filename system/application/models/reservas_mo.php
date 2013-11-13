<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reservas_mo extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  
  function insertar_reserva($fecha,$num_personas,$id_mesa,$id_usuario,$nombre_cliente){
         $data = array(
          'fecha' => $fecha ,
          'numero_personas' => $num_personas ,
          'Mesa_idMesa' => $id_mesa,
          'Usuario_idUsuario' => $id_usuario,
          'nombre_cliente'=>$nombre_cliente
        );

     
    $this->db->insert('reserva', $data);
    $dat=array('mesa_estado'=>2);
    $this->db->where('mesa_num',$id_mesa);
    $this->db->update('mesa',$dat);

    return true;
    redirect('ventas/reservas');
      
    
     
  }

  

    function modificar_reserva(){
    $data = array(
         'fecha' => $fecha ,
       'numero_personas' => $num_personas ,
       'Mesa_idMesa' => $id_mesa,
       'Usuario_idUsuario' => $id_usuario,
       'nombre_cliente'=>$cliente
            );
    $this->db->where('idReserva', $id_reserva);
    $this->db->update('reserva', $data); 

    }

    function eliminar_reserva(){
      $this->db->where('idReserva', $id_reserva);
    $this->db->delete('reserva'); 

    }

    function seleccionar_reserva(){
      $query = $this->db->get('reserva');
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
      $this->db->where('idReserva', $id);
      $query=$this->db->get('reserva');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    }

    function cambiarReserva($id,$data)
    {
      $this->db->where('idReserva', $id);
      $query=$this->db->update('reserva',$data);
    }

    function cancelarReserva($id)
    {
      $this->db->where('idReserva', $id);
      $query=$this->db->delete('reserva');
    }

    function validar_mesa($id_mesa)
    {
      $this->db->where('mesa_num', $id_mesa);
      $query=$this->db->get('mesa');
      return $query;

    }


}

?>