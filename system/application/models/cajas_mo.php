<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cajas_mo extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  
  function insertar_caja($num_caja){
         $data = array(
          'num_caja' => $num_caja ,
        );

     
    $this->db->insert('caja', $data);
    

    return true;
    redirect('ventas/caja');
      
    
     
  }

  

    function modificar_caja(){
    $data = array(
         'num_caja' => $num_caja ,
       
            );
    $this->db->where('idCaja', $id_caja);
    $this->db->update('caja', $data); 

    }

    function eliminar_caja(){
      $this->db->where('idCaja', $id_caja);
    $this->db->delete('caja'); 

    }

    function seleccionar_caja(){
      $query = $this->db->get('caja');
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