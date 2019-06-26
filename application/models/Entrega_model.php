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
        $query = $this->db->query("SELECT a.*,p.nombres,p.id as id_p,p.ap,p.am from entrega a
	LEFT JOIN
	personas p
	on a.persona_id=p.id
	WHERE a.estado=1 order by a.puntaje desc");
        return $query->result();
	}
	function get_premio() {
        $query = $this->db->query("SELECT * from premios");
        return $query->result();
	}
	function get_cobrado() {
        $query = $this->db->query("SELECT a.persona_id,date(a.fecha) as fecha,a.puntaje,a.premio_id,p.nombres,p.ap,p.am,c.premio from entrega a
	LEFT JOIN
	personas p
	on a.persona_id=p.id
	LEFT JOIN premios c
	on a.premio_id=c.id
	WHERE a.estado=0 order by a.fecha desc");
        return $query->result();
	}

}
