<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Archivos extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Liquidaciones_Model', 'liquidaciones');
        $this->load->helper('fileinfo');
        $zip = new ZipArchive;
    }

    function index() {
        $datos ['content'] = 'backend/archivos/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['seccion'] = array(
            'Archivos',
            '/bo/archivos',
            'Listado',
            '/bo/archivos/Listar'
        );
       $datos['data']=$this->liquidaciones->getRows();
        $datos ['titulo'] = "Administrador Liquidaciones / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }
    
    function Agregar() {
        $datos ['content'] = 'backend/archivos/index'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['seccion'] = array(
            'Liquidaciones',
            '/bo/liquidaciones',
            'Agregar Archivo',
            '/bo/liquidaciones/Agregar'
        );
        $datos ['titulo'] = "Administrador Liquidaciones / Listado";
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
                    copy("zip://" . $full_path . "#" . $filename, "./assets/frontend/liquidaciones/" . $fileinfo['basename']);
                }
                $zip->close();
            }


            $map = fileinfo('./assets/frontend/liquidaciones/', 1);
            $this->db->truncate('in_file_liquid');
            $this->db->insert_batch('in_file_liquid', $map);
            echo 'Extracted successfully!';
            $params = array('success' => 'Extracted successfully!');
        }

        //$this->load->view('file_upload_result', $params);
    }

    function upload1() {

        $config['upload_path'] = './assets/frontend/liquidaciones/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);
        $filesCount = count($_FILES['file']['name']);
        for ($i = 0; $i < $filesCount; $i++) {
            $_FILES['files']['name'] = $_FILES['file']['name'][$i];
            $_FILES['files']['type'] = $_FILES['file']['type'][$i];
            $_FILES['files']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
            $_FILES['files']['error'] = $_FILES['file']['error'][$i];
            $_FILES['files']['size'] = $_FILES['file']['error'][$i];
            if ($this->upload->do_upload('files')) {
                // Uploaded file data

                $fileData = $this->upload->data();
                $fleInfo = explode('.', $fileData['file_name']);
                $fileInfo = explode('_', $fleInfo[0]);

                print_r($fileInfo);

                $uploadData[$i]['name'] = $fileData['file_name'];
                $uploadData[$i]['year'] = $fileInfo[0];
                $uploadData[$i]['month'] = $fileInfo[1];
                $uploadData[$i]['key'] = $fileInfo[2];
                $uploadData[$i]['date_add'] = date("Y-m-d H:i:s");
            }
        }

        //print_r($uploadData);
        //die();
        $this->db->truncate('in_file_liquid');
        $this->db->insert_batch('in_file_liquid', $uploadData);


        print_r('Image Uploaded Successfully.');
        exit;
    }

}
