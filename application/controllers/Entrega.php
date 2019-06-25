<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrega extends CI_Controller {

	public function __construct()
	{
		 parent::__construct();
		 $this->load->model("Entrega_model");
    }
    
    public function index()
	{	
			$data['puntajes'] = $this->Entrega_model->get_total();
			$data['cobrado'] = $this->Entrega_model->get_cobrado();
			$data['premios'] = $this->Entrega_model->get_premio();
			$this->load->view('entrega', $data);	
	}	

	public function premiados()
	{		
			$data['cobrado'] = $this->Entrega_model->get_cobrado();
			$this->load->view('premiados', $data);	
	}	
	
	public function guarda()
	{
		$usuario = $this->input->post('usuario');
		$usuario_id = $this->input->post('usuario_id');
		$premio_id = $this->input->post('premio_id');
		$id = $this->input->post('id');	
		$data = array(                    
           
            'premio_id' =>$premio_id,
            'estado'=>0 
        );
        $this->db->set('fecha', 'NOW()', FALSE);
        $this->db->where('id', $id);
        $this->db->update('entrega', $data);		
		redirect(base_url('Entrega'));
	}
}

	