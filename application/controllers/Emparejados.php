<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emparejados extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("Emparejados_model");
    }
    
    public function index()
	{
		$datos['emparejados']=$this->Emparejados_model->datos();

		$this->load->view('emparejados', $datos);
	}	

	

}

	