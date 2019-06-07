<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emparejados_model extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
	}

	public function datos(){
		$data = $this->db->query("SELECT * FROM emparejados ORDER BY rand() LIMIT 10")->result();
		
		return $data;
	}
}