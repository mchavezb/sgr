<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    public function ingresar_venta($total,$comanda_id,$tipo_pago, $ef_soles, $tarj_soles, $ef_dolares, $tarj_dolares, $id_apert, $dniruc, $razonsocial, $direccion, $nomb_tarj){
        $q1 = "INSERT INTO ventas (`total`,`Comanda_idComanda`,`TipoPago_idTipoPago`,`pago_efectivo_s`,`pago_tarjeta_s`,`pago_efectivo_d`,`pago_tarjeta_d`,`tipo_venta`,`id_apert`, `ruc`, `razon_social`, `direccion`,`tipotarjeta`) VALUES ('".$total."','".$comanda_id."','".$tipo_pago."','".$ef_soles."','".$tarj_soles."','".$ef_dolares."','".$tarj_dolares."','1','".$id_apert."','".$dniruc."','".$razonsocial."','".$direccion."','".$nomb_tarj."')";
        $this->db->query($q1);
    }

    public function get_ventas_by_idapert($id){
    	$q2 = "SELECT * FROM ventas WHERE id_apert = ".$id.";";
  		$r2 = $this->db->query($q2);
  		return $r2->result();
    }    
}

?>