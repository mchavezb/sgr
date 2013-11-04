<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Caja_mo extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->load->database();
  }

  function ing_apert($id_usuario, $id_caja, $soles_inicio, $dolares_inicio){
    $q1 = "INSERT INTO operaciones_caja (`id_caja`,`id_tipo_reg`,`soles`,`dolares`,`Usuario_idUsuario`,`estado_caja`) VALUES ('".$id_caja."','1','".$soles_inicio."','".$dolares_inicio."','".$id_usuario."','0')";
        $this->db->query($q1);
  }
  
  function get_op_caja($id_caja){
    $q2 = "SELECT id_operacion FROM operaciones_caja WHERE estado_caja = 0 AND id_caja = '".$id_caja."' ;";
    $r2 = $this->db->query($q2);
        return $r2;
  }

  function ing_cierre($id, $id_usuario, $id_caja, $soles_final, $dolares_final, $tarj_soles_final, $tarj_dolares_final){
    $q3 = "INSERT INTO operaciones_caja (`id_caja`,`id_tipo_reg`,`soles`,`dolares`,`tarj_soles`,`tarj_dolares`,`Usuario_idUsuario`,`estado_caja`,`id_apert`) VALUES ('".$id_caja."','2','".$soles_final."','".$dolares_final."','".$tarj_soles_final."','".$tarj_dolares_final."','".$id_usuario."','1','".$id."')";
        $this->db->query($q3);
  }

  function fin_apert($id){
    $q4 = "UPDATE operaciones_caja SET estado_caja = '1' WHERE id_operacion = '".$id."' ;";
        $this->db->query($q4);
  }

  function ing_apert_det($id, $m010, $m020, $m050, $m1, $m2, $m5, $b10, $b20, $b50, $b100, $b200, $b10d, $b20d, $b50d, $b100d){
    $q5 = "INSERT INTO det_op_caja (`id_opercaja`,`soles_m_010`,`soles_m_020`,`soles_m_050`,`soles_m_1`,`soles_m_2`,`soles_m_5`,`soles_b_10`,`soles_b_20`,`soles_b_50`,`soles_b_100`,`soles_b_200`,`dol_b_10`,`dol_b_20`,`dol_b_50`,`dol_b_100`) VALUES ('".$id."','".$m010."','".$m020."','".$m050."','".$m1."','".$m2."','".$m5."','".$b10."','".$b20."','".$b50."','".$b100."','".$b200."','".$b10d."','".$b20d."','".$b50d."','".$b100d."')";
        $this->db->query($q5);
  }

  function ing_cierre_det($id_cierre, $m010f, $m020f, $m050f, $m1f, $m2f, $m5f, $b10f, $b20f, $b50f, $b100f, $b200f, $b10df, $b20df, $b50df, $b100df){
    $q6 = "INSERT INTO det_op_caja (`id_opercaja`,`soles_m_010`,`soles_m_020`,`soles_m_050`,`soles_m_1`,`soles_m_2`,`soles_m_5`,`soles_b_10`,`soles_b_20`,`soles_b_50`,`soles_b_100`,`soles_b_200`,`dol_b_10`,`dol_b_20`,`dol_b_50`,`dol_b_100`) VALUES ('".$id_cierre."','".$m010f."','".$m020f."','".$m050f."','".$m1f."','".$m2f."','".$m5f."','".$b10f."','".$b20f."','".$b50f."','".$b100f."','".$b200f."','".$b10df."','".$b20df."','".$b50df."','".$b100df."')";
        $this->db->query($q6);
  }

  function get_cierre_by_idapert($id){
    $q7 = "SELECT * FROM operaciones_caja WHERE id_apert = '".$id."' ;";
    $r7 = $this->db->query($q7);
        return $r7;
  }

  function get_lista_cajas(){
    $q8 = "SELECT * FROM caja ;";
    $r8 = $this->db->query($q8);
        return $r8->result_array();
  }

  function ingresar_cambio($cambio){
    $q9 = "INSERT INTO cotiz_dolar (`valor_s`) VALUES ('".$cambio."')";
        $this->db->query($q9);
  }

  function get_apert_by_idapert($id){
    $q10 = "SELECT * FROM operaciones_caja WHERE id_operacion = '".$id."' ;";
    $r10 = $this->db->query($q10);
        return $r10->result_array();
  }
}

?>