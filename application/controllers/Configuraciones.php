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
			'perfil'=>'Jugador',
			'ap'=>$this->input->post('ap'),
			'am'=>$this->input->post('am'),
			'ci'=>$this->input->post('ci'),
			'fecha_nacimiento'=>$this->input->post('fecha_nacimiento'),
			'ciudad'=>$this->input->post('ciudad'),
			'email'=>$this->input->post('email'),
			'celular'=>$this->input->post('celular'),
			'estado'=>'Habilitado',
		);
		if($this->input->post('id')==null){
			$this->db->insert('personas', $data);
		}else{
			$this->db->where('id', $this->input->post('id'));
			$this->db->update('personas', $data);
		}
		redirect(base_url('configuraciones/registrado'));
	}

	public function registrado()
	{
		$this->load->view('configuraciones/registrado');
		// echo 'ya se registro';
	}

	public function listado()
	{
		$this->db->where('borrado IS NULL');
		$this->db->order_by('id', 'DESC');
		$data['personas'] = $this->db->get('personas')->result();
		$this->load->view('configuraciones/listado', $data);
		// vdebug($data, true, false, true);
	}
	
	public function elimina_usuario($idUsuario = null)
	{
		// vdebug($idUsuario, true, false, true);
		$ahora = date("Y-m-d H:i:s"); 
		$this->db->where('id', $idUsuario);
		$this->db->set('borrado', $ahora);
		$this->db->update('personas');
		redirect(base_url('configuraciones/listado'));
	}

	public function guarda_edicion()
	{

	}

	public function inicio()
	{
		$this->load->view('configuraciones/inicio');
	}
}
	