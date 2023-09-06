<?php

class Solicitudes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoged')) {
            redirect('login');
        } else {
            $this->load->model('solicitud_model');
            $this->load->library('paginar');
        }
    }

    public function Index($pag = 1) {
        $datos['content'] = '/frontend/solicitudes/solicitudes';
        //$datos['']=$this->solicitud_model->getSolicitudBySocio($this->session->userdata('id'));		
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'LISTADO SOLICITUDES' => BASE_URL . "solicitudes");
        $this->paginar->Rows = 9;
        //$this->paginar->setData($this->solicitud_model->getSolicitudBySocio($this->session->userdata('id')));
        //$this->paginar->Page = $pag;
        //$this->paginar->Uri = BASE_URL."solicitudes/".$pag;      
        $datos['lista'] = $this->solicitud_model->getSolicitudBySocio($this->session->userdata('id')); //$this->paginar;
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function Detalle($id) {
        $datos['content'] = '/frontend/solicitudes/detalle';
        $datos['solicitud'] = $id;
        $datos['detalle'] = $this->solicitud_model->getCanjeByIdSolicitud($id);
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'LISTADO SOLICITUDES' => BASE_URL . "solicitudes", "DETALLE" => BASE_URL . "solicitudes/detalle/" . $id);
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/     
    }

}
