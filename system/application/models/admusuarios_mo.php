<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admusuarios_mo extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function listar_usuario(){
      $query = $this->db->get('usuario');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    return $data; 

  }

  
  function registrar_usuario($id_usuario,$usuario,$password,$nombres,$apellidos,$perfil){
    $this->db->where('idUsuario',$id_usuario);
    $data = array(
          'usuario' => $usuario ,
          'password' => $password ,
          'nombres'=>$nombres,
          'apellidos'=>$apellidos,
          'Perfil_idPerfil'=>$perfil
        );
    
    $this->db->insert('usuario',$data);    
    return true;
    
    redirect('administracion/usuarios');

    }

    function eliminarUsuario($id)
    {
      $this->db->where('idUsuario', $id);
      $query=$this->db->delete('usuario');
    }

    function modificar($id)
    {
      $this->db->where('idUsuario', $id);
      $query=$this->db->get('usuario');
      if($query->num_rows() > 0 )
       {
         return $query;
      }else{
        return FALSE;
      }
    }

    function cambiarUsuario($id,$data)
    {
      $this->db->where('idUsuario', $id);
      $query=$this->db->update('usuario',$data);
    }


     
  
}

?>