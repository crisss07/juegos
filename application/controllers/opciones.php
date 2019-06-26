<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Opciones_model");
    }
    
    public function ranking(){
    	if ($this->session->userdata("login")) {
           	$datos['puntajes']=$this->Opciones_model->puntaje();

			$this->load->view('opciones/ranking', $datos);
        } else {
            redirect(base_url()."Login");
        }
		
	}

	public	function ranking_juego(){
		$persona_id = $this->session->userdata("usuario_id");
		if ($this->session->userdata("login")) {
           	$datos['puntajes_id']=$this->Opciones_model->puntaje_id($persona_id);
           	$datos['acumulados'] = $this->Opciones_model->acumulado($persona_id);
			$this->load->view('opciones/ranking_juego', $datos);
        } else {
            redirect(base_url()."Login");
        }
		
	}

	public function premios(){
		$datos['cosas']=$this->Opciones_model->datos();
		$this->load->view('opciones/premios', $datos);
	}

	public function informacion(){
		$this->load->view('opciones/informacion');
	}
	

}

	