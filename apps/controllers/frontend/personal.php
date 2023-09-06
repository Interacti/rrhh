<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Personal extends CI_Controller {

    protected $categoria = 'bienestar';
    protected $subcategoria = 'personal-destacado';
   

    public function __construct() {
        parent::__construct();
        $this->load->model('personal_model', 'personal');
        $this->load->model('banners_model', 'banner');
        $this->load->library('paginar');
    }

    public function index($pag = 1) {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        //$datos['subcategoria_slug']= $this->subcategoria_slug;
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);

        $this->paginar->Rows = 3;
        $this->paginar->setData($this->personal->getRows());
        $this->paginar->Page = $pag;
        $this->paginar->Uri = base_url() . "bienestar/personal-destacado";

        $datos["info"] = $this->paginar;
        $datos['content'] = '/frontend/destacados/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/    
    }
    
    
    /*function index($page = 0) {
        
      
        
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);
        
        
        
        $RecordCount = $this->personal->getRows();
        $this->paginacion->Rows = 3;
        $this->paginacion->TotalRecords = $RecordCount;
        $this->paginacion->Page = $page;
        $this->paginacion->SetData
                ($this->noticias->getRows(array(
                    'limit' => $this->paginacion->Rows,
                    'start' => $page == 0 ? 0 : (($page - 1) * $this->paginacion->Rows)
        )));
       
        $this->paginacion->Uri = base_url() . "bienestar/personal-destacado/";

        //$data['news'] = $this->paginacion;
        
        $datos["info"] = $this->paginacion;
        $datos['content'] = '/frontend/personal/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos);
        
        
        
       
        //$this->load->view('frontend/layout/layout', $data);
    }*/

    

    public function details($param) {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'slug' => $param,
        );
        $datos['contenido'] = $this->personal->getRows($con);
        $datos['content'] = '/frontend/destacados/detalle';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }

}
