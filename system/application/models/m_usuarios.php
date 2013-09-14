<?php
class Usuarios_model extends CI_Model{
   function ValidarUsuario($email,$password){         
      $query = $this->db->where('Usuario',$email);   
      $query = $this->db->where('Password',$password);
      $query = $this->db->get('Usuarios');
      return $query->row();   
   }
}
?>