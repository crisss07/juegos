<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Login_model");
    }
    
    public function index()
	{	
            redirect(base_url() . "Login/nuevo/");      	
	}	
	public function nuevo(){           		
			$this->load->view('login');
	}

	public function login()
	{		
		$usuario = $this->input->post("usuario");
		$contrasena = $this->input->post("contrasenia");
		//$contrasenia = md5($contrasena);
		
		$res = $this->Login_model->login($usuario, $contrasena);
		if (!$res) {
			 redirect(base_url() . "Login/nuevo/");   
		}
		else{

			$data = array(				
				'rol' => $res->perfil,
				'usuario_id' => $res->id,
				'nombres' => $res->nombres,
				'ap' => $res->ap,
				'am' => $res->am,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			//perfil de usuario
			if($res->perfil=='Jugador'){
				redirect(base_url());
			}
			//pefil de administrador
			else{
				redirect(base_url() . "Configuraciones/listado/");  
			}				
		}
	}
}


