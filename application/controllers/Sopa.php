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
		$persona_id = $this->session->userdata("usuario_id");
		// var_dump($persona_id);
		$hoy = date("Y-m-d");
		$res = $this->db->query("SELECT count(fecha)as numero
									FROM registro
									WHERE fecha like '$hoy%'
									AND nombre_juego = 'sopa'
									AND persona_id = '$persona_id'")->row();
		$num = $res->numero;
		if ($num < 3) {
			// $trivias['persona_id'] = $persona_id;
			// $trivias['triviaa'] = $this->db->query("SELECT * FROM trivia ORDER BY RAND()")->result();
			// $this->load->view('trivia', $trivias);
			$this->load->view('sopa/inicia', $resultados);
		}
		else
		{
			$this->load->view('sopa/no_puede');
			// $this->load->view('trivia3');
		}
		// vdebug($resultados, true, false, true);
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
		$persona_id = $this->session->userdata("usuario_id");
		$ahora = date("Y-m-d H:i:s");
		$puntaje = $this->input->post('puntaje');

		$data = array(
			'persona_id'=>$persona_id,
			'nombre_juego'=>'sopa',
			'puntaje'=>$puntaje,
			'contador'=>1,
			'fecha'=>$ahora
		);
		$this->db->insert('registro', $data);
		$score = 10;
		$consulta = $this->db->query("SELECT * FROM entrega WHERE persona_id = $persona_id AND estado = '1'")->row();
		if ($consulta) {
				$puntos = $score + $consulta->puntaje;
				 $data = array(
	            'puntaje' => $puntos,
	            'fecha' => $hoy
		        );
		        $this->db->where('id', $consulta->id);
		        $this->db->update('entrega', $data);
		}
		else
		{
		$arrayy = array(
				'persona_id' =>$persona_id,
				'puntaje' =>$score,
				'estado' =>'1',
				'fecha' =>$hoy
				);
		$this->db->insert('entrega', $arrayy);
		}
		redirect('Trivia');

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

	public function listado_preguntas()
	{
		// $this->db->where('borrado IS NULL');
		$this->db->order_by('id', 'DESC');
		$data['preguntas'] = $this->db->get('sopapreguntas')->result();
		$this->load->view('sopa/listado_preguntas', $data);
		// vdebug($data, true, false, true);
	
	}

	public function guarda_pregunta()
	{
		$data = array(
			'pregunta' => $this->input->post('pregunta'),
		);
		if ($this->input->post('id') == null) {
			$this->db->insert('sopapreguntas', $data);
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('sopapreguntas', $data);
		}
		redirect(base_url('sopa/listado_preguntas'));
	}

	public function elimina_pregunta($idSopa = null)
	{
		// vdebug($idSopa, true, false, true);
		$this->db->delete('sopapreguntas', array('id' => $idSopa));
		redirect(base_url('sopa/listado_preguntas'));
	}

	public function listado_respuestas($idPregunta = null)
	{
		$data['pregunta'] = $this->db->get_where('sopapreguntas', ['id'=>$idPregunta])->row();
		// vdebug($pregunta, true, false, true);   
		$this->db->order_by('id', 'DESC');
		$this->db->where('sopapregunta_id', $idPregunta);
		$data['respuestas'] = $this->db->get('soparespuestas')->result();
		// vdebug($data, true, false, true);
		$this->load->view('sopa/listado_respuestas', $data);
	}

	public function guarda_respuestas()
	{
		// vdebug($this->input->post(), true, false, true);
		$idPregunta = $this->input->post('id_pregunta');
		$data = array(
			'respuesta' => $this->input->post('respuesta'),
			'sopapregunta_id'=>$idPregunta
		);
		if ($this->input->post('id') == null) {
			$this->db->insert('soparespuestas', $data);
		} else {
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('soparespuestas', $data);
		}
		redirect(base_url("sopa/listado_respuestas/$idPregunta"));
	}

	public function elimina_respuesta($idRespuesta = null, $idPregunta = null)
	{
		// vdebug($idSopa, true, false, true);
		$this->db->delete('soparespuestas', array('id' => $idRespuesta));
		redirect(base_url("sopa/listado_respuestas/$idPregunta"));
	}

}
