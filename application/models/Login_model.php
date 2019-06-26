<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}



	public function login($usuario, $contrasenia)
	{
		$this->db->where('email', $usuario);
		$this->db->where('password', $contrasenia);
		//$this->db->where('activo', '1');
		
		$resultado = $this->db->get("personas");

		if ($resultado->num_rows() > 0) {
			return $resultado->row();
		}
		else{
			return false;
		}
	}
}
