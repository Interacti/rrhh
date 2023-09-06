<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Costo extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('costo_model', 'costo');
            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/costo/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/costo/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->costo->getRows();
        $datos ['seccion'] = array(
            'Centros de Costo',
            'bo/costo',
            'Listado',
            'bo/costo/Listar'
        );
        $datos ['titulo'] = "Administrador de Centros de Costo / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/costo/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de Centros de Costo / Agregar Nuevo Centro de Costo";
        $datos ['seccion'] = array(
            'Centros de Costo',
            '/bo/costo',
            'Agregar Nuevo ',
            '/bo/costo/agregar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id
        );

        $datos ['modulo'] = 'costo';
        $datos ['accion'] = 'actualizar';
        $datos ['rs'] = $this->costo->getRows($con);
        $datos ['content'] = 'backend/costo/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de Centro de Costo / Editar Centro Costo";
        $datos ['seccion'] = array(
            'Centros de Costo',
            'bo/costo',
            'Editar Centro Costo',
            '/bo/costo/editar'
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
            redirect(BASE_URL . 'bo/costo/Agregar');
        } else {

           
                        $in = array(
                            "glosa"             =>  $this->input->post('titulo'),
                            "estado"            =>  $this->input->post('estado')
                        );
                        if (!$this->costo->insert($in)) {
                            $this->session->set_flashdata('errors', "Error al insertar el registro");
                            $this->session->set_flashdata('formdata', $this->input->post());
                            redirect(BASE_URL . 'bo/costo/Agregar');
                        } else {
                            $this->session->set_flashdata('success', "registro ingresado con exito");
                            redirect(BASE_URL . 'bo/costo');
                        }
                   
                
           
        }
    }

    function Actualizar() {
        $this->form_validation->set_rules('titulo', 'Descripcion', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('estado', 'Estado', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/costo/Editar/' . $this->input->post('id'));
        } else {

          
            $in = array(
                "glosa"             =>  $this->input->post('titulo'),
                "estado"            =>  $this->input->post('estado')
            );


            if (!$this->costo->update($in, array("id" => $this->input->post('id')))) {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/costo/Editar/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/costo');
            }
        }
    }

    function Activar($id = 0) {
        $cmsData    = array('estado' => 1);
        $update     = $this->costo->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La charla ha sido activada!");
        redirect(BASE_URL . 'bo/costo');
    }

    function Desactivar($id = 0) {
        $cmsData    = array('estado' => 0);
        $update     = $this->costo->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "registro desactivado!");
        redirect(BASE_URL . 'bo/costo');
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
