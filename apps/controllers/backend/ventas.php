<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ventas extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Ventas_Model', 'ventas');
        $this->load->helper('fileinfo');
        // $zip = new ZipArchive;
    }

    function index() {



        $datos ['content'] = 'backend/ventas/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['seccion'] = array(
            'ventas',
            'bo/ventas',
            'Listado',
            'bo/ventas/Listar'
        );
        $datos['data'] = $this->ventas->getRows();
        $datos ['titulo'] = "Administrador ventas / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Manual() {
        $map = fileinfo('./assets/frontend/vendedores/', 1);
        $this->db->truncate('in_ventas');
        $this->db->insert_batch('in_ventas', $map);
        echo 'Extracted successfully!';


        die();      
    }

    function Agregar() {
        $datos ['content'] = 'backend/ventas/index'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['seccion'] = array(
            'ventas',
            'bo/ventas',
            'Agregar Archivo',
            'bo/ventas/Agregar'
        );
        $datos ['titulo'] = "Administrador ventas / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    public function upload() {
        $config['upload_path'] = './assets/frontend/uploads/';
        $config['allowed_types'] = 'zip';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $params = array('error' => $this->upload->display_errors());
        } else {
            $data = array('upload_data' => $this->upload->data());
            $full_path = $data['upload_data']['full_path'];
            $zip = new ZipArchive;

            if ($zip->open($full_path) === true) {
                for ($i = 0; $i < $zip->numFiles; $i++) {
                    $filename = $zip->getNameIndex($i);
                    $fileinfo = pathinfo($filename);
                    copy("zip://" . $full_path . "#" . $filename, "./assets/frontend/vendedores/" . $fileinfo['basename']);
                }
                $zip->close();
            }


            $map = fileinfo('./assets/frontend/vendedores/', 1);
            $this->db->truncate('in_ventas');
            $this->db->insert_batch('in_ventas', $map);
            echo 'Extracted successfully!';
            $params = array('success' => 'Extracted successfully!');
        }

        //$this->load->view('file_upload_result', $params);
    }

}
