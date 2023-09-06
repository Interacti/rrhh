<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Galeria extends CI_Controller {

    protected $categoria = 'bienestar';
    protected $subcategoria = 'galeria-de-fotos';

    public function __construct() {
        parent::__construct();
        $this->load->model('galeria_model', 'galeria');
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
        $this->paginar->setData($this->galeria->getRows($con));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = base_url() . "bienestar/galeria-de-fotos";

        $datos["info"] = $this->paginar;
        $datos['content'] = '/frontend/galeria/index';
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
        $galery=$this->galeria->getRows($con);
        //echo "<pre>";
       // print_r($this->galeria->getImagesByGaleryId($galery[0]->id));
        
        
        $datos['contenido'] = $this->galeria->getImagesByGaleryId($galery[0]->id);
        $datos['content'] = '/frontend/galeria/detalle';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

}
