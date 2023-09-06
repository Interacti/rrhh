<?php
ob_start();
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cobranza extends CI_Controller {

    protected $categoria = 'rrhh';
    protected $subcategoria = 'cobranza';

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoged')) {
            redirect('login');
        }
        $this->load->model('banners_model', 'banner');
        $this->load->model('Ventas_Model', 'ventas');
        $this->load->library('paginacion');
        $this->load->helper('download');
         $this->load->helper('assets');
    }

  

    function index() {
        //$rutLiq = explode('-', $this->session->userdata['rutliq']);
        
        $rutLiq = explode('-', $this->session->userdata['rutliq']);
        if (ceil($rutLiq[0])<10000000){
            $rutLiq[0]='0'.ceil($rutLiq[0]);
        }
        
        
        $con['conditions'] = array(
            'key' => $rutLiq[0],
        );
        $con['limit'] = 3; 
        $datos['categoria'] = $this->categoria;
        $datos['subcategoria'] = $this->subcategoria;
        $datos['banner'] = $this->banner->getBannersByCategoria($this->subcategoria);
        $datos['liq']=$this->ventas->getRows($con);
        $datos['content'] = '/frontend/cobranza/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general*/    
    }

    public function details($param) {
       
    }
    
    public function descargar($file){
        $con['returnType'] ='single';
        $con['conditions'] = array(
            'serial' => $file,
        );
        $file=$this->ventas->getRows($con);
        $data = file_get_contents( base_url() . "assets/frontend/vendedores/".$file[0]->name); // Read the file's contents
        ob_end_clean() ;
        force_download($file[0]->name,$data);
        die();
    }

}
