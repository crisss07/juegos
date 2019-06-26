<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emparejados_model extends CI_Model {

	public function __construct()
	{
		
		parent::__construct();
	}

	public function datos(){
		$data = $this->db->query("SELECT * FROM emparejados WHERE estado = 1 ORDER BY rand() LIMIT 10")->result();
		
		return $data;
	}

	public function lista(){
		$data = $this->db->query("SELECT * FROM emparejados WHERE estado = 1")->result();
		
		return $data;
	}

	public function puntos($id) {
        $query = $this->db->query("SELECT IFNULL(COUNT(persona_id),0) AS contador FROM entrega WHERE persona_id=$id");
        return $query->row();
	}
}