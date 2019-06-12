<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sopa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('vayes_helper');
		$this->load->model('Sopa_model');
    }

  public function index()
	{
		$this->load->view('trivia');
	}

	public function inicia(){

		// echo "holas desde la sopa";
		$resultados = $this->Sopa_model->genera_ramdon();
		// vdebug($resultados, true, false, true);
		$this->load->view('sopa/inicia', $resultados);
	}

	public function prueba()
	{
		$consulta = $this->db->query("SELECT *
										FROM persona
										WHERE id = 10")->row();
        $valor = $consulta->nombre;
        var_dump($valor);
	}

	public function guarda_puntaje()
	{
		$ahora = date("Y-m-d H:i:s");
		$puntaje = $this->input->post('persona_id');
		$data = array(
			'persona_id'=>55,
			'nombre_juego'=>'sopa',
			'puntaje'=>10,
			'fecha'=>$ahora
		);
		$this->db->insert('registro', $data);
		// var_dump($puntaje);
	}

	public function guarda_edicion()
	{
		// vdebug($this->input->post(), false, false, true);
		if($this->input->post('turno') == 't'){
			$hora_inicio = ' 14:30:00';
			$hora_final = ' 18:30:00';
		}else{
			$hora_inicio = ' 08:00:00';
			$hora_final = ' 12:30:00';
		}

		$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
		$this->db->set('inicio', $nueva_fecha_inicio);
		$this->db->set('fin', $nueva_fecha_fin);
		$this->db->set('tipo_asignacion_id', 2);
		$this->db->set('persona_id', $this->input->post('persona_id'));
		$this->db->where('asignacion_id', $this->input->post('asignacion_id'));
		$this->db->update('inspeccion.asignacion');
		redirect(base_url('Inspeccion/lista_asign'));

	}

	public function edita($id_asignacion = null){

		$this->db->where('perfil_id', 5);
		$inspectores = $this->db->get('persona_perfil')->result();
		$array_inspectores = array();
		foreach ($inspectores as $i) {
			array_push($array_inspectores, $i->persona_id);
		}

		// vdebug($array_inspectores, true, false, true);
		$this->db->where_in('persona_id', $array_inspectores);
		$data['inspectores'] = $this->db->get('persona')->result();
		// vdebug($inspec, true, false, true);


		$data['asignacion'] = $this->db->get_where('inspeccion.asignacion', array('asignacion_id' => $id_asignacion))->row();
		$this->load->view('admin/header');
	    $this->load->view('admin/menu');
	    $this->load->view('asignacion/edita', $data);
	    $this->load->view('admin/footer');
	}

	public function nuevo($ida=null){

		if($this->session->userdata("login")){
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();
			$id = $this->session->userdata("persona_perfil_id");
            $resi = $this->db->get_where('persona_perfil', array('persona_perfil_id' => $id))->row();
            $dato = $resi->persona_id;
            $res = $this->db->get_where('persona', array('persona_id' => $dato))->row();

            $data['data_act'] = $this->inspecciones_model->get_data_act();
            $data['data_inf'] = $this->inspecciones_model->get_data_inf();
            $data['asignacion_id']=$ida;

            	$this->load->view('admin/header');
		        $this->load->view('admin/menu');
		        $this->load->view('asignacion/edita', $data);
		        $this->load->view('admin/footer');

       		}
		else{
			redirect(base_url());
        }

	}

}
