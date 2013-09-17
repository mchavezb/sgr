<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery extends CI_Controller {

	public function __construct()
 	{
  	parent::__construct();
 	}
 	
	public function index()
	{
		echo 'Estás ejecutando el controlador delivery.php';
	}
}