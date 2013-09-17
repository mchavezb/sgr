<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mesas extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
  	$this->load->database();
  	$this->load->model('mesas_mo');
 	}
 	
	public function index()
	{
		$data['inf_mesas'] = $this->mesas_mo->get_mesas();
		$this->load->view('mesas_vw',$data);
	}
}