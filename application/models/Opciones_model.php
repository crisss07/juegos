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
		$data = $this->db->query("SELECT e.puntaje, p.nombres, p.ap, p.am, p.ciudad FROM entrega e JOIN personas p ON e.persona_id = p.id  WHERE e.estado = 1 ORDER BY e.puntaje DESC")->result();
		return $data;
	}

	public function puntaje_id($id = null){
		$data = $this->db->query("SELECT nombre_juego, SUM(puntaje) as suma FROM registro WHERE persona_id = '$id' GROUP BY nombre_juego;")->result();
		return $data;
	}

	public function acumulado($id = null){
		
		$acumulado = $this->db->query("SELECT e.puntaje, p.nombres, p.ap, p.am, p.ciudad FROM entrega e JOIN personas p ON e.persona_id = p.id  WHERE e.estado = 1 AND e.persona_id = '$id'")->row();
		return $acumulado;

	}
}