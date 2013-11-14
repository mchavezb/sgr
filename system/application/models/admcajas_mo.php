<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admcajas_mo extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function listar_caja(){
      $query = $this->db->get('caja');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    return $data; 

  }

  
  function registrar_caja($caja_numero){
    $this->db->where('caja_numero',$caja_numero);
    $query = $this->db->get('caja');
    $data = array(
          'caja_numero' => $caja_numero ,
          
        );
    
    if($query->num_rows() > 0)
    {
      return FALSE;
    }
    else
    {
    $this->db->insert('caja', $data);
      return TRUE;
    }

    }

    function eliminarCaja($id)
    {
      $this->db->where('idCaja', $id);
      $query=$this->db->delete('caja');
    }

    function modificar($id)
    {
      $this->db->where('idCaja', $id);
      $query=$this->db->get('caja');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    }

    function cambiarCaja($id,$data)
    {
      $this->db->where('idCaja', $id);
      $query=$this->db->update('caja',$data);
    }


     
  
}

?>