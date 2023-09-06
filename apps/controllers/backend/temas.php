<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class temas extends CI_Controller {
	function __construct() {
		parent::__construct ();
		if (! $this->session->userdata ( 'bo_isLogued' )) {
			redirect ( 'bo/login/formLogin' );
		} else {
			$this->load->model ( 'temas_model' );
			$this->load->model ( 'categorias_temas_model','categoria' );
			$this->load->library ( 'Form_validation' );
			$this->load->library ( 'upload' );
		}
	}
	function Index() {
		redirect ( 'bo/temas/Listar' );
	}
	
	function Listar() {
		$datos ['content'] = 'backend/temas/listar'; // llamada al content de este metodo
		$datos ['hide'] = false; 
		$datos ['data'] = $this->temas_model->ListarTemas ();
		$datos ['seccion'] = array (
				'Temas',
				'/bo/temas',
				'Listado',
				'/bo/temas/Listar' 
		);
		$datos ['titulo'] = "Administrador de Temas / Listado";
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	
	
	function Agregar() {
		$datos ['content'] = 'backend/temas/agregar'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['titulo'] = "Administrador de Temas / Agregar Tema";
		$datos ['seccion'] = array (
				'Temas Interes',
				'/bo/temas',
				'Agregar', 
				'/bo/temas/agregar' 
		);
		
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	
	function Editar($id) {
		$datos ['rs'] = $this->temas_model->GetTemaById ( $id );
		$datos ['content'] = 'backend/temas/editar'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['titulo'] = "Administrador de Temas / Editar Tema";
		$datos ['seccion'] = array (
				'Temas Interes',
				'bo/temas',
				'Editar tema',
				'/bo/temas/editar'
		);
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	
	
	
	
	function Guardar() {
		$this->form_validation->set_rules ( 'titulo', 'titulo', 'required|trim|xss_clean|max_length[100]' );
		$this->form_validation->set_rules ( 'categoria', 'categoria', 'required|trim|xss_clean|integer' );
		$this->form_validation->set_rules ( 'bajada', 'bajada', 'required|trim' );
		$this->form_validation->set_rules ( 'texto', 'texto', 'required|trim' );
		$this->form_validation->set_rules ( 'estado', 'estado', 'required|trim' );
		
		$this->form_validation->set_message ( 'required', 'El campo %s no debe estar en blanco' );
		$this->form_validation->set_message ( 'min_length', 'El campo %s debe tener %s caracteres como minimo' );
		$this->form_validation->set_message ( 'max_length', 'El campo %s debe tener %s caracteres como maximo' );
		$this->form_validation->set_message ( 'integer', 'El campo %s debe ser un numero entero' );
		
		if ($this->form_validation->run () === FALSE) {
			
			$this->session->set_flashdata ( 'errors', validation_errors () );
			$this->session->set_flashdata ( 'formdata', $this->input->post () );
			redirect ( BASE_URL . 'bo/temas/Agregar' );
		} else {
			

           

			$imagen_mini ['upload_path'] = './assets/frontend/img/temas/';
			$imagen_mini ['allowed_types'] = 'gif|jpg|png';
			$imagen_mini ['max_size'] = '2000';
			//$imagen_mini ['max_width'] = '316';
			//$imagen_mini ['max_height'] = '150';
			
			$sbi = $this->SubirImagen ( $imagen_mini, 'imagen1' );
			if (is_array ( $sbi ) && count ( $sbi ) > 0) {
				
				$imagen_mini = $sbi ['file_name'];
				
				$config_prin ['upload_path'] = './assets/frontend/img/temas/';
				$config_prin ['allowed_types'] = 'gif|jpg|png';
				$config_prin ['max_size'] = '2000';
				//$config_prin ['max_width'] = '225';
				//$config_prin ['max_height'] = '231';
				
				$sbd = $this->SubirImagen ( $config_prin, 'imagen2' );
				
				if (is_array ( $sbd ) && count ( $sbd ) > 0) {
					$imagen_prin = $sbd ['file_name'];
					$inTema = array (
							"titulo" => $this->input->post ( 'titulo' ),
                            "seo" => seo($this->input->post ( 'titulo' )),
                            "categoria" => $this->input->post ( 'categoria' ),
							"bajada" => $this->input->post ( 'bajada' ),
							"texto" => $this->input->post ( 'texto' ),
							"img1" => $imagen_mini,
							"img2" => $imagen_prin,
							"fecha" => date ( 'Y-m-d h:i:s' ),
							"estado" => $this->input->post ( 'estado' ) 
					);
					
					if (! $this->temas_model->InsertarNuevoTema ( $inTema )) {
						$this->session->set_flashdata ( 'errors', "Error al insertar el registro" );
						$this->session->set_flashdata ( 'formdata', $this->input->post () );
						redirect ( BASE_URL . 'bo/temas/Agregar' );
					} else {
						$this->session->set_flashdata ( 'success', "registro ingresado con exito" );
						redirect ( BASE_URL . 'bo/temas' );
					}
				} else {
					
					$this->session->set_flashdata ( 'errors', $sbd );
					$this->session->set_flashdata ( 'formdata', $this->input->post () );
					redirect ( BASE_URL . 'bo/temas/Agregar' );
				}
			} else {
				
				$this->session->set_flashdata ( 'errors', $sbi );
				$this->session->set_flashdata ( 'formdata', $this->input->post () );
				redirect ( BASE_URL . 'bo/temas/Agregar' );
			}
		}
	}
	
	
	
	function Actualizar() {
		$this->form_validation->set_rules ( 'titulo', 'titulo', 'required|trim|xss_clean' );
		$this->form_validation->set_rules ( 'categoria', 'categoria', 'required|trim|xss_clean|integer' );
		$this->form_validation->set_rules ( 'bajada', 'bajada', 'required|trim' );
		$this->form_validation->set_rules ( 'texto', 'texto', 'required|trim' );
		$this->form_validation->set_rules ( 'estado', 'estado', 'required|trim' );
		
		$this->form_validation->set_message ( 'required', 'El campo %s no debe estar en blanco' );
		$this->form_validation->set_message ( 'min_length', 'El campo %s debe tener %s caracteres como minimo' );
		$this->form_validation->set_message ( 'max_length', 'El campo %s debe tener %s caracteres como maximo' );
		$this->form_validation->set_message ( 'integer', 'El campo %s debe ser un numero entero' );
	
		 
		if ($this->form_validation->run() === FALSE) {
	
			$this->session->set_flashdata('errors', validation_errors());
			$this->session->set_flashdata('formdata', $this->input->post());
			redirect(BASE_URL.'bo/temas/Editar/'.$this->input->post('id'));
		 
	
		} else {
				
		
				
			if ($_FILES['imagen1']['name']==""){
				$imagen_mini=$this->input->post('hdImg1');
			}   else  {
				
				$imagen_mini ['upload_path'] = './assets/frontend/img/temas/';
				$imagen_mini ['allowed_types'] = 'gif|jpg|png';
				$imagen_mini ['max_size'] = '2000';
				//$imagen_mini ['max_width'] = '316';
				//$imagen_mini ['max_height'] = '150';
				
				$sbi = $this->SubirImagen ( $imagen_mini, 'imagen1' );
				if (is_array($sbi) && count($sbi)>0){
					$imagen_mini=$sbi['file_name'];
				} else {

					$this->session->set_flashdata('errors',  $sbi);
					$this->session->set_flashdata('formdata', $this->input->post());
					redirect(BASE_URL.'bo/temas/Editar/'.$this->input->post('id'));
				}
					
			}
				
				
			if ($_FILES['imagen2']['name']==""){
				$imagen_prin=$this->input->post('hdImg2');
			} else {
				$config_prin ['upload_path'] = './assets/frontend/img/temas/';
				$config_prin ['allowed_types'] = 'gif|jpg|png';
				$config_prin ['max_size'] = '2000';
				//$config_prin ['max_width'] = '1000';
				//$config_prin ['max_height'] = '231';
				$sbd = $this->SubirImagen ( $config_prin, 'imagen2' );
				if (is_array($sbd) && count($sbd)>0){
					$imagen_prin=$sbd['file_name'];
				} else {
					$this->session->set_flashdata('errors',  $sbd);
					$this->session->set_flashdata('formdata', $this->input->post());
					redirect(BASE_URL.'bo/temas/Editar/'.$this->input->post('id'));
				}
			}
				
			$inTema = array (
							"id" => $this->input->post ( 'id' ),
							"titulo" => $this->input->post ( 'titulo' ),
                            "seo" => seo($this->input->post ( 'titulo' )),
							"categoria" => $this->input->post ( 'categoria' ),
							"bajada" => $this->input->post ( 'bajada' ),
							"texto" => $this->input->post ( 'texto' ),
							"img1" => $imagen_mini,
							"img2" => $imagen_prin,
							"fecha" => date ( 'Y-m-d h:i:s' ),
							"estado" => $this->input->post ( 'estado' ) 
			);
	
	
	       
			
			if (!$this->temas_model->ActualizarTema($inTema)){
				$this->session->set_flashdata('errors',  "Error al actulizar el registro");
				$this->session->set_flashdata('formdata', $this->input->post());
				redirect(BASE_URL.'bo/temas/Editar/'.$this->input->post('id'));
					
			} else {
				$this->session->set_flashdata('success',  "registro ingresado con exito");
				redirect(BASE_URL.'bo/temas');
			}
	
				
				
		}
	
	
	}
	
	
	
	
	
	function Activar($id=0,$estado=0){
	
		$this->temas_model->ActivarDesactivar($id,$estado);
		redirect(BASE_URL.'bo/temas');
	}
	
	
	
	
	function SubirImagen($data = null, $campo = null) {
		$this->upload->initialize ( $data );
		if (! $this->upload->do_upload ( $campo )) {
			return $this->upload->display_errors ();
		} else {
			return $this->upload->data ();
		}
	}
	
	
}