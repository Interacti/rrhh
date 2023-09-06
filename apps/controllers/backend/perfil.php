<?php

// Este codigo es para validar que solo se pueda acceder desde index.php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Perfil extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		if (! $this->session->userdata ( 'bo_isLogued' )) {
			redirect ( 'bo/login/formLogin' );
		} else {
			$this->load->model ( 'usuarios_model' );
            	$this->load->model ( 'cartola_model' );
			$this->load->model ( 'perfil_model' );
			$this->load->library ( 'form_validation' );
		}
	}
	function Index() {
		$datos ['content'] = 'backend/perfil/listar'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['seccion'] = array (
				'Perfil',
				'/bo/perfil',
				'Listado',
				'/bo/perfil' 
		);
		$datos ['titulo'] = "Administrador de Perfiles / Listado";
		$datos ['data'] = $this->perfil_model->getPerfiles ();
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	function Agregar() {
		$datos ['content'] = 'backend/perfil/agregar'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['seccion'] = array (
				'Perfil',
				'/bo/perfil',
				'Listado',
				'/bo/perfil' 
		);
		$datos ['titulo'] = "Administrador de Perfiles / Listado";
		$datos ['modulos'] = $this->usuarios_model->getModulos ();
        $datos ['modulo']=$this->usuarios_model->Modular();
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	
	
	function Editar($id) {
		$datos ['content'] = 'backend/perfil/editar'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['seccion'] = array (
				'Perfil',
				'/bo/perfil',
				'Listado',
				'/bo/perfil'
		);
		$datos ['titulo'] = "Administrador de Perfiles / Listado";
		$datos['data']=$this->perfil_model->getPerfilById($id);
		$datos ['modulos'] = $this->usuarios_model->getModulos ();
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	

    function Prueba($rut){
        
        $this->cartola_model->PuntosBySocio($rut);
        
        echo($this->cartola_model->PuntosBySocio($rut));        
        
    }
	
	function Guardar() {
		$this->form_validation->set_rules ( 'descripcion', 'descripcion', 'required|trim|xss_clean|max_length[35]' );
		$this->form_validation->set_rules ( 'modulos', 'modulos', 'required' );
		$this->form_validation->set_rules ( 'estado', 'estado', 'required|trim|xss_clean|integer' );
		
		if ($this->form_validation->run () === FALSE) {
			
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('formdata', $this->input->post());
			redirect(BASE_URL.'bo/perfil/Agregar');
			
		} else {
			
			$modulos = implode ( "|", $this->input->post ( "modulos" ) );
			
			$data = array (
					"descripcion" => $this->input->post ( "descripcion" ),
					"modulos" => $modulos,
					"estado" => $this->input->post ( "estado" ) 
			);
			
			if ($this->perfil_model->GuardarPerfil ( $data )) {
				$this->session->set_flashdata ( 'oks', 'El Registro se <b>Agrego</b> de forma correcta' );
				redirect ( BASE_URL . 'bo/perfil' );
			} else {
				$this->session->set_flashdata ( 'errors', 'Se produjo un error al intentar guardar el registro' );
				redirect ( BASE_URL . 'bo/perfil/Agregar' );
			}
		}
	}
	
	function Actualizar() {
		$this->form_validation->set_rules ( 'descripcion', 'descripcion', 'required|trim|xss_clean|max_length[35]' );
		$this->form_validation->set_rules ( 'modulos', 'modulos', 'required' );
		$this->form_validation->set_rules ( 'estado', 'estado', 'required|trim|xss_clean|integer' );
	
		if ($this->form_validation->run () === FALSE) {
				
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('formdata', $this->input->post());
			redirect(BASE_URL.'bo/perfil/Agregar');
				
		} else {
				
			$modulos = implode ( "|", $this->input->post ( "modulos" ) );
				
			$data = array (
					"id_perfil"=> $this->input->post ( "id" ),
					"descripcion" => $this->input->post ( "descripcion" ),
					"modulos" => $modulos,
					"estado" => $this->input->post ( "estado" )
			);
				
			if ($this->perfil_model->ActualizarPerfil ( $data )) {
				$this->session->set_flashdata ( 'oks', 'El Registro se <b>Actualizo</b> de forma correcta' );
				redirect ( BASE_URL . 'bo/perfil' );
			} else {
				$this->session->set_flashdata ( 'errors', 'Se produjo un error al intentar actualizar el registro' );
				redirect ( BASE_URL . 'bo/perfil/Editar/$this->input->post ( "id" )' );
			}
		}
	}
	
}