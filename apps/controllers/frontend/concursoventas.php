<?php

if (!defined('BASEPATH'))    exit('No direct script access allowed');

class Concursoventas extends CI_Controller {

    function __construct() {

        parent::__construct();
        if (!$this->session->userdata('isLoged')) {
            redirect('login');
        } else {
            $this->load->model('abono_model');
            $this->load->model('socio_model');
            $this->load->library('paginar');
        }
    }

    function Index($pag = 1) {
        $datos['content'] = '/frontend/concursoventas/concurso_new';
        $datos['agentes'] = $this->socio_model->getSociosPorGerente($this->session->userdata('ide'));
        //$this->paginar->Rows = 9;
        //$this->paginar->setData($this->abono_model->getAbonoGerente($this->session->userdata('ide')));
        //$this->paginar->Page = $pag;
        //$this->paginar->Uri = BASE_URL . "solicitudes/" . $pag;
        $datos['lista'] = $this->abono_model->getAbonoGerente($this->session->userdata('ide'));
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    function abonar() {
        $in_data = array("rut_socio" => $this->input->post('rut')
            , "fecha" => $this->input->post('fecha')
            , "tipo_abono" => 6
            , "abono" => $this->input->post('puntos')
            , "descripcion" => $this->input->post('descripcion')
        );
        if ($this->abono_model->GuardarAbono($in_data)) {
            redirect('/concursoventas');
        }
    }

    function eliminar($id = null) {
        if ($this->abono_model->EliminarAbono($id)) {
            redirect('/concursoventas');
        }
    }

}
