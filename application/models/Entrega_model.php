<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrega_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}
	//obtiene el puntaje acumulado del cada usuario
	function get_total() {
        $query = $this->db->query("SELECT * from entrega WHERE estado=1");
        return $query->result();
	}
	function get_premio() {
        $query = $this->db->query("SELECT * from premios");
        return $query->result();
	}

}
