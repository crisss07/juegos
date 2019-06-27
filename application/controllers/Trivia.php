<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trivia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model("trivia_model");
    }

    public function index()
	{
		$persona_id = $this->session->userdata("usuario_id");
		// var_dump($persona_id);
		$hoy = date("Y-m-d");
		$res = $this->db->query("SELECT count(fecha)as numero
									FROM registro
									WHERE fecha like '$hoy%'
									AND persona_id = '$persona_id'
									AND nombre_juego = 'trivia' ")->row();
		$num = $res->numero;
		if ($num < 3) {
			$trivias['persona_id'] = $persona_id;
			$trivias['triviaa'] = $this->db->query("SELECT * FROM trivia ORDER BY RAND()")->result();
			$this->load->view('trivia', $trivias);
		}
		else
		{
			$this->load->view('trivia3');
		}
		
	}

	public function guarda($persona_id = null, $score = null)
	{
		
		$hoy = date("Y-m-d H:i:s");
		// var_dump($hoy);
		$array = array(
			'persona_id' =>$persona_id,
			'nombre_juego' =>'trivia',
			'puntaje' =>$score,
			'fecha' =>$hoy,
			'contador' =>1
			);
		$this->db->insert('registro', $array);

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
	}

	public function formulario()
	{
		$trivias['triviaa'] = $this->db->query("SELECT * FROM trivia ORDER BY id")->result();
		$this->load->view('tformulario', $trivias);
	}

	public function sabias()
	{
		$trivia['sabias'] = $this->db->query("SELECT * FROM sabias ORDER BY id")->result();
		$this->load->view('tsabias', $trivia);
	}

	public function insertar()
	{
		$datos = $this->input->post();
		$pregunta = $datos['pregunta'];
		$respuesta_uno = $datos['respuesta_uno'];
		$respuesta_dos = $datos['respuesta_dos'];
		$respuesta_tres = $datos['respuesta_tres'];
		$respuesta_correcta = $datos['respuesta_correcta'];

		$array = array(
					'pregunta' =>$pregunta,
					'respuesta_uno' =>$respuesta_uno,
					'respuesta_dos' =>$respuesta_dos,
					'respuesta_tres' =>$respuesta_tres,
					'respuesta_correcta' =>$respuesta_correcta
					);
		$this->db->insert('trivia', $array);
		redirect('Trivia/formulario');
	}

	public function update()
	{
		$id = $this->input->post('id');
		$pregunta = $this->input->post('pregunta');
		$respuesta_uno = $this->input->post('respuesta_uno');
	    $respuesta_dos = $this->input->post('respuesta_dos');
	    $respuesta_tres = $this->input->post('respuesta_tres');
	    $respuesta_correcta = $this->input->post('respuesta_correcta');
	    // var_dump($id);

	    $data = array(
            'pregunta' => $pregunta,
            'respuesta_uno' => $respuesta_uno,
            'respuesta_dos' => $respuesta_dos,
            'respuesta_tres' => $respuesta_tres,
            'respuesta_correcta' => $respuesta_correcta
        );
        $this->db->where('id', $id);
        $this->db->update('trivia', $data);
    	redirect('Trivia/formulario');
	}



	public function eliminar()
	{
		$id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('trivia');
        redirect('Trivia/formulario');
	}

	public function insertar_sabias()
	{
		$datos = $this->input->post();
		$nombre = $datos['nombre'];

		$array = array(
					'nombre' =>$nombre
					);
		$this->db->insert('sabias', $array);
		redirect('Trivia/sabias');
	}

	public function update_sabias()
	{
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
	    // var_dump($id);

	    $data = array(
            'nombre' => $nombre
        );
        $this->db->where('id', $id);
        $this->db->update('sabias', $data);
    	redirect('Trivia/sabias');
	}

	public function eliminar_sabias()
	{
		$id = $this->uri->segment(3);
        $this->db->where('id', $id);
        $this->db->delete('sabias');
        redirect('Trivia/sabias');
	}

}
