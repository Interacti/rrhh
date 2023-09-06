<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Faqs extends CI_Controller {

    public function __construct() {
        parent::__construct();
		 $this->load->model('categorias_model');
        $this->load->model('productos_model');
    }

    public function Index() {
        echo "test";
        
      
    }
       
       

}