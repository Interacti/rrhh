<?php

// Este codigo es para validar que solo se pueda acceder desde index.php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Abono extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('bo_isLogued')) {


            redirect('bo/login/formLogin');
        } else {
            $this->load->model('abono_model');
            $this->load->model('tipo_abono_model');
            $this->load->library('form_validation');
            $this->load->library('paginar');
            $this->form_validation->set_error_delimiters('<li>', '</li>');
        }
    }

    function index() {
        $datos['content'] = 'backend/abono/listado'; //llamada al content de este metodo
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Abonos / Nuevo Abono";
        $datos['lista'] = $this->abono_model->getAbonosSocios();
        $datos['seccion'] = array('Abonos', '/bo/Abono', 'Agregar', '/bo/abono');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Agregar() {
        $datos['tipo'] = $this->tipo_abono_model->GetTipoAbonos();
        $this->load->view('backend/abono/agregar', $datos); //llamada a la vista general
    }

    function Guardar() {

        $this->form_validation->set_rules('rut', 'rut', 'required|trim|xss_clean|max_length[12]|valid_rut');
        $this->form_validation->set_rules('abono', 'abono', 'required|trim|xss_clean|integer');
        $this->form_validation->set_rules('motivo', 'motivo', 'required|trim|xss_clean');
        $this->form_validation->set_rules('puntos', 'puntos', 'required|trim|xss_clean|is_numeric');
        $this->form_validation->set_rules('fecha', 'fecha', 'required|trim|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                "succes" => "error",
                "rut" => form_error('rut'),
                "motivo" => form_error('motivo'),
                "abono" => form_error('abono'),
                "puntos" => form_error('puntos'),
                "fecha" => form_error('fecha')
            );

            echo json_encode($data);
            exit;
        } else {
            $inData = array(
                "rut_socio" => $this->input->post("rut"),
                "fecha" => $this->input->post("fecha"),
                "tipo_abono" => $this->input->post("abono"),
                "descripcion" => $this->input->post("motivo"),
                "abono" => $this->input->post("puntos")
            );

            if ($this->abono_model->GuardarAbono($inData)) {

                $dataLog = array(
                    'log_type' => 'Ingreso de Datos',
                    'title' => 'Agergar Abono',
                    'log' => 'Ingreso de abono a socio',
                    'logger' => $this->session->userdata('bo_usuario'),
                    'ip_address' => $this->input->ip_address(),
                    'created' => date('Y-m-d h:i:s'),
                    'status' => 'Abono Agregado con exito',
                    'data' => json_encode($inData)
                );
                InsertLogApp($dataLog);

                $data = array(
                    "succes" => "OK",
                    "msg" => 'Registros Agregado con exito'
                );

                echo json_encode($data);
            } else {

                $dataLog = array(
                    'log_type' => 'Ingreso de Datos',
                    'title' => 'Agergar Abono',
                    'log' => 'Ingreso de abono a socio',
                    'logger' => $this->session->userdata('bo_usuario'),
                    'ip_address' => $this->input->ip_address(),
                    'created' => date('Y-m-d h:i:s'),
                    'status' => 'Fallo la Insercion',
                    'data' => json_encode($inData)
                );
                InsertLogApp($dataLog);

                $data = array(
                    "succes" => "error",
                    "msg" => 'Registros no pudo ser agregado'
                );

                echo json_encode($data);
            }
        }
    }

    
}
