<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admmesas_mo extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function listar_mesa(){
      $query = $this->db->get('mesa');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    return $data; 

  }

  
  function registrar_mesa($id_mesa,$mesa_num,$capacidad){
    $this->db->where('mesa_num',$mesa_num);
    $query = $this->db->get('mesa');
    $data = array(
          'mesa_num' => $mesa_num ,
          'capacidad' => $capacidad ,
          'mesa_estado'=>0,
          'client_mesa'=>0,
          'ref'=>0
        );
    
    if($query->num_rows() > 0)
    {
      return FALSE;
    }
    else
    {
    $this->db->insert('mesa', $data);
      return TRUE;
    }

    }

    function eliminarMesa($id)
    {
      $this->db->where('idMesa', $id);
      $query=$this->db->delete('mesa');
    }

    function modificar($id)
    {
      $this->db->where('idMesa', $id);
      $query=$this->db->get('mesa');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    }

    function cambiarMesa($id,$data)
    {
      $this->db->where('idMesa', $id);
      $query=$this->db->update('mesa',$data);
    }


     
  
}

?>