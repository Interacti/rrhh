<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Concurso extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('concurso_model', 'concurso');
            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/concurso/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/concurso/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->concurso->getRows();
        $datos ['seccion'] = array(
            'Nuevos concurso',
            '/bo/concurso',
            'Listado',
            '/bo/concurso/Listar'
        );
        $datos ['titulo'] = "Administrador de Nuevos concurso / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/concurso/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de concurso / Agregar Nuevos concurso";
        $datos ['seccion'] = array(
            'concurso',
            '/bo/concurso',
            'Agregar concurso',
            '/bo/concurso/agregar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id
        );

        $datos ['modulo'] = 'concurso';
        $datos ['accion'] = 'actualizar';
        $datos ['rs'] = $this->concurso->getRows($con);
        $datos ['content'] = 'backend/concurso/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de concurso / Editar concurso";
        $datos ['seccion'] = array(
            'Nuevos concurso',
            'bo/concurso',
            'Nuevos concurso',
            '/bo/concurso/editar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Guardar() {
        $this->form_validation->set_rules('titulo', 'Nombre', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('fecha_evento', 'Fecha Ingreso', 'required|trim|xss_clean');
        $this->form_validation->set_rules('bajada', 'Bajada', 'required|trim');
        $this->form_validation->set_rules('texto', 'Texto', 'required|trim');
        $this->form_validation->set_rules('estado', 'Estado', 'required|trim');

        /* $this->form_validation->set_message ( 'required', 'El campo %s no debe estar en blanco' );
          $this->form_validation->set_message ( 'min_length', 'El campo %s debe tener %s caracteres como minimo' );
          $this->form_validation->set_message ( 'max_length', 'El campo %s debe tener %s caracteres como maximo' );
          $this->form_validation->set_message ( 'integer', 'El campo %s debe ser un numero entero' ); */

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/concurso/Agregar');
        } else {

            $imagen_mini ['upload_path'] = './assets/frontend/img/concurso/';
            $imagen_mini ['allowed_types'] = 'gif|jpg|png';
            $imagen_mini ['max_size'] = '2000';
            $sbi = $this->SubirImagen($imagen_mini, 'imagen1');
            if (is_array($sbi) && count($sbi) > 0) {
                $imagen_mini = $sbi ['file_name'];

                $in = array(
                    "title" => $this->input->post('titulo'),
                    "event_date" => $this->input->post('fecha_evento'),
                    "slug" => seo($this->input->post('titulo')),
                    "category" => "0",
                    "excerpt" => $this->input->post('bajada'),
                    "content" => $this->input->post('texto'),
                    "list_image" => $imagen_mini,
                    "created_at" => date('Y-m-d h:i:s'),
                    "status" => $this->input->post('estado')
                );
                if (!$this->concurso->insert($in)) {
                    $this->session->set_flashdata('errors', "Error al insertar el registro");
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/concurso/Agregar');
                } else {
                    $this->session->set_flashdata('success', "registro ingresado con exito");
                    redirect(BASE_URL . 'bo/concurso');
                }
            } else {

                $this->session->set_flashdata('errors', $sbi);
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/concurso/Agregar');
            }
        }
    }

    function Actualizar() {
        $this->form_validation->set_rules('titulo', 'Nombre', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('fecha_evento', 'Fecha Ingreso', 'required|trim|xss_clean');
        $this->form_validation->set_rules('bajada', 'Bajada', 'required|trim');
        $this->form_validation->set_rules('texto', 'Texto', 'required|trim');
        $this->form_validation->set_rules('estado', 'Estado', 'required|trim');




        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/concurso/Editar/' . $this->input->post('id'));
        } else {

            /**
             * imagen miniatura
             */
            if ($_FILES['imagen1']['name'] == "") {
                $imagen_mini = $this->input->post('hdImg1');
            } else {

                $imagen_mini ['upload_path'] = './assets/frontend/img/concurso/';
                $imagen_mini ['allowed_types'] = 'gif|jpg|png';
                $imagen_mini ['max_size'] = '1000';
                $sbi = $this->SubirImagen($imagen_mini, 'imagen1');

                if (is_array($sbi) && count($sbi) > 0) {
                    $imagen_mini = $sbi['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbi);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/concurso/Editar/' . $this->input->post('id'));
                }
            }

            $in = array(
                "title" => $this->input->post('titulo'),
                "event_date" => $this->input->post('fecha_evento'),
                "slug" => seo($this->input->post('titulo')),
                "category" => "0",
                "excerpt" => $this->input->post('bajada'),
                "content" => $this->input->post('texto'),
                "list_image" => $imagen_mini,
                "created_at" => date('Y-m-d h:i:s'),
                "status" => $this->input->post('estado')
            );


            if (!$this->concurso->update($in, array("id" => $this->input->post('id')))) {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/concurso/Editar/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/concurso');
            }
        }
    }

    function Activar($id = 0) {
        $cmsData = array('status' => 1);
        $update = $this->concurso->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La charla ha sido activada!");
        redirect(BASE_URL . 'bo/concurso');
    }

    function Desactivar($id = 0) {
        $cmsData = array('status' => 0);
        $update = $this->concurso->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "registro desactivado!");
        redirect(BASE_URL . 'bo/concurso');
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
