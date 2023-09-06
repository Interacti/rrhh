<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Productos extends CI_Controller {

    protected $categoria = 'comercial-e-incentivo';
    protected $subcategoria = 'productos-y-servicio-destacados';

    public function __construct() {
        parent::__construct();
        $this->load->model('productos_model', 'productos');
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
        $this->paginar->Rows = 5;
        $this->paginar->setData($this->productos->getRows($con));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = base_url() . "comercial-e-incentivo/productos-y-servicio-destacados";

        $datos["info"] = $this->paginar;
        $datos['content'] = '/frontend/productos/index';
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
        $datos['content'] = '/frontend/productos/detalle';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

}
