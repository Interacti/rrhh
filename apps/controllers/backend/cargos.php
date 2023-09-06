<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cargos extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('cargo_model', 'cargos');
            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/cargos/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/cargos/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->cargos->getRows();
        $datos ['seccion'] = array(
            'Nuevos cargos',
            '/bo/cargos',
            'Listado',
            '/bo/cargos/Listar'
        );
        $datos ['titulo'] = "Administrador de Nuevos cargos / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/cargos/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de cargos / Agregar Nuevos cargos";
        $datos ['seccion'] = array(
            'cargos',
            '/bo/cargos',
            'Agregar cargos',
            '/bo/cargos/agregar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id
        );

        $datos ['modulo'] = 'cargos';
        $datos ['accion'] = 'actualizar';
        $datos ['rs'] = $this->cargos->getRows($con);
        $datos ['content'] = 'backend/cargos/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de cargos / Editar cargos";
        $datos ['seccion'] = array(
            'Nuevos cargos',
            'bo/cargos',
            'Nuevos cargos',
            '/bo/cargos/editar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Guardar() {
        $this->form_validation->set_rules('titulo', 'Nombre', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('estado', 'Estado', 'required|trim');

        /* $this->form_validation->set_message ( 'required', 'El campo %s no debe estar en blanco' );
          $this->form_validation->set_message ( 'min_length', 'El campo %s debe tener %s caracteres como minimo' );
          $this->form_validation->set_message ( 'max_length', 'El campo %s debe tener %s caracteres como maximo' );
          $this->form_validation->set_message ( 'integer', 'El campo %s debe ser un numero entero' ); */

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/cargos/Agregar');
        } else {

           
                        $in = array(
                            "glosa"             =>  $this->input->post('titulo'),
                            "estado"            =>  $this->input->post('estado')
                        );
                        if (!$this->cargos->insert($in)) {
                            $this->session->set_flashdata('errors', "Error al insertar el registro");
                            $this->session->set_flashdata('formdata', $this->input->post());
                            redirect(BASE_URL . 'bo/cargos/Agregar');
                        } else {
                            $this->session->set_flashdata('success', "registro ingresado con exito");
                            redirect(BASE_URL . 'bo/cargos');
                        }
                   
                
           
        }
    }

    function Actualizar() {
        $this->form_validation->set_rules('titulo', 'Descripcion', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('estado', 'Estado', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/cargos/Editar/' . $this->input->post('id'));
        } else {

          
            $in = array(
                "glosa"             =>  $this->input->post('titulo'),
                "estado"            =>  $this->input->post('estado')
            );


            if (!$this->cargos->update($in, array("id" => $this->input->post('id')))) {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/cargos/Editar/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/cargos');
            }
        }
    }

    function Activar($id = 0) {
        $cmsData    = array('status' => 1);
        $update     = $this->cargos->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La charla ha sido activada!");
        redirect(BASE_URL . 'bo/cargos');
    }

    function Desactivar($id = 0) {
        $cmsData    = array('status' => 0);
        $update     = $this->cargos->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "registro desactivado!");
        redirect(BASE_URL . 'bo/cargos');
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
