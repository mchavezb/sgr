<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LAS MESAS DEL RESTAURANTE ---*/
  function get_mesas(){
    $q = "SELECT idMesa, mesa_num, mesa_estado, capacidad, client_mesa FROM mesa ;";
    $c = $this->db->query($q);
      return $c->result();  
  }
}

?>