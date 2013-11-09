<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    public function ingresar_venta($total, $comanda_id, $tipo_pago, $tipo_comprobante, $ef_soles, $tarj_soles, $ef_dolares, $tarj_dolares,$id_apert, $dniruc, $razonsocial, $direccion, $nomb_tarj,$id_caja){
        $q1 = "INSERT INTO ventas (`total`,`Comanda_idComanda`,`TipoPago_idTipoPago`,`tipo_comprobante`,`pago_efectivo_s`,`pago_tarjeta_s`,`pago_efectivo_d`,`pago_tarjeta_d`,`tipo_venta`,`id_apert`, `ruc`, `razon_social`, `direccion`,`tipotarjeta`,`cajaid`) VALUES ('".$total."','".$comanda_id."','".$tipo_pago."','".$tipo_comprobante."','".$ef_soles."','".$tarj_soles."','".$ef_dolares."','".$tarj_dolares."','1','".$id_apert."','".$dniruc."','".$razonsocial."','".$direccion."','".$nomb_tarj."','".$id_caja."')";
        $this->db->query($q1);
    }
    //Todas las ventas relacionadas a un apertura de caja
    public function get_ventas_by_idapert($id){
    	$q2 = "SELECT * FROM ventas WHERE id_apert = ".$id.";";
  		$r2 = $this->db->query($q2);
  		return $r2->result();
    }
    public function get_ventas(){
      $q3 = "SELECT * FROM ventas ORDER BY hora DESC";
      $r3 = $this->db->query($q3);
      return $r3->result();
    }
    //Muestra una venta específica de acuerdo a su ID
    public function get_venta_by_idventa($id){
      $q4 = "SELECT * FROM ventas WHERE idVenta = ".$id.";";
      $r4 = $this->db->query($q4);
      return $r4->result();
    }
}

?>