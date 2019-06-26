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
            redirect(base_url()."Login");
        }
	}	

	public function guarda($id_persona = null,$puntaje = null)
	{
		// vdebug($this->input->post(), false, false, true);
		
		if ($this->session->userdata("login")) {
			//$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		//$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
	

		$data = array(
               
            'persona_id' => $id_persona,
            'nombre_juego' =>'ahorcado',
            'puntaje' => $puntaje,

            //'contador' =>$usu_creacion //aun no captura el usuario
        );
        $this->db->insert('registro', $data);

       	$puntos=$this->ahorcado_model->get_puntos($id_persona);

       	if(($puntos->contador)==0){
       		$data2 = array(
               
            'persona_id' => $id_persona,
            'puntaje' => $puntaje,
            'estado' =>1
        	);
        $this->db->insert('entrega', $data2);

       	}else{
       		$this->db->query("UPDATE entrega SET puntaje = puntaje+$puntaje WHERE persona_id=$id_persona and estado=1");
       	}
		redirect(base_url('ahorcado/win/'. $id_persona));
           		//redirect(base_url() . "ahorcado/ingreso/".$this->session->userdata("usuario_id"));
        } else {
            redirect(base_url()."Login");
        }		
	}


	
	public function guarda_loss($id_persona = null,$puntaje = null)
	{	
		if ($this->session->userdata("login")) {
           		//$nueva_fecha_inicio = $this->input->post('fecha_inicio').$hora_inicio;
		//$nueva_fecha_fin = $this->input->post('fecha_inicio').$hora_final;
		$data = array(            
            'persona_id' => $id_persona,
            'nombre_juego' =>'ahorcado',
            'puntaje' => $puntaje,   
            'contador' =>1 //aun no captura el usuario
        );
        $this->db->insert('registro', $data);		
		redirect(base_url('ahorcado/loss/'. $id_persona));
        } else {
            redirect(base_url()."Login");
        }


		
	}


	public function nuevo($ida=null){

		if ($this->session->userdata("login")) {
           	$data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);
            if(($cont->contador)>2  ){
                 redirect(base_url()."Ahorcado/contador/".$ida);
            }
            else{                
                $this->load->view('ahorcado', $data);
            }


            
        } else {
            redirect(base_url()."Login");
        }


            				
	}

	public function ingreso($ida=null){	
		if ($this->session->userdata("login")) {
           		 $data['id_persona']=$ida;   
			$this->load->view('ahorcado_inicio', $data);
        } else {
            redirect(base_url()."Login");
        }
           				
	}

	public function win($ida=null){
		if ($this->session->userdata("login")) {
           		 $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);	
			$this->load->view('ahorcado_win', $data);
        } else {
            redirect(base_url()."Login");
        }
           
	}


	public function loss($ida=null){	
		if ($this->session->userdata("login")) {
           		$data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);

				$this->load->view('ahorcado_loss', $data);
        } else {
            redirect(base_url()."Login");
        }
      
            	
	
		
	}

	public function contador($ida=null){	
		if ($this->session->userdata("login")) {
           		$data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);

				$this->load->view('ahorcado_count', $data);	
        } else {
            redirect(base_url()."Login");
        }		
	}

	public function menu($ida=null){  
	if ($this->session->userdata("login")) {
           		$data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);	  
		    $this->load->view('menu_ahorcado', $data);
        } else {
            redirect(base_url()."Login");
        }    
            
			
	}

	

	public function listado(){
	if ($this->session->userdata("login")) {
           		$data['preguntas'] = $this->ahorcado_model->get_preguntas();
			$this->load->view('ahorcado_preg', $data);
        } else {
            redirect(base_url()."Login");
        }	
        		
	}

	public function create(){	
		if ($this->session->userdata("login")) {
           			$data = array (            
            'pregunta' => $this->input->post('pregunta'),
            'respuesta' => strtolower($this->input->post('respuesta')),           
            'estado' => '1'
        );
        $this->db->insert('ahorcado', $data);		
      
		redirect(base_url('ahorcado/listado/'));
        } else {
            redirect(base_url()."Login");
        }
        
	}

	public function edit($ida=null){
	if ($this->session->userdata("login")) {
           		$data['row'] = $this->ahorcado_model->get_data($ida);
			$this->load->view('ahorcado_edit', $data);	
        } else {
            redirect(base_url()."Login");
        }	
        	
	}
	public function update($ida=null){
		if ($this->session->userdata("login")) {
            $ida=$this->input->post('id_e');
           		$data = array (            
            'pregunta' => $this->input->post('pregunta_e'),
            'respuesta' => strtolower($this->input->post('respuesta_e')),                   
        	);
        	$this->db->where('ahorcado_id', $ida);
        	$this->db->update('ahorcado', $data);
			redirect(base_url('ahorcado/listado/'));
        } else {
            redirect(base_url()."Login");
        }
				
	}
	public function delete($ida=null){
		if ($this->session->userdata("login")) {
           		$data = array (          
            	'estado' => 0
        	);
        	$this->db->where('ahorcado_id', $ida);
        	$this->db->update('ahorcado', $data);	
        	redirect(base_url('ahorcado/listado/'));
        } else {
            redirect(base_url()."Login");
        }
			
	}
}

	