<?php

// Este codigo es para validar que solo se pueda acceder desde index.php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SubCategorias extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('bo_isLogued')){
            redirect('bo/login/formLogin');
        } else {  
            $this->load->model('categorias_model');
            $this->load->library('form_validation');
            
            
        }
        
        
    }

    function Index() {

         redirect('bo/subcategorias/Listar');
    }
    
    
    function Listar(){
    
        $datos['data']=$this->categorias_model->ListarSubCategorias();  
        $datos['content'] = 'backend/subcategorias/listar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Sub Categorias / Listar";
        //$datos['lista'] = $this->paginar;//$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Sub Categorias', '/bo/subcategorias', 'Listado', '/bo/subcategorias');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
    

    function Agregar() {
        $datos['content'] = 'backend/subcategorias/agregar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Categorias / Agregar Sub Categoria";
        $datos['lstCategorias']=$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Sub Categorias', '/bo/subcategorias', 'Agregar', '/bo/subcategorias/Agregar');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
    
    function Editar($id) {
    	
    	$datos['lstCategorias']=$this->categorias_model->ListarCategorias();
    	$datos['rs']=$this->categorias_model->ListarSubCategoriasById($id);
        $datos['content'] = 'backend/subcategorias/editar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Sub Categorias / Editar Sub categoria";
        $datos['seccion'] = array('Categorias', '/bo/categorias', 'Editar', '/bo/categorias');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
	
	
	
	function Activar($id=0,$estado=0){
		
	    $this->categorias_model->ActivarSub($id,$estado);
		redirect(BASE_URL.'bo/subcategorias');	
    }
	
	
    

    function Guardar() {
		$this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
		$this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
		$this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
		$this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');

        $this->form_validation->set_rules(
                'categoria', 
                'categoria', 
                'required|xss_clean'
        );


        $this->form_validation->set_rules(
                'subcategoria', 
                'subCategoria', 
                'required|xss_clean'
        );

        
        $this->form_validation->set_rules(
        		'estado',
        		'estado',
        		'required|xss_clean|integer'
        );
        
        if ($this->form_validation->run() == FALSE) {
            
			$this->session->set_flashdata('errors', validation_errors()); 
            $this->session->set_flashdata('formdata', $this->input->post()); 
            redirect(BASE_URL.'bo/subcategorias/Agregar');  
			
        } else {
			
			$inData=array(
							"id_categoria"=>$this->input->post('categoria'),
							"glosa_sub_categoria"=>$this->input->post('subcategoria'),
							"estado"=>$this->input->post('estado'),
							);
            if ($this->categorias_model->InsertarNuevaSubCategoria($inData)) {
				$this->session->set_flashdata('success', 'Registros agregado con exito'); 
				redirect(BASE_URL.'bo/subcategorias/Listar');
			}else {
				
				$this->session->set_flashdata('errors', validation_errors()); 
            	$this->session->set_flashdata('formdata', $this->input->post()); 
            	redirect(BASE_URL.'bo/subcategorias/Agregar');  
			}
            
        }
    }
	
	
	
	
	
    function Actualizar() {
    $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
		$this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
		$this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
		$this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');

        $this->form_validation->set_rules(
                'categoria', 
                'categoria', 
                'required|xss_clean'
        );


        $this->form_validation->set_rules(
                'subcategoria', 
                'subCategoria', 
                'required|xss_clean'
        );

        
        $this->form_validation->set_rules(
        		'estado',
        		'estado',
        		'required|xss_clean|integer'
        );
        
        if ($this->form_validation->run() == FALSE) {
            
			$this->session->set_flashdata('errors', validation_errors()); 
            $this->session->set_flashdata('formdata', $this->input->post()); 
            redirect(BASE_URL.'bo/subcategorias/Agregar');  
			
        } else {
			
			$inData=array(
							"id_sub_categoria"=>$this->input->post('id'),
							"id_categoria"=>$this->input->post('categoria'),
							"glosa_sub_categoria"=>$this->input->post('subcategoria'),
							"estado"=>$this->input->post('estado'),
							);
            if ($this->categorias_model->ActualizarSubCategoria($inData)) {
				$this->session->set_flashdata('success', 'Registros actualizado con exito'); 
				redirect(BASE_URL.'bo/subcategorias/Listar');
			}else {
				
				$this->session->set_flashdata('errors', validation_errors()); 
            	$this->session->set_flashdata('formdata', $this->input->post()); 
            	redirect(BASE_URL.'bo/subcategorias/Agregar');  
			}
            
        }
    }
}