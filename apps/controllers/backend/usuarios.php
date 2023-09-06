<?php

// Este codigo es para validar que solo se pueda acceder desde index.php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    function __construct() {
        parent::__construct();
           
        if (!$this->session->userdata('bo_isLogued')){
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('usuarios_model');
             $this->load->model('perfil_model');
            $this->load->library('form_validation');
            $this->load->library('paginar');
            $this->load->library('encrypt');
            $this->form_validation->set_error_delimiters('<li>', '</li>');
        }
    }

    function Index() {

        redirect('backend/usuarios/Listar');
    }

    function Listar() {

        $datos['content'] = 'backend/usuarios/listar'; //llamada al content de este metodo
        $datos['data']=$this->usuarios_model->ListarUsuarios(); 
        $datos['hide'] = false;  
        $datos['titulo'] = "Administrador de Usuarios / Listar";
        $datos['lista'] = $this->paginar; //$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Usuarios', '/bo/usuarios', 'Listado', '/bo/usuarios');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
    
    
     function Agregar() {
        $datos['content'] = 'backend/usuarios/agregar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['perfiles']=$this->perfil_model->getPerfilesActivos(); 
        $datos['titulo'] = "Administrador de Usuarios / Agregar Usuario";
        $datos['seccion'] = array('Usuarios', '/bo/usuarios', 'Agregar', '/bo/usuarios');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
    
    function Editar($id) {
        $datos['rs']=$this->usuarios_model->getUserById($id);
        $datos['content'] = 'backend/usuarios/editar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['perfiles']=$this->perfil_model->getPerfilesActivos(); 
        $datos['titulo'] = "Administrador de Usuarios / Editar Usuario";
        $datos['seccion'] = array('Usuarios', '/bo/usuarios', 'Editar', '/bo/usuarios');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }


    function Eliminar($id) {
       // $datos['rs']=$this->usuarios_model->getUserById($id);
        $datos['content'] = 'backend/usuarios/eliminar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['id']=$id;
        $datos['titulo'] = "Administrador de Usuarios / Eliminar Usuario";
        $datos['seccion'] = array('Usuarios', '/bo/usuarios', 'Eliminar', '/bo/usuarios/Eliminar');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    
    function Guardar() {

        $this->form_validation->set_rules(
                'nombre', 
                'Nombre Usuario', 
                'required|xss_clean'
        );
        
        
        $this->form_validation->set_rules(
                'apellido', 
                'Apellido Usuario', 
                'required|xss_clean'
        );
        
        $this->form_validation->set_rules(
                'email', 
                'Email Usuario', 
                'required|xss_clean|valid_email'
        );
        
        
        $this->form_validation->set_rules(
                'usuario', 
                'Nombre Usuario', 
                'required|xss_clean|min_length[6]'
        );
        
        $this->form_validation->set_rules(
                'password', 
                'password Usuario', 
                'required|xss_clean|min_length[6]'
        );
        
        $this->form_validation->set_rules(
        		'perfil',
        		'perfil ',
        		'required|xss_clean'
        );
        

        $this->form_validation->set_rules(
                'estado', 
                'Estado ', 
                'required|xss_clean'
        );
        
       
        
        

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors()); 
            $this->session->set_flashdata('formdata', $this->input->post()); 
            redirect(BASE_URL.'bo/usuarios/Agregar');
        } else {
            
        	$data=array(
        				'nombre' =>$this->input->post('nombre'),
        				'apellido' =>$this->input->post('apellido'),
        				'email' =>$this->input->post('email'),
        				'username' =>$this->input->post('usuario'),
        				'perfil' =>$this->input->post('perfil'),
	        			'password' =>$this->encrypt->encode($this->input->post('password')),
	        			'userpass' =>md5(SEEDPASS.$this->input->post('password')),
        				'estatus' =>$this->input->post('estado'),
        				'user_add' =>date('Y-m-d H:i:s')
        			);
        	
        	
        	$this->usuarios_model->AddUser($data);
            $this->session->set_flashdata('oks', 'El Registro se <b>Agrego</b> de forma correcta');
            redirect(BASE_URL.'bo/usuarios');
        }
    }
    
    
    
    
      function Actualizar() {

        $this->form_validation->set_rules(
                'nombre', 
                'Nombre Usuario', 
                'required|xss_clean'
        );
        
        
        $this->form_validation->set_rules(
                'apellido', 
                'Apellido Usuario', 
                'required|xss_clean'
        );
        
        $this->form_validation->set_rules(
                'email', 
                'Email Usuario', 
                'required|xss_clean|valid_email'
        );
        
        
        $this->form_validation->set_rules(
                'usuario', 
                'Nombre Usuario', 
                'required|xss_clean|min_length[6]'
        );
        
        $this->form_validation->set_rules(
                'password', 
                'password Usuario', 
                'required|xss_clean|min_length[6]'
        );

        $this->form_validation->set_rules(
                'estado', 
                'Estado Usuario', 
                'required|xss_clean'
        );
        
     
        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', 'Verifique Los Campos obligatorios'); 
            $this->session->set_flashdata('formdata', $this->input->post()); 
            redirect(BASE_URL.'bo/usuarios/Editar/'.$this->input->post('id'));
        } else {

            $data=array(
                        'id' =>$this->input->post('id'),
                        'nombre' =>$this->input->post('nombre'),
                        'apellido' =>$this->input->post('apellido'),
                        'email' =>$this->input->post('email'),
                        'username' =>$this->input->post('usuario'),
                        'perfil' =>$this->input->post('perfil'),
                        'password' =>$this->encrypt->encode($this->input->post('password')),
                        'userpass' =>md5(SEEDPASS.$this->input->post('password')),
                        'estatus' =>$this->input->post('estado'),
                        'user_add' =>date('Y-m-d H:i:s')
                    );
            



        	if ($this->usuarios_model->UpdateUser($data)){
                    $this->session->set_flashdata('success', 'El Registro se <b>Actualizo</b> de forma correcta');
                    redirect(BASE_URL.'bo/usuarios');
            } else{
                    $this->session->set_flashdata('errors', 'Error al Actualizar el registros ['.$this->input->post('id').']'); 
                    $this->session->set_flashdata('formdata', $this->input->post()); 
                    redirect(BASE_URL.'bo/usuarios/Editar/'.$this->input->post('id'));

            }
        }
    }

    
    function Activar($id=0,$estado=0){
       	$this->usuarios_model->ActivarDesactivar($id,$estado);
    	redirect(BASE_URL.'bo/usuarios');
    }
    
    
    
    
}