<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vacaciones extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('vacaciones_model', 'vacaciones');
            $this->load->helper('socio_helper');
            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/vacaciones/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/vacaciones/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->vacaciones->getRows();
        $datos ['seccion'] = array(
            'vacaciones',
            '/bo/vacaciones',
            'Listado',
            '/bo/vacaciones/Listar'
        );
        $datos ['titulo'] = "Administrador de vacaciones / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/vacaciones/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de vacaciones / Agregar vacaciones";
        $datos ['seccion'] = array(
            'vacaciones',
            '/bo/vacaciones',
            'Agregar vacaciones',
            '/bo/vacaciones/agregar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {
        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id
        );
        $datos ['modulo'] = 'vacaciones';
        $datos ['accion'] = 'actualizar';
        $datos ['rs'] = $this->vacaciones->getRows($con);
        $datos ['content'] = 'backend/vacaciones/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de vacaciones / Editar vacaciones";
        $datos ['seccion'] = array(
            'vacaciones',
            'bo/vacaciones',
            'Editar Noticia',
            '/bo/temas/editar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Guardar() {
        $config_attach ['upload_path'] = './assets/frontend/vacaciones/';
        $config_attach ['allowed_types'] = 'txt';
        $config_attach ['max_size'] = '2000';
        $fileAttach = $this->SubirImagen($config_attach, 'fileAdd');
        if (is_array($fileAttach) && count($fileAttach) > 0) {
            $fileOpen = $config_attach ['upload_path'] . $fileAttach['file_name'];
            $file = fopen($fileOpen, "r") or exit("Unable to open file!");
            $headers=fgets($file);
            $this->db->truncate('in_vacaciones');
            $cn=0;
            while (!feof($file)) {
                $theRow = fgets($file);
                $theRowToDb= explode(';',$theRow);
                if (!empty($theRowToDb[0])){
                    $to_db['rut'] = $theRowToDb[0];
                    $to_db['saldo'] = str_replace(',', '.', $theRowToDb[1]);
                    $to_db['acumulados'] = str_replace( ',','.', str_replace(array('\r','\n'), '', $theRowToDb[2]));
                    if($this->db->insert('in_vacaciones',$to_db)){
                       $cn++;
                    }else{
                         echo "se produjo un error";
                    }
                }
                 
            }
        } else {
            echo $fileAttach; 
        }
        
        $this->session->set_flashdata('success', "registro ingresado con exito");
        redirect(BASE_URL . 'bo/vacaciones');
    }

    function Actualizar() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|xss_clean|max_length[100]');
        //$this->form_validation->set_rules ( 'categoria', 'categoria', 'required|trim|xss_clean|integer' );
        $this->form_validation->set_rules('bajada', 'bajada', 'required|trim');
        $this->form_validation->set_rules('texto', 'texto', 'required|trim');
        $this->form_validation->set_rules('estado', 'estado', 'required|trim');

        $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
        $this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');


        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/vacaciones/Editar/' . $this->input->post('id'));
        } else {

            /**
             * imagen miniatura
             */
            if ($_FILES['imagen1']['name'] == "") {
                $imagen_mini = $this->input->post('hdImg1');
            } else {

                $imagen_mini ['upload_path'] = './assets/frontend/img/vacaciones/';
                $imagen_mini ['allowed_types'] = 'gif|jpg|png';
                $imagen_mini ['max_size'] = '1000';
                $sbi = $this->SubirImagen($imagen_mini, 'imagen1');

                if (is_array($sbi) && count($sbi) > 0) {
                    $imagen_mini = $sbi['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbi);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/vacaciones/Editar/' . $this->input->post('id'));
                }
            }


            /**
             * Imagen interna
             */
            if ($_FILES['imagen2']['name'] == "") {
                $imagen_prin = $this->input->post('hdImg2');
            } else {
                $config_prin ['upload_path'] = './assets/frontend/img/vacaciones/';
                $config_prin ['allowed_types'] = 'gif|jpg|png';
                $config_prin ['max_size'] = '1000';
                $sbd = $this->SubirImagen($config_prin, 'imagen2');
                if (is_array($sbd) && count($sbd) > 0) {
                    $imagen_prin = $sbd['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbd);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/vacaciones/Editar/' . $this->input->post('id'));
                }
            }

            /**
             * archivo adicional
             */
            if ($_FILES['fileAdd']['name'] == "") {
                $fileAt = $this->input->post('hdfileAdd');
            } else {
                $config_attach ['upload_path'] = './assets/frontend/pdf/vacaciones/';
                $config_attach ['allowed_types'] = 'pdf|xlsx|docx|doc|xls|ppt|pptx|txt';
                $config_attach ['max_size'] = '2000';

                //print_r($_FILES['fileAdd']);


                $fileAttach = $this->SubirImagen($config_attach, 'fileAdd');


                if (is_array($fileAttach) && count($fileAttach) > 0) {
                    $fileAt = $fileAttach['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $fileAttach);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/vacaciones/Editar/' . $this->input->post('id'));
                }
            }

            $in = array(
                "title" => $this->input->post('titulo'),
                "slug" => seo($this->input->post('titulo')),
                "category" => "",
                "excerpt" => $this->input->post('bajada'),
                "content" => $this->input->post('texto'),
                "list_image" => $imagen_mini,
                "feature_image" => $imagen_prin,
                "alternate_file" => $fileAt,
                "created_at" => date('Y-m-d h:i:s'),
                "status" => $this->input->post('estado')
            );


            if (!$this->vacaciones->update($in, array("id" => $this->input->post('id')))) {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/vacaciones/Editar/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/vacaciones');
            }
        }
    }

    function Activar($id = 0) {
        $cmsData = array('status' => 1);
        $update = $this->vacaciones->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La noticia ha sido activada!");
        redirect(BASE_URL . 'bo/vacaciones');
    }

    function Desactivar($id = 0) {
        $cmsData = array('status' => 0);
        $update = $this->vacaciones->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La noticia ha sido desactivada!");
        redirect(BASE_URL . 'bo/vacaciones');
    }

    function SubirImagen($data = null, $campo = null) {
        $this->upload->initialize($data);
        if (!$this->upload->do_upload($campo)) {
            return $this->upload->display_errors();
        } else {
            return $this->upload->data();
        }
    }

}
