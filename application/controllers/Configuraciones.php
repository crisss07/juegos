<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('vayes_helper');
		 // $this->load->model("ahorcado_model");
    }
    
    public function index()
	{
		//redirect(base_url());
		redirect(base_url() . "ahorcado/nuevo/2");
	}	

	public function registro()
	{
		$this->load->view('configuraciones/registro');
	}

	public function guarda_registro()
	{
		// vdebug($this->input->post(), true, false, true);
		$data = array(
			'nombres'=>$this->input->post('nombres'),
			'ap'=>$this->input->post('ap'),
			'am'=>$this->input->post('am'),
			'ci'=>$this->input->post('ci'),
			'fecha_nacimiento'=>$this->input->post('fecha_nacimiento'),
			'ciudad'=>$this->input->post('ciudad'),
			'email'=>$this->input->post('email'),
			'celular'=>$this->input->post('celular'),
			'estado'=>'Habilitado',
		);
		$this->db->insert('personas', $data);
	}

	public function registrado()
	{
			
	}
}
	