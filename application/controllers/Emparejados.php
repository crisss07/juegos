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
	
	public function formulario(){
		$datos['emparejados']=$this->Emparejados_model->lista();
		$this->load->view('formulario_emparejados', $datos);
	}

	public function guardar_formulario(){
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
	public function eliminar($id){
		$fecha = date('Y-m-d h:m:s');
		$array = array(
			'estado' => 0,
			'fecha_eliminar' =>$fecha,
		);

		$this->db->where('id', $id);
        $this->db->update('emparejados', $array);
		redirect(base_url('Emparejados/formulario'));
	}

	public function editar(){
		$array = array(
			'predio_id' => $predio_id,
			'nro_matricula_folio' => $nro_matricula_folio,
			'nro_folio' => $nro_folio,
			'fecha_folio' => $fecha_folio,
			'superficie_legal' => $superficie_legal,
			'nom_notario' => $nom_notario,
			'nro_testimonio' => $nro_testimonio,
			'fecha_testimonio' => $fecha_testimonio,
			'partida' => $partida,
			'partida_computarizada' => $partida_computarizada,
			'foja' => $foja,
			'libro' => $libro,
			'fecha_reg_libro' => $fecha_reg_libro,
			'usu_modificacion' => $usu_modificacion,
			'fec_modificacion' => $fec_modificacion
		);

		$this->db->where('ddrr_id', $ddrr_id);
        $this->db->update('catastro.predio_ddrr', $array);
		redirect(base_url('Emparejados/formulario'));
	}

}

	