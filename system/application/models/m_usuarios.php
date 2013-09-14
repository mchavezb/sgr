<?php
class Usuarios_model extends CI_Model{
   function ValidarUsuario($email,$password){         
      $query = $this->db->where('usuario',$email);   
      $query = $this->db->where('password',$password);
      $query = $this->db->get('Usuarios');
      return $query->row();   
   }
}
?>