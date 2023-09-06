<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Noticiascom extends CI_Controller {

    protected $categoria = 'comercial-e-incentivo';
    protected $subcategoria = 'noticias-comerciales';

    public function __construct() {
        parent::__construct();
        $this->load->model('noticias_model', 'noticias');
        $this->load->model('banners_model', 'banner');
        $this->load->library('paginacion');
    }

    public function index2($pag = 1) {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);

        $this->paginar->Rows = 3;
        $this->paginar->setData($this->noticias->getRows());
        $this->paginar->Page = $pag;
        $this->paginar->Uri = base_url() . "bienestar/noticias-internas";

        $datos["info"] = $this->paginar;
        $datos['content'] = '/frontend/noticiascom/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/    
    }

    function index($page = 0) {
        
      
        
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);
        
        $con['returnType'] ='count';
        $con['conditions'] = array(
            'category' => 2,
        );
        $RecordCount = $this->noticias->getRows($con);
        $this->paginacion->Rows = 2;
        $this->paginacion->TotalRecords = $RecordCount;
        $this->paginacion->Page = $page;
        $this->paginacion->SetData
                ($this->noticias->getRows(
                        array(
                    'conditions'=>array('category'=>2),        
                    'limit' => $this->paginacion->Rows,
                    'start' => $page == 0 ? 0 : (($page - 1) * $this->paginacion->Rows)
        )));
       
        $this->paginacion->Uri = base_url() . "bienestar/noticias-comerciales/";

        //$data['news'] = $this->paginacion;
        
        $datos["info"] = $this->paginacion;
        $datos['content'] = '/frontend/noticiascom/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos);
        
        
        
       
        //$this->load->view('frontend/layout/layout', $data);
    }

    public function details($param) {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'slug' => $param,
        );
        $datos['contenido'] = $this->noticias->getRows($con);
        $datos['content'] = '/frontend/noticiascom/detalle';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

}
