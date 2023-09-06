<?php

class Login extends CI_Controller {
    
    
    function __construct() {
        parent::__construct();
    }
     
    function Index(){
        
        
         $datos['content'] = ''; //llamada al content de este metodo
        $datos['hide']=false;
        $datos['titulo']="Administrador / Inicio Session";
       // $this->load->view('backend/layout', $datos); //llamada a la vista general
         redirect('bo/banners');
        
    }
    
    
}