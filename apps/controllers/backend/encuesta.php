<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Encuesta extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('bo_isLogued')){
            redirect('bo/login/formLogin');
        } else {
             $this->load->model('socio_model');
             $this->load->model('cartola_model');
             $this->load->library('form_validation');
             $this->load->library('paginar');
        }
        
        
    }

    function Index() {
        $this->db
        ->select('*')
        ->from('in_encuesta');
        $query = $this->db->get();
        
        
        $datos['content'] = 'backend/encuesta/listar'; //llamada al content de este metodo
        $datos['data']=$query->result();
        $datos['hide'] = false;  
        $datos['titulo'] = "Administrador de Encuesta / Listar";
        $datos['lista'] = $this->paginar; //$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Encuesta', 'bo/encuesta', 'Listado', '/bo/encuesta');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }


    function Listar(){
       
    




    }
    
    
    
    

}