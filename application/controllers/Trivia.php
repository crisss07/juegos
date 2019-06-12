<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trivia extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("trivia_model");
    }

    public function index()
	{
		$persona_id = 6;
		$hoy = date("Y-m-d");

		$res = $this->db->query("SELECT count(fecha)as numero
									FROM registro
									WHERE fecha like '$hoy%'
									AND persona_id = '$persona_id'")->row();
		$num = $res->numero;
		if ($num < 3) {
			$trivias['persona_id'] = $persona_id;
			$trivias['triviaa'] = $this->db->query("SELECT * FROM trivia ORDER BY RAND()")->result();
			$this->load->view('trivia', $trivias);
		}
		else
		{
			echo 'hola ya tienes 3 juegos jugados el dia de hoy';
		}
		
	}

	// public function prueba()
	// {
	// 	$consulta = $this->db->query("SELECT * FROM sabias ORDER BY RAND()")->result();
	// 	foreach ($consulta as $con) {
	// 		echo $con->nombre;
	// 		}
 //        // $valor = $consulta->nombre;

 //        // var_dump($valor);
	//  }

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
		redirect('Trivia');
	}

	

}
