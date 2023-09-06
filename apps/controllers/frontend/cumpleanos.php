<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cumpleanos extends CI_Controller {

    protected $categoria = 'bienestar';
    protected $subcategoria = 'cumpleanos';

    function __construct() {
        parent::__construct();
        $this->load->model('socio_model', 'socio');
        $this->load->model('banners_model', 'banner');
    }

    function index() {
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);
        $datos['cumples'] = $this->socio->getCumpleanos();

        echo "<pre>";
        print_r($datos['cumples']);

        die();

        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $datos['content'] = '/frontend/cumpleanos/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos);
    }
    
    

}
