<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahorcado_model extends CI_Model {

	public $variable;
	
	public function __construct()
	{
		parent::__construct();
	}

	function get_puntaje($id) {
        $query = $this->db->query("SELECT IFNULL(sum(puntaje),0) AS suma FROM registro WHERE persona_id=$id and nombre_juego='ahorcado'");
        return $query->row();
	}
	function get_preguntas() {
        $query = $this->db->query("SELECT * FROM ahorcado");
        return $query->result();
	}
}
