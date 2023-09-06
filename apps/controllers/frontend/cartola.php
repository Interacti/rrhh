<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Cartola extends CI_Controller {

    public function __construct() {
        parent::__construct();
		if (!$this->session->userdata('isLoged')){
            		redirect('login');
		} else {
		      $this->load->model('cartola_model','cartola');
		      $this->load->library('paginar');
		}
    }

    public function Index($pag=0) {
        $this->paginar->Rows =5;
        $this->paginar->setData($this->cartola->getCartola($this->session->userdata('id')));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = BASE_URL."cartola"  ;
        $datos['content']= '/frontend/cartola/cartola';
	    $datos['cartola']=  $this->paginar; //$this->cartola->getCartola($this->session->userdata('id'));
        $datos['camino_migas'] =   array('INICIO'=>BASE_URL,'CARTOLA DE PUNTOS'=>BASE_URL."cartola");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
      
    }
 
	public function listado($pag=0) {
        $this->paginar->Rows =5;
        $this->paginar->setData($this->cartola->getCartola($this->session->userdata('id')));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = BASE_URL."cartola"  ;
        $datos['content']= '/frontend/cartola/cartola';
	    $datos['cartola']=  $this->paginar; //$this->cartola->getCartola($this->session->userdata('id'));
        $datos['camino_migas'] =   array('INICIO'=>BASE_URL,'CARTOLA DE PUNTOS'=>BASE_URL."cartola");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
      
    }
    
    
    
    
    public function Filtro(){
         print_r($_POST);
        
    }
       
       

}