<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LAS MESAS DEL RESTAURANTE ---*/
  function get_mesas(){
    $q2 = "SELECT idMesa, mesa_num, mesa_estado, capacidad, client_mesa FROM mesa ;";
    $r2 = $this->db->query($q2);
      return $r2->result();  
  }
  /*--- OBTIENE LOS DATOS DE LA MESA DE ACUERDO AL ID ---*/
  function get_mesa_by_id($idMesa){
  	$q3 = "SELECT mesa_num, mesa_estado, capacidad, client_mesa FROM mesa WHERE idMesa = ".$idMesa.";";
  	$r3 = $this->db->query($q3);
  		return $r3->result_array();
  }
}

?>