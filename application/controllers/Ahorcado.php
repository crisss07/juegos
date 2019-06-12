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
		//redirect(base_url());
		redirect(base_url() . "ahorcado/nuevo/2");
	}	

	
	
	public function guarda($id_persona = null,$puntaje = null)
	{
		// vdebug($this->input->post(), false, false, true);
		

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


	
	public function guarda_loss($id_persona = null,$puntaje = null)
	{
		// vdebug($this->input->post(), false, false, true);
		

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
		redirect(base_url('ahorcado/loss/'. $id_persona));
	}


	public function nuevo($ida=null){	
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();	
      
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);

		
				$this->load->view('ahorcado', $data);	
			


			//if(($cont->contador)<3){
			//	$this->load->view('ahorcado', $data);	
			//}else{
			//	redirect(base_url('ahorcado/contador/'. $ida));
		//	}
		    
		
		
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
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();	
      
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);

				$this->load->view('ahorcado_loss', $data);	
		
			//$this->load->view('admin/footer');	
		
	}

	public function contador($ida=null){	
			//$lista['verifica'] = $this->rol_model->verifica();
			//$lista['zona_urbana'] = $this->zona_urbana_model->index();	
      
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);
            $data['preguntas'] = $this->ahorcado_model->get_preguntas();
            $data['ronda'] = $this->ahorcado_model->get_ronda($ida);
			$cont=$this->ahorcado_model->get_ronda($ida);

				$this->load->view('ahorcado_count', $data);	
		
			//$this->load->view('admin/footer');	
		
	}

	public function menu($ida=null){      
            $data['id_persona']=$ida;
            $data['puntaje_id'] = $this->ahorcado_model->get_puntaje($ida);	  
		    $this->load->view('menu_ahorcado', $data);
			
	}

}

	