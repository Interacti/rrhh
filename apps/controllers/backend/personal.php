<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personal extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('personal_model', 'personal');
            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/personal/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/personal/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->personal->getRows();
        $datos ['seccion'] = array(
            'Personal Destacado',
            '/bo/personal',
            'Listado',
            '/bo/personal/Listar'
        );
        $datos ['titulo'] = "Administrador de Personal Destacado / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/personal/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de Personal Destacado / Agregar Personal Destacado";
        $datos ['seccion'] = array(
            'personal',
            '/bo/personal',
            'Agregar personal',
            '/bo/personal/agregar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id
        );

        $datos ['modulo'] = 'personal';
        $datos ['accion'] = 'actualizar';
        $datos ['rs'] = $this->personal->getRows($con);
        $datos ['content'] = 'backend/personal/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de personal / Editar Personal Destacado";
        $datos ['seccion'] = array(
            'personal',
            'bo/personal',
            'Editar personal',
            '/bo/personal/editar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Guardar() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('fecha_evento', 'Fecha Evento', 'required|trim|xss_clean');
        $this->form_validation->set_rules('bajada', 'bajada', 'required|trim');
        $this->form_validation->set_rules('texto', 'texto', 'required|trim');
        $this->form_validation->set_rules('estado', 'estado', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/personal/Agregar');
        } else {

            $imagen_mini ['upload_path'] = './assets/frontend/img/destacado/';
            $imagen_mini ['allowed_types'] = 'gif|jpg|png';
            $imagen_mini ['max_size'] = '2000';
            $sbi = $this->SubirImagen($imagen_mini, 'imagen1');
            if (is_array($sbi) && count($sbi) > 0) {
                $imagen_mini = $sbi ['file_name'];
                $config_prin ['upload_path'] = './assets/frontend/img/destacado/';
                $config_prin ['allowed_types'] = 'gif|jpg|png';
                $config_prin ['max_size'] = '2000';
                $sbd = $this->SubirImagen($config_prin, 'imagen2');
                if (is_array($sbd) && count($sbd) > 0) {
                    $imagen_prin = $sbd ['file_name'];
                         $in = array(
                            "title"             =>  $this->input->post('titulo'),
                            "event_date"        =>  $this->input->post('fecha_evento'),         
                            "slug"              =>  seo($this->input->post('titulo')),
                            "category"          =>  "0",
                            "excerpt"           =>  $this->input->post('bajada'),
                            "content"           =>  $this->input->post('texto'),
                            "list_image"        =>  $imagen_mini,
                            "feature_image"     =>  $imagen_prin,
                           
                            "created_at"        =>  date('Y-m-d h:i:s'),
                            "status"            =>  $this->input->post('estado')
                        );
                        if (!$this->personal->insert($in)) {
                            $this->session->set_flashdata('errors', "Error al insertar el registro");
                            $this->session->set_flashdata('formdata', $this->input->post());
                            redirect(BASE_URL . 'bo/personal/Agregar');
                        } else {
                            $this->session->set_flashdata('success', "registro ingresado con exito");
                            redirect(BASE_URL . 'bo/personal');
                        }
                    
                } else {

                    $this->session->set_flashdata('errors', $sbd);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/personal/Agregar');
                }
            } else {

                $this->session->set_flashdata('errors', $sbi);
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/personal/Agregar');
            }
        }
    }

    function Actualizar() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('fecha_evento', 'Fecha Evento', 'required|trim|xss_clean');
        //$this->form_validation->set_rules ( 'categoria', 'categoria', 'required|trim|xss_clean|integer' );
        $this->form_validation->set_rules('bajada', 'bajada', 'required|trim');
        $this->form_validation->set_rules('texto', 'texto', 'required|trim');
        $this->form_validation->set_rules('estado', 'estado', 'required|trim');

        //$this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
        //$this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
        //$this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
        //$this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');


        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/personal/Editar/' . $this->input->post('id'));
        } else {

            /**
             * imagen miniatura
             */
            if ($_FILES['imagen1']['name'] == "") {
                $imagen_mini = $this->input->post('hdImg1');
            } else {

                $imagen_mini ['upload_path'] = './assets/frontend/img/destacado/';
                $imagen_mini ['allowed_types'] = 'gif|jpg|png';
                $imagen_mini ['max_size'] = '1000';
                $sbi = $this->SubirImagen($imagen_mini, 'imagen1');

                if (is_array($sbi) && count($sbi) > 0) {
                    $imagen_mini = $sbi['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbi);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/personal/Editar/' . $this->input->post('id'));
                }
            }


            /**
             * Imagen interna
             */
            if ($_FILES['imagen2']['name'] == "") {
                $imagen_prin = $this->input->post('hdImg2');
            } else {
                $config_prin ['upload_path'] = './assets/frontend/img/destacado/';
                $config_prin ['allowed_types'] = 'gif|jpg|png';
                $config_prin ['max_size'] = '1000';
                $sbd = $this->SubirImagen($config_prin, 'imagen2');
                if (is_array($sbd) && count($sbd) > 0) {
                    $imagen_prin = $sbd['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbd);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/personal/Editar/' . $this->input->post('id'));
                }
            }

            

            $in = array(
                "title"             =>  $this->input->post('titulo'),
                "event_date"        =>  $this->input->post('fecha_evento'),        
                "slug"              =>  seo($this->input->post('titulo')),
                "category"          =>  "0",
                "excerpt"           =>  $this->input->post('bajada'),
                "content"           =>  $this->input->post('texto'),
                "list_image"        =>  $imagen_mini,
                "feature_image"     =>  $imagen_prin,
              
                "created_at"        =>  date('Y-m-d h:i:s'),
                "status"            =>  $this->input->post('estado')
            );


            if (!$this->personal->update($in, array("id" => $this->input->post('id')))) {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/personal/Editar/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/personal');
            }
        }
    }

    function Activar($id = 0) {
        $cmsData    = array('status' => 1);
        $update     = $this->personal->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La persona ha sido activada!");
        redirect(BASE_URL . 'bo/personal');
    }

    function Desactivar($id = 0) {
        $cmsData    = array('status' => 0);
        $update     = $this->personal->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La persona ha sido desactivada!");
        redirect(BASE_URL . 'bo/personal');
    }

    function SubirImagen($data = null, $campo = null) {
        $this->upload->initialize($data);
        if (!$this->upload->do_upload($campo)) {
            return $this->upload->display_errors();
        } else {
            return $this->upload->data();
        }
    }

}
