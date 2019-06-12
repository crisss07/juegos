<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opciones_model extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
	}

	public function datos(){
		$data = $this->db->query("SELECT * FROM premios")->result();
		return $data;
	}

	public function puntaje(){
		$data = $this->db->query("SELECT * FROM ranking ORDER BY puntaje DESC")->result();
		return $data;
	}

	public function puntaje_id($id = null){
		$data = $this->db->query("SELECT * FROM ranking WHERE persona_id = '$id'")->result();
		return $data;
	}
}