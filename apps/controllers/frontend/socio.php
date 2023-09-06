<?php 


class Socios extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        if (!$this->session->userdata('bo_isLogued')){
            redirect('bo/login/formLogin');
        } else {
             $this->load->model('socio_model');
             $this->load->model('cartola_model');
             $this->load->library('form_validation');
             $this->load->library('paginar');
        }
        
        
    }

    function Index() {

        $datos['content']= '/frontend/actulizadatos/frm_update'; 
        //$datos['data']=$this->socio_model->getSocios(); 
        $datos['hide'] = false;  
        //$datos['titulo'] = "Administrador de socios / Listar";
        //$datos['lista'] = $this->paginar; //$this->categorias_model->ListarCategorias();
        //$datos['seccion'] = array('Socios', 'bo/socios', 'Listado', '/bo/socios');
        $this->load->view('backend/layout', $datos); //llamada a la vista general

    }
     
    function descargar($file){
        echo $file;
    }


    function ActualizarDatos(){

       $datos['content']= '/frontend/actulizadatos/frm_update'; 
        //$datos['data']=$this->socio_model->getSocios(); 
        $datos['hide'] = false;  
        //$datos['titulo'] = "Administrador de socios / Listar";
        //$datos['lista'] = $this->paginar; //$this->categorias_model->ListarCategorias();
        //$datos['seccion'] = array('Socios', 'bo/socios', 'Listado', '/bo/socios');
        $this->load->view('backend/layout', $datos); //llamada a la vista general




    }
    
    
  

}


?>