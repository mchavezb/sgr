<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct(){
  	parent::__construct();
  	$this->load->model('producto_mo');
 	}

 	public function listarCat(){
 		$idcat = $this->input->post('idTipo');
 		$comandamesa = $this->input->post('comandamesa');
 		$datos['list_cat'] = $this->producto_mo->get_producto_by_cat($idcat);
 		foreach ($datos['list_cat'] as $key => $v) {
 			echo "<div class='busqueda-platillo'><a href='".$this->config->item('base_url')."index.php/comanda/add_prod/".$comandamesa."/".$v->idProducto."'><img src='".$this->config->item('base_url')."f/img/add.png' width='22px' height='22px' href='www.google.com'></a> - ".$v->p_nombre."</div>";
 		}

	}

	public function busc(){
		$comandamesa = $this->input->post('comandamesa');
		$busc = $this->input->post('busc');
		$data['productos'] = $this->producto_mo->get_producto_like_name($busc);
		foreach ($data['productos'] as $key => $v) {
			echo "<div class='busqueda-platillo'><a href='".$this->config->item('base_url')."index.php/comanda/add_prod/".$comandamesa."/".$v->idProducto."'><img src='".$this->config->item('base_url')."f/img/add.png' width='22px' height='22px' href='www.google.com'></a> - ".$v->p_nombre."</div>";
		}
	}
}