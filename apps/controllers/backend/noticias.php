<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticias extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('noticias_model', 'noticias');

            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/noticias/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/noticias/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->noticias->getRows();
        $datos ['seccion'] = array(
            'Noticias',
            '/bo/noticias',
            'Listado',
            '/bo/noticias/Listar'
        );
        $datos ['titulo'] = "Administrador de Noticias / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/noticias/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de Noticias / Agregar Noticias";
        $datos ['seccion'] = array(
            'Noticias',
            '/bo/noticias',
            'Agregar Noticias',
            '/bo/noticias/agregar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id
        );

        $datos ['modulo'] = 'noticias';
        $datos ['accion'] = 'actualizar';
        $datos ['rs'] = $this->noticias->getRows($con);
        $datos ['content'] = 'backend/noticias/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de Noticias / Editar Noticias";
        $datos ['seccion'] = array(
            'Noticias',
            'bo/noticias',
            'Editar Noticia',
            '/bo/temas/editar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Guardar() {
        
         
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('category', 'Categoria', 'required|trim|integer');
        $this->form_validation->set_rules('bajada', 'bajada', 'required|trim');
        $this->form_validation->set_rules('texto', 'texto', 'required|trim');
        $this->form_validation->set_rules('estado', 'estado', 'required|trim');

        /* $this->form_validation->set_message ( 'required', 'El campo %s no debe estar en blanco' );
          $this->form_validation->set_message ( 'min_length', 'El campo %s debe tener %s caracteres como minimo' );
          $this->form_validation->set_message ( 'max_length', 'El campo %s debe tener %s caracteres como maximo' );
          $this->form_validation->set_message ( 'integer', 'El campo %s debe ser un numero entero' ); */

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/noticias/Agregar');
        } else {

            $imagen_mini ['upload_path'] = './assets/frontend/img/noticias/';
            $imagen_mini ['allowed_types'] = 'gif|jpg|png';
            $imagen_mini ['max_size'] = '2000';
            $sbi = $this->SubirImagen($imagen_mini, 'imagen1');
            if (is_array($sbi) && count($sbi) > 0) {
                $imagen_mini = $sbi ['file_name'];
                $config_prin ['upload_path'] = './assets/frontend/img/noticias/';
                $config_prin ['allowed_types'] = 'gif|jpg|png';
                $config_prin ['max_size'] = '2000';
                $sbd = $this->SubirImagen($config_prin, 'imagen2');
                if (is_array($sbd) && count($sbd) > 0) {
                    $imagen_prin = $sbd ['file_name'];
                    $config_attach ['upload_path'] = './assets/frontend/pdf/noticias/';
                    $config_attach ['allowed_types'] = 'pdf|xlsx|docx|doc|xls|ppt|pptx|txt';
                    $config_attach ['max_size'] = '2000';
                    $fileAttach = $this->SubirImagen($config_attach, 'fileAdd');
                    if (is_array($fileAttach) && count($fileAttach) > 0) {
                        $fileAt = $fileAttach['file_name'];
                    } else {
                        $fileAt = '';
                    }
                    $in = array(
                        "title" => $this->input->post('titulo'),
                        "slug" => seo($this->input->post('titulo')),
                        "category" => $this->input->post('category'),
                        "excerpt" => $this->input->post('bajada'),
                        "content" => $this->input->post('texto'),
                        "list_image" => $imagen_mini,
                        "feature_image" => $imagen_prin,
                        "alternate_file" => $fileAt,
                        "created_at" => date('Y-m-d h:i:s'),
                        "status" => $this->input->post('estado')
                    );
                    if (!$this->noticias->insert($in)) {
                        $this->session->set_flashdata('errors', "Error al insertar el registro");
                        $this->session->set_flashdata('formdata', $this->input->post());
                        redirect(BASE_URL . 'bo/noticias/Agregar');
                    } else {
                        $this->session->set_flashdata('success', "registro ingresado con exito");
                        redirect(BASE_URL . 'bo/noticias');
                    }
                } else {

                    $this->session->set_flashdata('errors', $sbd);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/noticias/Agregar');
                }
            } else {

                $this->session->set_flashdata('errors', $sbi);
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/noticias/Agregar');
            }
        }
    }

    function Actualizar() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('category', 'Categoria', 'required|trim|integer');
        //$this->form_validation->set_rules ( 'categoria', 'categoria', 'required|trim|xss_clean|integer' );
        $this->form_validation->set_rules('bajada', 'bajada', 'required|trim');
        $this->form_validation->set_rules('texto', 'texto', 'required|trim');
        $this->form_validation->set_rules('estado', 'estado', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
        $this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');


        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/noticias/Editar/' . $this->input->post('id'));
        } else {

            /**
             * imagen miniatura
             */
            if ($_FILES['imagen1']['name'] == "") {
                $imagen_mini = $this->input->post('hdImg1');
            } else {

                $imagen_mini ['upload_path'] = './assets/frontend/img/noticias/';
                $imagen_mini ['allowed_types'] = 'gif|jpg|png';
                $imagen_mini ['max_size'] = '1000';
                $sbi = $this->SubirImagen($imagen_mini, 'imagen1');

                if (is_array($sbi) && count($sbi) > 0) {
                    $imagen_mini = $sbi['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbi);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/noticias/Editar/' . $this->input->post('id'));
                }
            }


            /**
             * Imagen interna
             */
            if ($_FILES['imagen2']['name'] == "") {
                $imagen_prin = $this->input->post('hdImg2');
            } else {
                $config_prin ['upload_path'] = './assets/frontend/img/noticias/';
                $config_prin ['allowed_types'] = 'gif|jpg|png';
                $config_prin ['max_size'] = '1000';
                $sbd = $this->SubirImagen($config_prin, 'imagen2');
                if (is_array($sbd) && count($sbd) > 0) {
                    $imagen_prin = $sbd['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbd);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/noticias/Editar/' . $this->input->post('id'));
                }
            }

            /**
             * archivo adicional
             */
            if ($_FILES['fileAdd']['name'] == "") {
                $fileAt = $this->input->post('hdfileAdd');
            } else {
                $config_attach ['upload_path'] = './assets/frontend/pdf/noticias/';
                $config_attach ['allowed_types'] = 'pdf|xlsx|docx|doc|xls|ppt|pptx|txt';
                $config_attach ['max_size'] = '2000';

                //print_r($_FILES['fileAdd']);


                $fileAttach = $this->SubirImagen($config_attach, 'fileAdd');


                if (is_array($fileAttach) && count($fileAttach) > 0) {
                    $fileAt = $fileAttach['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $fileAttach);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/noticias/Editar/' . $this->input->post('id'));
                }
            }

            $in = array(
                "title" => $this->input->post('titulo'),
                "slug" => seo($this->input->post('titulo')),
                "category" => $this->input->post('category'),
                "excerpt" => $this->input->post('bajada'),
                "content" => $this->input->post('texto'),
                "list_image" => $imagen_mini,
                "feature_image" => $imagen_prin,
                "alternate_file" => $fileAt,
                "created_at" => date('Y-m-d h:i:s'),
                "status" => $this->input->post('estado')
            );


            if (!$this->noticias->update($in, array("id" => $this->input->post('id')))) {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/noticias/Editar/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/noticias');
            }
        }
    }

    function Activar($id = 0) {
        $cmsData = array('status' => 1);
        $update = $this->noticias->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La noticia ha sido activada!");
        redirect(BASE_URL . 'bo/noticias');
    }

    function Desactivar($id = 0) {
        $cmsData = array('status' => 0);
        $update = $this->noticias->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La noticia ha sido desactivada!");
        redirect(BASE_URL . 'bo/noticias');
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
