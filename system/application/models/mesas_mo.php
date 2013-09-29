<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

  /*--- OBTIENE LAS MESAS DEL RESTAURANTE ---*/
  function get_mesas(){
    $q2 = "SELECT idMesa, mesa_num, mesa_estado, capacidad, client_mesa FROM mesa WHERE mesa_estado < 3;";
    $r2 = $this->db->query($q2);
      return $r2->result();  
  }
  /*--- OBTIENE LOS DATOS DE LA MESA DE ACUERDO AL ID ---*/
  function get_mesa_by_id($idMesa){
  	$q3 = "SELECT mesa_num, mesa_estado, capacidad, client_mesa FROM mesa WHERE idMesa = ".$idMesa.";";
  	$r3 = $this->db->query($q3);
  		return $r3->result_array();
  }
  function update_mesa_est($idMesa){
    $q10 = "UPDATE mesa SET mesa_estado = 1 WHERE idMesa = '".$idMesa."' ;";
        $this->db->query($q10);
  }
  /*--- ACTUALIZA EL ID A 1=OCUPADA Y COLOCA LA COMANDA COMO REFERENCIA ---*/
  function update_mesa_est1_ref($idCom,$idMesa){
    $q11 = "UPDATE mesa SET mesa_estado = 1 , ref = '$idCom' WHERE idMesa = '".$idMesa."' ;";
        $this->db->query($q11);
  }
  /*--- ACTUALIZA EL ID A 3=JUNTADA Y COLOCA LA COMANDA COMO REFERENCIA ---*/
  function update_mesa_est3_ref($idCom,$idMesa){
    $q12 = "UPDATE mesa SET mesa_estado = 3 , ref = '$idCom' WHERE idMesa = '".$idMesa."' ;";
        $this->db->query($q12);
  }
  /*--- ACTUALIZA EL ID A 0=LIBRE --------------------------*/
  function update_mesa_est0($idMesa){
    $q16 = "UPDATE mesa SET mesa_estado = 0 WHERE idMesa = '".$idMesa."' ;";
        $this->db->query($q16);
  }
  /*--- ACTUALIZA EL ID A 0=LIBRE Y BORRA REFERENCIA DE COMANDA ---*/
  function update_mesa_est0_ref($idCom){
    $q17 = "UPDATE mesa SET mesa_estado = 0 , ref = '00000000' WHERE ref = '".$idCom."' ;";
        $this->db->query($q17);
  }
  /*--- ACTUALIZA EL ID A 0=LIBRE AÚN NO INTERACTÚA CON VENTAS FASE 2 ---*/
  function update_mesa_desocupar($idCom,$idMesa){
    $q14 = "UPDATE mesa SET mesa_estado = 3 , ref = '$idCom' WHERE idMesa = '".$idMesa."' ;";
        $this->db->query($q14);
  }
  /*--- OBTIENE EL ID DE LA MESA DE ACUERDO AL NÚMERO DE LA MESA ---*/
  function get_mesaid_by_number($num_m){
    $q13 = "SELECT idMesa FROM mesa WHERE mesa_num = '".$num_m."';";
        $this->db->query($q13);
        return $r13->result_array();
  }

}
?>