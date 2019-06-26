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
		if ($this->session->userdata("login")) {
           	$datos['emparejados']=$this->Emparejados_model->datos();
			$this->load->view('emparejados', $datos);
        } else {
            redirect(base_url()."Login");
        }
		
	}	

	public function insertar()
	{
		if ($this->session->userdata("login")) {
           	$fecha = date("Y-m-d H:i:s");
		//$id_persona = $this->input->post('valor');
		$persona_id = $this->session->userdata("usuario_id");

		$data = array(
            //'codcatas' => $this->input->post('cod_catastral'), //input          
            'persona_id' => $persona_id,
            'nombre_juego' =>'emparejados',
            'puntaje' => 30,
            'fecha' => $fecha, //agregar en la bd valor por defecto now()
            'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);
        } else {
            redirect(base_url()."Login");
        }
				
		
	}

	public function insertar_perdida()
	{
		$persona_id = $this->session->userdata("usuario_id");
		$fecha = date("Y-m-d H:i:s");
		//$id_persona = $this->input->post('valor');

		$data = array(
            //'codcatas' => $this->input->post('cod_catastral'), //input          
            'persona_id' => $persona_id,
            'nombre_juego' =>'emparejados',
            'puntaje' => 0,
            'fecha' => $fecha, //agregar en la bd valor por defecto now()
            'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);		
		//redirect(base_url('Emparejados/formulario'));
	}
	
	public function formulario(){
		if ($this->session->userdata("login")) {
           $datos['emparejados']=$this->Emparejados_model->lista();
			$this->load->view('formulario_emparejados', $datos);
        } else {
            redirect(base_url()."Login");
        }
		
	}

	public function guardar_formulario(){
		if ($this->session->userdata("login")) {
           $valor_id = $this->input->post('id');

		if($valor_id != " "){

			$data = array( 
				'pregunta' => $this->input->post('pregunta'),
				'respuesta' => $this->input->post('respuesta'),
					);
			$this->db->where('id', $valor_id);
			$this->db->update('emparejados', $data); 
			redirect(base_url('Emparejados/formulario'));
		}else{
			$mi_imagen = 'img_pregunta';
	        $mi_imagen1 = 'img_respuesta';

	        $valor = NULL;

		    $config['upload_path'] = "./public/img_emparejados";
		    $config['file_name'] = "imagen";
		    $config['allowed_types'] = "gif|jpg|jpeg|png";
		    $config['max_size'] = "50000";
		    $config['max_width'] = "2000";
		    $config['max_height'] = "2000";

		    $this->load->library('upload', $config);

		    if (!$this->upload->do_upload($mi_imagen)) {
		        //*** ocurrio un error
		        $data['uploadError'] = $this->upload->display_errors();
		        echo $this->upload->display_errors();
		    }else { 
				$w = $this->upload->data(); 
				$valor['img_p']= $w['file_name'];
			} 
		    if (!$this->upload->do_upload($mi_imagen1)) {
		        //*** ocurrio un error
		        $data['uploadError'] = $this->upload->display_errors();
		        echo $this->upload->display_errors();
		    }else { 
				$w = $this->upload->data(); 
				$valor['img_r']= $w['file_name'];	
			} 
			$data = array( 
				'pregunta' => $this->input->post('pregunta'),
				'respuesta' => $this->input->post('respuesta'),
				'img_pregunta' => $valor['img_p'],
				'img_respuesta' => $valor['img_r'],
					);
			$this->db->insert('emparejados', $data); 
			redirect(base_url('Emparejados/formulario'));
		}
        } else {
            redirect(base_url()."Login");
        }    
	    
	}
	public function eliminar($id){
		if ($this->session->userdata("login")) {
           	$persona_id = $this->session->userdata("usuario_id");
			$fecha = date('Y-m-d h:m:s');
			$array = array(
				'estado' => 0,
				'fecha_eliminar' =>$fecha,
				'usu_eliminar' => $persona_id,
			);
			$this->db->where('id', $id);
	        $this->db->update('emparejados', $array);
			redirect(base_url('Emparejados/formulario'));
        } else {
            redirect(base_url()."Login");
        }
		
	}


}

	