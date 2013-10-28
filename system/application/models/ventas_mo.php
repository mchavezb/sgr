<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas_mo extends CI_Model {

	function __construct() {
		parent::__construct();
	}

    public function ingresar_venta($total,$comanda_id,$tipo_pago, $ef_soles, $tarj_soles, $ef_dolares, $tarj_dolares, $id_apert){
        $q1 = "INSERT INTO ventas (`total`,`Comanda_idComanda`,`TipoPago_idTipoPago`,`pago_efectivo_s`,`pago_tarjeta_s`,`pago_efectivo_d`,`pago_tarjeta_d`,`tipo`,`id_apert`) VALUES ('".$total."','".$comanda_id."','".$tipo_pago."','".$ef_soles."','".$tarj_soles."','".$ef_dolares."','".$tarj_dolares."','1','".$id_apert."')";
        $this->db->query($q1);
    }    
}

?>