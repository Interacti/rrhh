<?php

// Este codigo es para validar que solo se pueda acceder desde index.php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Proveedor extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('bo_isLogued')){
            redirect('bo/login/formLogin');
        } else {  
            $this->load->model('proveedor_model');
            $this->load->library('form_validation');
            $this->load->library('paginar');
            
        }
        
        
    }

    function Index() {

         redirect('bo/proveedor/Listar');
    }
    
    
    function Listar(){
    
        $datos['data']=$this->proveedor_model->getProveedores();  
        $datos['content'] = 'backend/proveedor/listar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Porveedores / Listar";
        $datos['lista'] = $this->paginar;//$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Proveedores', 'bo/proveedores', 'Listado', 'bo/proveedores');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
    

    function Agregar() {
        $datos['content'] = 'backend/proveedor/agregar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Proveedores / Agregar Proveedor";
        $datos['seccion'] = array('Proveedor', 'bo/categorias', 'Agregar', 'bo/categorias');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
    
    function Editar($id) {
        $datos['rs']=$this->proveedor_model->getProveedorById($id);
        $datos['content'] = 'backend/proveedor/editar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Proveedores / Editar Proveedor ";
        $datos['seccion'] = array('Proveedor', 'bo/proveedor', 'Editar', 'bo/proveedor');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
	
	
	
	function Activar($id=0,$estado=0){
		
	    $this->proveedor_model->Activar($id,$estado);
		redirect(BASE_URL.'bo/proveedor');	
    }
	
	
    

    function Guardar() {
       
	   $this->form_validation->set_rules(
                'rut', 
                'rut', 
                'valid_rut'
        );
	   
	    $this->form_validation->set_rules(
                'empresa', 
                'empresa', 
                'required|alpha_numeric|xss_clean|max_length[35]'
        );
	
		 $this->form_validation->set_rules(
                'contacto', 
                'contacto', 
                'xss_clean|max_length[35]'
        );
		
		 $this->form_validation->set_rules(
                'email', 
                'email', 
                'xss_clean|valid_email'
        );

        $this->form_validation->set_rules(
                'estado', 
                'estado', 
                'required|xss_clean|integer'
        );






        if ($this->form_validation->run() == FALSE) {
            
			$this->session->set_flashdata('errors', validation_errors()); 
            $this->session->set_flashdata('formdata', $this->input->post()); 
            redirect(BASE_URL.'bo/proveedor/Agregar');  
			
        } else {
			
			$inData=array(
						    "nombre_empresa"=>$this->input->post('empresa'),
							"rut_empresa"=>$this->input->post('rur'),
							"nombre_contacto"=>$this->input->post('contacto'),
							"email_contacto"=>$this->input->post('email'),
							"estado"=>$this->input->post('estado')
						
							);
            if ($this->proveedor_model->AddProveedor($inData)) {
				$this->session->set_flashdata('success', 'Registros agregado con exito'); 
				redirect(BASE_URL.'bo/proveedor/Listar');
			}else {
				
				$this->session->set_flashdata('errors', validation_errors()); 
            	$this->session->set_flashdata('formdata', $this->input->post()); 
            	redirect(BASE_URL.'bo/proveedor/Agregar');  
			}
            
        }
    }
	
	
	
	
	
    function Actualizar() {
		
       
	   $this->form_validation->set_rules(
                'rut', 
                'rut', 
                'valid_rut'
        );
	   
	    $this->form_validation->set_rules(
                'empresa', 
                'empresa', 
                'required|alpha_numeric|xss_clean|max_length[35]'
        );
	
		 $this->form_validation->set_rules(
                'contacto', 
                'contacto', 
                'xss_clean|max_length[35]'
        );
		
		 $this->form_validation->set_rules(
                'email', 
                'email', 
                'xss_clean|valid_email'
        );

        $this->form_validation->set_rules(
                'estado', 
                'estado', 
                'required|xss_clean|integer'
        );



        if ($this->form_validation->run() == FALSE) {
            
			$this->session->set_flashdata('errors', validation_errors()); 
            $this->session->set_flashdata('formdata', $this->input->post()); 
            redirect(BASE_URL.'bo/proveedor/Editar/'. $this->input->post('id_proveedor'));  
			
        } else {
			
			$inData=array(
							"id_proveedor"=>$this->input->post('id_proveedor'),
						    "nombre_empresa"=>$this->input->post('empresa'),
							"rut_empresa"=>$this->input->post('rut'),
							"nombre_contacto"=>$this->input->post('contacto'),
							"email_contacto"=>$this->input->post('email'),
							"estado"=>$this->input->post('estado')
						
							);
            if ($this->proveedor_model->UpdateProveedor($inData)) {
				$this->session->set_flashdata('success', 'Registros Actualizado con exito'); 
				redirect(BASE_URL.'bo/proveedor/Listar');
			}else {
				
				$this->session->set_flashdata('errors', validation_errors()); 
            	$this->session->set_flashdata('formdata', $this->input->post()); 
            	redirect(BASE_UL.'bo/proveedor/Editar/'. $this->input->post('id'));  
			}
            
        }
    }
	
	
	
	
	

}