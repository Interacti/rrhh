<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menus extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('menus_model','menu');
            $this->load->library('form_validation');
            $this->load->library('paginar');
        }
    }

    function Index() {

        redirect('bo/menus/Listar');
    }

    function Listar() {

        $datos['data'] = $this->menu->ListarMenus();
        $datos['content'] = 'backend/menus/listar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Categorias / Listar";
        $datos['lista'] = $this->paginar; //$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Menus', '/bo/menus', 'Listado', '/bo/menus');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Agregar() {
        $datos['content'] = 'backend/menus/agregar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de menus / Agregar menus";
        $datos['seccion'] = array('menus', '/bo/menus', 'Agregar', '/bo/menus');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Editar($id) {
        $datos['rs'] = $this->categorias_model->ListarCategoriasById($id);
        $datos['content'] = 'backend/menus/editar'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Categorias / Editar Categoria";
        $datos['seccion'] = array('menus', '/bo/menus', 'Editar', '/bo/menus');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Activar($id = 0, $estado = 0) {

        $this->categorias_model->Activar($id, $estado);
        redirect(BASE_URL . 'bo/categorias');
    }

    function Guardar() {

        $this->form_validation->set_rules(
                'descripcion', 'Descripcion Menu', 'required|xss_clean|max_length[35]'
        );


        $this->form_validation->set_rules(
                'estado', 'Estado Categoria', 'required|xss_clean|integer'
        );

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/categorias/Agregar');
        } else {

            $inData = array(
                "glosa_categoria" => $this->input->post('descripcion'),
                "estado" => $this->input->post('estado'),
            );
            if ($this->categorias_model->InsertarNuevaCategoria($inData)) {
                $this->session->set_flashdata('success', 'Registros agregado con exito');
                redirect(BASE_URL . 'bo/categorias/Listar');
            } else {

                $this->session->set_flashdata('errors', validation_errors());
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/categorias/Agregar');
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
            redirect(BASE_UL . 'bo/categorias/Editar/' . $this->input->post('id'));
        } else {

            $inData = array(
                "id_categoria" => $this->input->post('id'),
                "glosa_categoria" => $this->input->post('descripcion'),
                "estado" => $this->input->post('estado'),
            );
            if ($this->categorias_model->ActualizarCategoria($inData)) {
                $this->session->set_flashdata('success', 'Registros Actualizado con exito');
                redirect(BASE_URL . 'bo/categorias/Listar');
            } else {

                $this->session->set_flashdata('errors', validation_errors());
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_UL . 'bo/categorias/Editar/' . $this->input->post('id'));
            }
        }
    }

}
