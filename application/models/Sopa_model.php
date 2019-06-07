<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sopa_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('vayes_helper');
        // $this->load->model("persona_model");
    }

    public function genera_ramdon(){

        $data = array();
        $this->db->select('id');
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(1);
        $id_preguntas_azar = $this->db->get('sopapreguntas')->row();
        $id = $id_preguntas_azar->id;
        $pregunta = $this->db->get_where('sopapreguntas', array('id'=>$id))->row();
        $respuestas = $this->db->get_where('soparespuestas', array('sopapregunta_id'=>$id))->result_array();

        $data['pregunta'] = $pregunta->pregunta;
        $data['respuestas'] = $respuestas;
        return $data;
    }
}