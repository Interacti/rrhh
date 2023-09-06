<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Carrera extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('assets');
    }

    function index()
    {

        $datos['content'] = '/frontend/carrera/index';
        $datos['titulo'] = "Caren";
        $this->load->view('frontend/layout', $datos); 
    }
}
