<?php
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	function datos($user,$password)
	{
		$query='SELECT * FROM usuario WHERE usuario="'.$user.'"';
		$query=$this->db->query($query);
		return $query->result();
	}
	function conteo($user,$password)
	{
		$query=	'SELECT * FROM usuario WHERE usuario="'.$user.'"';
		$query=$this->db->query($query);
		return $query->num_rows();
	}
}


