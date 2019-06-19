<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Opciones_model");
    }
    
    public function ranking(){
		$datos['puntajes']=$this->Opciones_model->puntaje();

		$this->load->view('opciones/ranking', $datos);
	}

	public	function ranking_juego(){

		$datos['puntajes_id']=$this->Emparejados_model->puntaje_id($id);
		$this->load->view('opciones/ranking_juego');
	}

	public function premios(){
		$datos['cosas']=$this->Opciones_model->datos();
		$this->load->view('opciones/premios', $datos);
	}

	public function informacion(){
		$this->load->view('opciones/informacion');
	}
	

}

	