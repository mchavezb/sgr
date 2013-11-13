<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LOS DATOS DEL USUARIO DE ACUERDO AL ID ---*/
  function get_usuario_by_idusuario($id){
  	$q1 = "SELECT idUsuario, nombres, apellidos FROM usuario WHERE idUsuario = ".$id.";";
  	$r1 = $this->db->query($q1);
  		return $r1->result_array();
  }

  function validar_usuario(){
  	$this->db->where('usuario',$this->input->post('username'));
  	$this->db->where('password',md5($this->input->post('password')));
  	$q2 = $this->db->get('usuario');
  	if($q2->num_rows()==1){
  		return true;
  	}else{
  		return false;
  	}
  }

  function get_usuario_by_username($us){
  	$this->db->where('usuario',$us);
    $q3 = $this->db->get('usuario');
        return $q3->result_array();
  }

  function get_usuario_by_idperfil($idperf){
    $q4 = "SELECT idUsuario, nombres, apellidos FROM usuario WHERE Perfil_idPerfil = ".$idperf.";";
    $r4 = $this->db->query($q4);
    if($r4->num_rows()>0){
      return $r4->result_array();
    }else{
      return FALSE;
    }
  }
  function activar_us($idUsuario){
    $q5 = "UPDATE usuario SET activo = '1' WHERE idUsuario = '".$idUsuario."' ;";
        $this->db->query($q5);
  }
  function desactivar_us($idUsuario){
    $q5 = "UPDATE usuario SET activo = '0' WHERE idUsuario = '".$idUsuario."' ;";
        $this->db->query($q5);
  }

  function log_usuario($idUsuario,$idlog){
    $q6 = "INSERT INTO log_usuarios (`id_usuario`,`idevento`) VALUES ('".$idUsuario."','".$idlog."')";
    $this->db->query($q6);
  }
  function check_user_caja($id_usuario){
    $q7 = "SELECT * FROM operaciones_caja WHERE Usuario_idUsuario = '".$id_usuario."' AND estado_caja = 0;" ;
    $r7 = $this->db->query($q7);
        return $r7->result_array();

  }
}
?>