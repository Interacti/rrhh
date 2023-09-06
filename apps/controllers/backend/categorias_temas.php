<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Categorias_temas extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('categorias_temas_model');
            $this->load->library('form_validation');
            $this->load->library('paginar');
        }
    }

    function Index() {

        redirect('bo/categorias_temas/Listar');
    }

    function Listar() {

        $datos['data'] = $this->categorias_temas_model->ListarCategorias();
        $datos['content'] = 'backend/categorias_temas/listar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Categorias / Listar";
        $datos['lista'] = $this->paginar; //$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Categorias Temas', '/bo/categorias_temas', 'Listado', '/bo/categorias_temas');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Agregar() {
        $datos['content'] = 'backend/categorias_temas/agregar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Categorias / Agregar Categoria";
        $datos['seccion'] = array('Categorias', '/bo/categorias', 'Agregar', '/bo/categorias');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Editar($id) {
        $datos['rs'] = $this->categorias_temas_model->ListarCategoriasById($id);
        $datos['content'] = 'backend/categorias_temas/editar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Categorias / Editar Categoria";
        $datos['seccion'] = array('Categorias', '/bo/categorias', 'Editar', '/bo/categorias');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Activar($id = 0, $estado = 0) {

        $this->categorias_model->Activar($id, $estado);
        redirect(BASE_URL . 'bo/categorias_temas');
    }

    function Guardar() {

        $this->form_validation->set_rules(
                'descripcion', 'Descripcion Categoria', 'required|xss_clean|max_length[35]'
        );


        $this->form_validation->set_rules(
                'estado', 'Estado Categoria', 'required|xss_clean|integer'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/categorias_temas/Agregar');
        } else {

            $inData = array(
                "glosa_categoria" => $this->input->post('descripcion'),
                "estado" => $this->input->post('estado'),
            );
            if ($this->categorias_temas_model->InsertarNuevaCategoria($inData)) {
                $this->session->set_flashdata('success', 'Registros agregado con exito');
                redirect(BASE_URL . 'bo/categorias_temas/Listar');
            } else {

                $this->session->set_flashdata('errors', validation_errors());
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/categorias_temas/Agregar');
            }
        }
    }

    function Actualizar() {
        $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
        $this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');

        $this->form_validation->set_rules(
                'descripcion', 'Descripcion Categoria', 'required|xss_clean|max_length[35]'
        );


        $this->form_validation->set_rules(
                'estado', 'Estado Categoria', 'required|xss_clean|integer'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_UL . 'bo/categorias_temas/Editar/' . $this->input->post('id'));
        } else {

            $inData = array(
                "id_categoria" => $this->input->post('id'),
                "glosa_categoria" => $this->input->post('descripcion'),
                "estado" => $this->input->post('estado'),
            );
            if ($this->categorias_temas_model->ActualizarCategoria($inData)) {
                $this->session->set_flashdata('success', 'Registros Actualizado con exito');
                redirect(BASE_URL . 'bo/categorias_temas/Listar');
            } else {

                $this->session->set_flashdata('errors', validation_errors());
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_UL . 'bo/categorias_temas/Editar/' . $this->input->post('id'));
            }
        }
    }

}
