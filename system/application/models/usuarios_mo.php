<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LOS DATOS DEL USUARIO DE ACUERDO AL ID ---*/
  function get_usuario_by_idusuario($id){
  	$q4 = "SELECT nombres, apellidos FROM usuario WHERE idUsuario = ".$id.";";
  	$r4 = $this->db->query($q4);
  		return $r4->result_array();
  }
}

?>