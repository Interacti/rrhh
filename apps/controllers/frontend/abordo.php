<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Abordo extends CI_Controller {

    protected $categoria = 'RRHH';
    protected $subcategoria = 'nuevos-a-bordo-equipo-caren';

    public function __construct() {
        parent::__construct();
        $this->load->model('abordo_model', 'abordo');
        $this->load->model('banners_model', 'banner');
        $this->load->library('paginar');
    }

    public function index($pag = 1) {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);
        $con['conditions'] = array(
            'status' => 1,
        );
        
       // print_r($this->abordo->getRows($con));
        
        
        $this->paginar->Rows = 3;
        $this->paginar->setData($this->abordo->getRows($con));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = base_url() . "rrhh/nuevos-a-bordo-equipo-caren";

        //print_r($this->paginar );
        
        
        $datos["info"] = $this->paginar;
        $datos['content'] = '/frontend/abordo/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/    
    }

    public function details($param) {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'slug' => $param,
        );
        $datos['contenido'] = $this->abordo->getRows($con);
        $datos['content'] = '/frontend/abordo/detalle';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

}
