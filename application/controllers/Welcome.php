<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		if ($this->session->userdata("login")) {

			$data = array(            
       		$usuario_id=$this->session->userdata("usuario_id"),
			$nombres=$this->session->userdata("nombres"),
			$ap=$this->session->userdata("ap"),
			$am=$this->session->userdata("am")
        	);
			
			$this->load->view('welcome_message',$data);
           		
        } else {
            redirect(base_url()."Login");
        }

        //$this->load->view('welcome_message');
		
	}



	public function trivia()
	{
		$this->load->view('trivia');
	}

	public function prueba()
	{
		$consulta = $this->db->query("SELECT *
										FROM persona
										WHERE id = 10")->row();            
        $valor = $consulta->nombre;

        var_dump($valor);
	}

	public function guarda()
	{
		$puntaje = $this->input->post('puntaje');
		var_dump($puntaje);
	}

	
}
