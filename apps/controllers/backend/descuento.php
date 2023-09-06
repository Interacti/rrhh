<?php
// Este codigo es para validar que solo se pueda acceder desde index.php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
    
 class Descuento extends CI_Controller {
    
    
    
    function __construct(){
        parent::__construct();
        
         if (!$this->session->userdata('bo_isLogued')){
            redirect('bo/login/formLogin');
        } else {  
            $this->load->model('descuento_model');
            $this->load->model('tipo_abono_model');
            $this->load->library('form_validation');
            $this->load->library('paginar');
            
        }
    }
    
    function index(){
    	$datos['content'] = 'backend/descuento/agregar'; //llamada al content de este metodo
    	$datos['hide'] = false;
    	$datos['titulo'] = "Administrador de Descuentos / Nuevo Descuentos";
    	$datos['tipo']= $this->tipo_abono_model->GetTipoDescuentos();
    	$datos['lista']=$this->descuento_model->getDescuentoSocios();
    	$datos['seccion'] = array('Descuentos', 'bo/descuento', 'Descuento', 'bo/descuento');
    	$this->load->view('backend/layout', $datos); //llamada a la vista general
    	}
    	
    	
   
   function Guardar(){
   	
   	$this->form_validation->set_rules ( 'rut', 'rut', 'required|trim|xss_clean|max_length[12]|valid_rut' );
   	$this->form_validation->set_rules ( 'descuento', 'descuento', 'required|trim|xss_c	lean|integer' );
   	$this->form_validation->set_rules ( 'puntos', 'puntos', 'required|trim|xss_clean|integer' );
   	$this->form_validation->set_rules ( 'fecha', 'fecha', 'required|trim|xss_clean' );
   	

   		if ($this->form_validation->run() == FALSE) {
   	
   			$this->session->set_flashdata('errors', validation_errors());
   			$this->session->set_flashdata('formdata', $this->input->post());
   			redirect(BASE_URL.'bo/descuento');   	
   		}else {
   			$inData=array(
   							"rut_socio"=>$this->input->post("rut"),
   							"fecha"=>$this->input->post("fecha"),
   							"tipo_descuento"=>$this->input->post("descuento"),
   							"descuento"=>$this->input->post("puntos")
   							);
   			

   			
   			if ($this->descuento_model->GuardarDescuento($inData)){
   				
   				$this->session->set_flashdata('success', 'Registros Agregado con exito');
   				redirect(BASE_URL.'bo/descuento');
   			}
   		
   		}
   	
   }
    
    
   
   function Eliminar($id){
   	
   	    
   	
   	
   }
    
    
 }
