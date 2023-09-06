<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Televenta extends CI_Controller {

    function __construct() {

        parent::__construct();
        if (!$this->session->userdata('isLoged')) {
            redirect('login');
        } else {
            $this->load->model('abono_model');
            $this->load->model('socio_model');
            $this->load->library('Form_validation');
            $this->load->library('pagination');
            
        }
    }

    function Index() {
        $page=0;
       //print_r($this->uri->segment_array());
       $config['per_page']=0;
       // $config['base_url'] = base_url() . 'televenta/index/';
       // $config['total_rows'] = $this->abono_model->TotalGetAbonoTeleventas();
       // $config['per_page'] = 10; 
       // $config['num_links'] = 5;
       // $config["uri_segment"] = 3;
       // $this->pagination->initialize($config);
       // $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       // echo $page;
       //print_r($this->abono_model->getAbonoTeleventas($config['per_page'],$page));
        
       // $datos["links"] = $this->pagination->create_links();
        $datos['content'] = '/frontend/televenta/televenta_new';
        $datos['agentes'] = $this->socio_model->getAgentesTeleventas();
        $datos['lista'] = $this->abono_model->getAbonoTeleventas($config['per_page'],$page);
        $datos['meses'] = array('0', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    function AbonarTeleventa() {

        // Abona a Supervisor televentas
        $this->form_validation->set_rules('rut', 'rut', 'required|trim|xss_clean|max_length[12]|valid_rut');
        $this->form_validation->set_rules('puntos', 'puntos', 'required|trim|xss_clean|is_numeric');
        $this->form_validation->set_rules('descripcion', 'descripcion', 'required|trim|xss_clean');
        $this->form_validation->set_rules('fecha', 'fecha', 'required|trim|xss_clean');

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('errors', validation_errors('<li>', '</li>'));
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'televenta');
        } else {

            $in_data = array(
                "rut_socio" => $this->input->post('rut'),
                "fecha" => $this->input->post('fecha'),
                "tipo_abono" => 18,
                "abono" => $this->input->post('puntos'),
                "descripcion" => $this->input->post('descripcion')
            );

            if ($this->abono_model->GuardarAbono($in_data)) {
                $this->session->set_flashdata('success', 'Registro Agregado con exito');
                redirect(BASE_URL . 'televenta');
            }
        }


    }

    //
}
