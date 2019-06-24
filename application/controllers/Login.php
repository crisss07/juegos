<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("ahorcado_model");
    }
    
    public function index()
	{	
            redirect(base_url() . "Login/nuevo/");      	
	}	
	public function nuevo(){           		
			$this->load->view('login');
	}	
}

	