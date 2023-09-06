<?php

// Este codigo es para validar que solo se pueda acceder desde index.php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banners extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('banners_model');
            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/banners/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/banners/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->banners_model->getBanners();
        $datos ['seccion'] = array(
            'Banners',
            '/bo/banners',
            'Listado',
            '/bo/banners'
        );
        $datos ['titulo'] = "Administrador de Banners / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/banners/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['seccion'] = array(
            'Banners',
            '/bo/banners',
            'Nuevo',
            '/bo/banners'
        );
        $datos ['titulo'] = "Administrador de Banners / Editar Banner";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {
        $datos ['content'] = 'backend/banners/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['rs'] = $this->banners_model->getBannersById($id);
        $datos ['seccion'] = array(
            'Banners',
            '/bo/banners',
            'Editar',
            '/bo/banners'
        );
        $datos ['titulo'] = "Administrador de Banners / Editar Banner";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Eliminar() {
        echo "Aqui va el formulario edit";
    }

    function Activar($id = 0, $estado = 0) {
        $this->banners_model->Activar($id, $estado);
        redirect(BASE_URL . 'bo/banners');
    }

    function Guardar() {
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required|trim|xss_clean|max_length[35]');
        $this->form_validation->set_rules('url', 'url', 'required|trim|xss_clean|valid_url_format');
        $this->form_validation->set_rules('target', 'target', 'required|trim|xss_clean');
        $this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'required|trim|xss_clean|max_length[10]');
        $this->form_validation->set_rules('fecha_termino', 'fecha_termino', 'required|trim|xss_clean|max_length[10]');
        $this->form_validation->set_rules('posicion', 'posicion', 'required|integer');
        $this->form_validation->set_rules('estado', 'estado', 'required|integer');

        /*
         * $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco'); $this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo'); $this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo'); $this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero'); $this->form_validation->set_message('valid_url_format', 'El campo %s debe ser una url valida');
         */

        if ($this->form_validation->run() === FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/banners/Agregar');
        } else {

            $config ['upload_path'] = './assets/frontend/img/banners/';
            $config ['allowed_types'] = 'gif|jpg|png';
            $config ['max_size'] = '1000';
            $config ['max_width'] = '1600';
            $config ['max_height'] = '400';
            $sbi = $this->SubirImagen($config, 'bnr_imagen');
            if (is_array($sbi) && count($sbi) > 0) {
                
                /* $config ['upload_path'] = './assets/frontend/img/banners/';
                 $config ['allowed_types'] = 'gif|jpg|png';
                 $config ['max_size'] = '1500';
                 $config ['max_width'] = '1500';
                 $config ['max_height'] = '400';
                               
                 $sbir = $this->SubirImagen($config, 'bnr_imagen_r');  */ 

                
                
                

                $inBanner = array(
                    "bnr_descripcion" => $this->input->post('descripcion'),
                    "bnr_image" => $sbi ['file_name'],
                    "bnr_imagen_r" =>  $sbi ['file_name'],
                    "bnr_url" => $this->input->post('url'),
                    "bnr_target" => $this->input->post('target'),
                    "bnr_inicio" => $this->input->post('fecha_inicio'),
                    "bnr_termino" => $this->input->post('fecha_termino'),
                    "bnr_posicion" => $this->input->post('posicion'),
                    "bnr_estado" => $this->input->post('estado'),
                    "bnr_fecha" => date('Y-m-d h:i:s')
                );

                if (!$this->banners_model->AgregarBanner($inBanner)) {
                    $dataLog = array(
                        'log_type' => 'Ingreso de Datos',
                        'title' => 'Agergar Banner',
                        'log' => 'Ingreso Nuevo Banner',
                        'logger' => $this->session->userdata('bo_usuario'),
                        'ip_address' => $this->input->ip_address(),
                        'created' => date('Y-m-d h:i:s'),
                        'status' => 'Fallo la Insercion',
                        'data' => json_encode($inBanner)
                    );
                    InsertLogApp($dataLog);
                    $this->session->set_flashdata('errors', "Error al insertar el registro");
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/banners/Agregar');
                } else {

                    $dataLog = array(
                        'log_type' => 'Ingreso de Datos',
                        'title' => 'Agergar Banner',
                        'log' => 'Ingreso Nuevo Banners',
                        'logger' => $this->session->userdata('bo_usuario'),
                        'ip_address' => $this->input->ip_address(),
                        'created' => date('Y-m-d h:i:s'),
                        'status' => 'Banner Agregado con exito',
                        'data' => json_encode($inBanner)
                    );
                    InsertLogApp($dataLog);


                    $this->session->set_flashdata('success', "registro ingresado con exito");
                    redirect(BASE_URL . 'bo/banners');
                }
            } else {

                $this->session->set_flashdata('errors', $sbi);
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/banners/Agregar');
            }
        }
    }

    function Actualizar() {

        $this->form_validation->set_rules('descripcion', 'descripcion', 'required|trim|xss_clean|max_length[35]');
        $this->form_validation->set_rules('url', 'url', 'required|trim|xss_clean');
        $this->form_validation->set_rules('target', 'target', 'required|trim|xss_clean');
        $this->form_validation->set_rules('fecha_inicio', 'fecha_inicio', 'required|trim|xss_clean|max_length[10]');
        $this->form_validation->set_rules('fecha_termino', 'fecha_termino', 'required|trim|xss_clean|max_length[10]');
        $this->form_validation->set_rules('posicion', 'posicion', 'required|integer');
        $this->form_validation->set_rules('estado', 'estado', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/banners/Editar/' . $this->input->post('id'));
        } else {

            if ($_FILES ['bnr_imagen'] ['name'] == "") {
                $img1 = $this->input->post('hd_bnr');
            } else {

                $config ['upload_path'] = './assets/frontend/images/banners/';
                $config ['allowed_types'] = 'gif|jpg|png';
                $config ['max_size'] = '1024';
                $config ['max_width'] = '700';
                $config ['max_height'] = '310';
                $sbi = $this->SubirImagen($config, 'bnr_imagen');
                if (is_array($sbi) && count($sbi) > 0) {
                    $img1 = $sbi ['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbi);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/banner/Editar/' . $this->input->post('id'));
                }
            }
            
           /* if ($_FILES ['bnr_imagen_r'] ['name'] == "") {
                $img2 = $this->input->post('hd_bnr_r');
            } else {
                $config ['upload_path'] = './assets/frontend/images/banners/';
                $config ['allowed_types'] = 'gif|jpg|png';
                $config ['max_size'] = '1500';
                $config ['max_width'] = '1500';
                $config ['max_height'] = '400';
                $sbir = $this->SubirImagen($config, 'bnr_imagen_r');
                
               
               
                
                if (is_array($sbir) && count($sbir) > 0) {
                    $img2 = $sbir ['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbir);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/banner/Editar/' . $this->input->post('id'));
                }
                
            }    */
                
            $inBanner = array(
                "id_banner" => $this->input->post('id'),
                "bnr_descripcion" => $this->input->post('descripcion'),
                "bnr_image" => $img1,
                "bnr_imagen_r" => $img1,
                "bnr_url" => $this->input->post('url'),
                "bnr_target" => $this->input->post('target'),
                "bnr_inicio" => $this->input->post('fecha_inicio'),
                "bnr_termino" => $this->input->post('fecha_termino'),
                "bnr_posicion" => $this->input->post('posicion'),
                "bnr_estado" => $this->input->post('estado'),
                "bnr_fecha" => date('Y-m-d h:i:s')
            );
            
            //print_r($inBanner);
            //die("****");

            if (!$this->banners_model->ActualizarBanner($inBanner)) {
                $dataLog = array(
                    'log_type' => 'Ingreso de Datos',
                    'title' => 'Actulizacion de Banner',
                    'log' => 'Actualiza Banner',
                    'logger' => $this->session->userdata('bo_usuario'),
                    'ip_address' => $this->input->ip_address(),
                    'created' => date('Y-m-d h:i:s'),
                    'status' => 'Fallo la Actulizacion',
                    'data' => json_encode($inBanner)
                );
                InsertLogApp($dataLog);
                $this->session->set_flashdata('errors', "Error al actualizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/banners/Editar/' . $this->input->post('id'));
            } else {
                $dataLog = array(
                    'log_type' => 'Ingreso de Datos',
                    'title' => 'Actulizacion Banner',
                    'log' => 'Actuliza Banner',
                    'logger' => $this->session->userdata('bo_usuario'),
                    'ip_address' => $this->input->ip_address(),
                    'created' => date('Y-m-d h:i:s'),
                    'status' => 'Banner Actualizado con exito',
                    'data' => json_encode($inBanner)
                );
                InsertLogApp($dataLog);
                $this->session->set_flashdata('success', "registro actualizado con exito");
                redirect(BASE_URL . 'bo/banners');
            }
        }
    }

    function EliminarBanner($id) {
        
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
