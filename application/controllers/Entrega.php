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
			$data['premios'] = $this->Entrega_model->get_premio();
			$this->load->view('entrega', $data);	
	}	

	
	public function guarda($id_persona = null,$puntaje = null)
	{
		$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;	
		$data = array(
            //'codcatas' => $this->input->post('cod_catastral'), //input          
            'persona_id' => $id_persona,
            'nombre_juego' =>'ahorcado',
            'puntaje' => $puntaje,
            //'fecha' => now(), //agregar en la bd valor por defecto now()
            'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);		
		redirect(base_url('ahorcado/win/'. $id_persona));
	}
}

	