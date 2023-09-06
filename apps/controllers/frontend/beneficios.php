<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Beneficios extends CI_Controller
{

    protected $categoria = 'bienestar';

    protected $subcategoria = 'beneficios-y-convenios';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('beneficios_model', 'beneficios');
        $this->load->model('banners_model', 'banner');
        $this->load->library('paginacion');
        $this->load->helper('assets');        
                
    }

    public function index2($pag = 1)
    {
        /*
         * $datos['categoria'] = $this->categoria;
         * $datos['subcategoria'] = $this->subcategoria;
         * $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);
         * $con['conditions'] = array(
         * 'category' => 0
         * );
         *
         *
         * $this->paginar->Rows = 3;
         * $this->paginar->setData($this->beneficios->getRows($con));
         * $this->paginar->Page = $pag;
         * $this->paginar->Uri = base_url() . "bienestar/beneficios-y-convenios";
         *
         * $datos["info"] = $this->paginar;
         * $datos['content'] = '/frontend/beneficios/index';
         * $datos['titulo'] = "Caren";
         * $this->load->view('frontend/layout', $datos); // llamada a la vista general
         */
    }

    function index($page = 0)
    {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);
        $con['returnType'] = 'count';
        $con['conditions'] = array(
            'category' => 0
        );
       
        
        $RecordCount = $this->beneficios->getRows($con);
        $this->paginacion->Rows = 15;
        $this->paginacion->TotalRecords = $RecordCount;
        $this->paginacion->Page = $page;
       
        $rec['conditions'] = array(
            'category' => 0
        );
        $rec['order'] = array(
            'id' => 'desc'
        );
        $rec['limit'] = $this->paginacion->Rows;
        $rec['start'] = ($page == 0 ? 0 : (($page - 1) * $this->paginacion->Rows));
        $this->paginacion->SetData($this->beneficios->getRows($rec));
        
        $this->paginacion->Uri = base_url() . "bienestar/beneficios-y-convenios/";
        
        // $data['news'] = $this->paginacion;
        
        $datos["info"] = $this->paginacion;
        $datos['content'] = '/frontend/beneficios/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos);
        
        // $this->load->view('frontend/layout/layout', $data);
    }

    public function details($param)
    {
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        
        $con['conditions'] = array(
            'category' => $param
        );
        $datos['contenido'] = $this->beneficios->getRows($con);
        $datos['content'] = '/frontend/beneficios/detalle';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/
    }
}
