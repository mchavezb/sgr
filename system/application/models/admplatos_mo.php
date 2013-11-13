<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admplatos_mo extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function listar_platos(){
      $query = $this->db->get('producto');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    return $data; 

  }

  
  function registrar_plato($id_producto,$p_nombre,$p_tiempoestimado,$p_precio,$TipoProducto_idTipoProducto){
    $this->db->where('idProducto',$id_plato);
    $data = array(
          'p_nombre' => $p_nombre ,
          'p_tiempoestimado' => $p_tiempoestimado ,
          'p_precio'=>$p_precio,
          'TipoProducto_idTipoProducto'=>$TipoProducto_idTipoProducto,
          
        );
    
    $this->db->insert('producto',$data);    
    return true;
    
    redirect('administracion/platos');

    }

    function eliminarPlato($id)
    {
      $this->db->where('idProducto', $id);
      $query=$this->db->delete('producto');
    }

    function modificar($id)
    {
      $this->db->where('idProducto', $id);
      $query=$this->db->get('producto');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    }

    function cambiarPlato($id,$data)
    {
      $this->db->where('idProducto', $id);
      $query=$this->db->update('producto',$data);
    }


     
  
}

?>