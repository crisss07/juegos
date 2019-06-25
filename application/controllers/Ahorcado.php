<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ahorcado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->model("ahorcado_model");
    }
    
    public function index()
	{
		if ($this->session->userdata("login")) {
           		redirect(base_url() . "ahorcado/ingreso/".$this->session->userdata("usuario_id"));
        } else {
            redirect(base_url()."Login/nuevo");
        }
	}	

	
	
	public function guarda($id_persona = null,$puntaje = null)
	{
		// vdebug($this->input->post(), false, false, true);
		

		$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
	

		$data = array(
               
            'persona_id' => $id_persona,
            'nombre_juego' =>'ahorcado',
            'puntaje' => $puntaje,

            'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);		
		redirect(base_url('ahorcado/win/'. $id_persona));
	}


	
	public function guarda_loss($id_persona = null,$puntaje = null)
	{
		$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
		$data = array(            
            'persona_id' => $id_persona,
            'nombre_juego' =>'ahorcado',
            'puntaje' => $puntaje,   
            'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);		
		redirect(base_url('ahorcado/loss/'. $id_persona));
	}


	public function nuevo($ida=null){
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);
			$this->load->view('ahorcado', $data);				
	}

	public function ingreso($ida=null){	
            $data['id_persona']=$ida;   
			$this->load->view('ahorcado_inicio', $data);				
	}

	public function win($ida=null){
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);	
			$this->load->view('ahorcado_win', $data);
	}


	public function loss($ida=null){	
		
      
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);

				$this->load->view('ahorcado_loss', $data);	
	
		
	}

	public function contador($ida=null){	
		
      
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);

				$this->load->view('ahorcado_count', $data);	
		
	
		
	}

	public function menu($ida=null){      
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);	  
		    $this->load->view('menu_ahorcado', $data);
			
	}

	

	public function listado(){	
        	$data['preguntas'] = $this->ahorcado_model->get_preguntas();
			$this->load->view('ahorcado_preg', $data);	
	}

	public function create(){	
        	$data = array (            
            'pregunta' => $this->input->post('pregunta'),
            'respuesta' => strtolower($this->input->post('respuesta')),           
            'estado' => '1'
        );
        $this->db->insert('ahorcado', $data);		
      
		redirect(base_url('ahorcado/listado/'));
	}

	public function edit($ida=null){	
        	$data['row'] = $this->ahorcado_model->get_data($ida);
			$this->load->view('ahorcado_edit', $data);	
	}
	public function update($ida=null){
			$data = array (            
            'pregunta' => $this->input->post('pregunta'),
            'respuesta' => strtolower($this->input->post('respuesta')),                   
        	);
        	$this->db->where('ahorcado_id', $ida);
        	$this->db->update('ahorcado', $data);	
       

			redirect(base_url('ahorcado/listado/'));	
	}
	public function delete($ida=null){
			$data = array (          
            	'estado' => 0
        	);
        	$this->db->where('ahorcado_id', $ida);
        	$this->db->update('ahorcado', $data);	
        	redirect(base_url('ahorcado/listado/'));
	}
}

	