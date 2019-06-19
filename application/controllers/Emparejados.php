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

	public function insertar()
	{
		$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
		$id_persona = $this->input->post('valor');

		$data = array(
            //'codcatas' => $this->input->post('cod_catastral'), //input          
            'persona_id' => $id_persona,
            'nombre_juego' =>'emparejados',
            'puntaje' => 30,
            //'fecha' => now(), //agregar en la bd valor por defecto now()
            'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);		
		redirect(base_url('ahorcado/win/'. $id_persona));
	}

	public function insertar_perdida()
	{
		$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
		$id_persona = $this->input->post('valor');

		$data = array(
            //'codcatas' => $this->input->post('cod_catastral'), //input          
            'persona_id' => $id_persona,
            'nombre_juego' =>'emparejados',
            'puntaje' => 0,
            //'fecha' => now(), //agregar en la bd valor por defecto now()
            'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);		
		redirect(base_url('ahorcado/win/'. $id_persona));
	}
	

}

	