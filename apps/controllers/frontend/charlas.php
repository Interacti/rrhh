<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Charlas extends CI_Controller {

    protected $categoria = 'bienestar';
    protected $subcategoria = 'charlas-de-seguridad';

    public function __construct() {
        parent::__construct();
        $this->load->model('charlas_model', 'charlas');
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
        $this->paginar->Rows = 3;
        $this->paginar->setData($this->charlas->getRows($con));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = base_url() . "bienestar/charlas-de-seguridad";

        $datos["info"] = $this->paginar;
        $datos['content'] = '/frontend/charlas/index';
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
        $datos['contenido'] = $this->charlas->getRows($con);
        $datos['content'] = '/frontend/charlas/detalle';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

}
