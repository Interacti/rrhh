<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class galeria extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('galeria_model', 'galeria');

            $this->load->library('Form_validation');
            $this->load->library('upload');
        }
    }

    function Index() {
        redirect('bo/galeria/Listar');
    }

    function Listar() {
        $datos ['content'] = 'backend/galeria/listar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->galeria->getRows();
        $datos ['seccion'] = array(
            'galeria',
            '/bo/galeria',
            'Listado',
            '/bo/galeria/Listar'
        );
        $datos ['titulo'] = "Administrador de galeria / Listado";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Listar_Imagenes($id_galery = 0) {
        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id_galery
        );
        $rs = $this->galeria->getRows($con);

        $datos ['content'] = 'backend/galeria/listar_img'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['id_galery'] = $id_galery;
        $datos ['data'] = $this->galeria->listImage($id_galery);
        $datos ['seccion'] = array(
            'galeria',
            '/bo/galeria',
            '' . $rs[0]->title,
            '/bo/galeria/Listar_Imagenes/'
        );
        $datos ['titulo'] = "Administrador de galeria / Listado de Imagenes";
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Agregar() {
        $datos ['content'] = 'backend/galeria/agregar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de galeria / Agregar galeria";
        $datos ['seccion'] = array(
            'galeria',
            '/bo/galeria',
            'Agregar galeria',
            '/bo/galeria/agregar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function addImage($id_galery = 0) {

        $datos ['content'] = 'backend/galeria/add_img'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['id_galery'] = $id_galery;
        $datos ['titulo'] = "Administrador de galeria / Agregar Imagen";
        $datos ['seccion'] = array(
            'galeria',
            '/bo/galeria',
            'Agregar imagen',
            '/bo/galeria/add_image'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function editImage($id) {

        $datos ['content'] = 'backend/galeria/edit_img'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['data'] = $this->galeria->getImageEdit($id);
        $datos ['titulo'] = "Administrador de galeria / Agregar Imagen";
        $datos ['seccion'] = array(
            'galeria',
            '/bo/galeria',
            'Agregar imagen',
            '/bo/galeria/add_image'
        );
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Editar($id) {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $id
        );

        $datos ['modulo'] = 'galeria';
        $datos ['accion'] = 'actualizar';
        $datos ['rs'] = $this->galeria->getRows($con);
        $datos ['content'] = 'backend/galeria/editar'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = "Administrador de galeria / Editar galeria";
        $datos ['seccion'] = array(
            'galeria',
            'bo/galeria',
            'Editar Noticia',
            '/bo/temas/editar'
        );

        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }

    function Guardar() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('bajada', 'bajada', 'required|trim');

        $this->form_validation->set_rules('estado', 'estado', 'required|trim');

        /* $this->form_validation->set_message ( 'required', 'El campo %s no debe estar en blanco' );
          $this->form_validation->set_message ( 'min_length', 'El campo %s debe tener %s caracteres como minimo' );
          $this->form_validation->set_message ( 'max_length', 'El campo %s debe tener %s caracteres como maximo' );
          $this->form_validation->set_message ( 'integer', 'El campo %s debe ser un numero entero' ); */

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/galeria/Agregar');
        } else {

            $imagen_mini ['upload_path'] = './assets/frontend/img/galerias/minis/';
            $imagen_mini ['allowed_types'] = 'jpg|png';
            $imagen_mini ['max_size'] = '2000';
            $imagen_mini ['min_width'] = '1000';
            $imagen_mini ['min_height'] = '1000';
            $imagen_mini ['max_width'] = '1000';
            $imagen_mini ['max_height'] = '1000';
            $sbi = $this->SubirImagen($imagen_mini, 'imagen1');
            if (is_array($sbi) && count($sbi) > 0) {
                $imagen_mini = $sbi ['file_name'];

                $in = array(
                    "title" => $this->input->post('titulo'),
                    "slug" => seo($this->input->post('titulo')),
                    "category" => "",
                    "excerpt" => $this->input->post('bajada'),
                    "list_image" => $imagen_mini,
                    "created_at" => date('Y-m-d h:i:s'),
                    "status" => $this->input->post('estado')
                );
                if (!$this->galeria->insert($in)) {
                    $this->session->set_flashdata('errors', "Error al insertar el registro");
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/galeria/Agregar');
                } else {
                    $this->session->set_flashdata('success', "registro ingresado con exito");
                    redirect(BASE_URL . 'bo/galeria');
                }
            } else {
                $this->session->set_flashdata('errors', $sbi);
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/galeria/Agregar');
            }
        }
    }

    function Actualizar() {
        $this->form_validation->set_rules('titulo', 'titulo', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('bajada', 'bajada', 'required|trim');
        $this->form_validation->set_rules('estado', 'estado', 'required|trim');



        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/galeria/Editar/' . $this->input->post('id'));
        } else {

            /**
             * imagen miniatura
             */
            if ($_FILES['imagen1']['name'] == "") {
                $imagen_mini = $this->input->post('hdImg1');
            } else {

                $imagen_mini ['upload_path'] = './assets/frontend/img/galerias/minis/';
                $imagen_mini ['allowed_types'] = 'gif|jpg|png';
                $imagen_mini ['max_size'] = '1000';
                $sbi = $this->SubirImagen($imagen_mini, 'imagen1');

                if (is_array($sbi) && count($sbi) > 0) {
                    $imagen_mini = $sbi['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbi);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/galeria/Editar/' . $this->input->post('id'));
                }
            }


            $in = array(
                "title" => $this->input->post('titulo'),
                "slug" => seo($this->input->post('titulo')),
                "excerpt" => $this->input->post('bajada'),
                "list_image" => $imagen_mini,
                "updated_at" => date('Y-m-d h:i:s'),
                "status" => $this->input->post('estado')
            );


            if (!$this->galeria->update($in, array("id" => $this->input->post('id')))) {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/galeria/Editar/' . $this->input->post('id'));
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/galeria');
            }
        }
    }

    function Activar($id = 0) {
        $cmsData = array('status' => 1);
        $update = $this->galeria->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La noticia ha sido activada!");
        redirect(BASE_URL . 'bo/galeria');
    }

    function Desactivar($id = 0) {
        $cmsData = array('status' => 0);
        $update = $this->galeria->update($cmsData, array('id' => $id));
        $this->session->set_flashdata('success', "La noticia ha sido desactivada!");
        redirect(BASE_URL . 'bo/galeria');
    }

    function addNewImage() {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $this->input->post('id_galery')
        );
        $data = $this->galeria->getRows($con);
        $fName = $data[0]->slug;
        $pathTosave = './assets/frontend/img/galerias/' . $data[0]->slug;

        if (!file_exists($pathTosave)) {
            mkdir($pathTosave, 0777, true);
        }

        $imagen_mini ['upload_path'] = $pathTosave;
        $imagen_mini ['allowed_types'] = 'jpg|png';
        $imagen_mini ['max_size'] = '2000';
        $imagen_mini ['min_width'] = '1000';
        $imagen_mini ['min_height'] = '1000';
        $imagen_mini ['max_width'] = '1000';
        $imagen_mini ['max_height'] = '1000';
        $imagen_mini ['remove_spaces'] = TRUE;

        $sbi = $this->SubirImagen($imagen_mini, 'imagen1');
        if (is_array($sbi) && count($sbi) > 0) {
            $imagen_mini = $sbi ['file_name'];
            $in = array(
                "title" => $this->input->post('titulo'),
                "id_galery" => $this->input->post('id_galery'),
                "list_image" => $imagen_mini,
                "created_at" => date('Y-m-d h:i:s'),
                "path_saved" => $pathTosave,
                "status" => $this->input->post('estado')
            );
            if (!$this->galeria->insertImage($in)) {
                $this->session->set_flashdata('errors', "Error al insertar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/galeria/Agregar');
            } else {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/galeria/Listar_Imagenes/' . $this->input->post('id_galery'));
            }
        } else {
            $this->session->set_flashdata('errors', $sbi);
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/galeria/Agregar');
        }
    }

    function updateNewImage() {

        $con['returnType'] = 'single';
        $con['conditions'] = array(
            'id' => $this->input->post('id_galery')
        );
        $data = $this->galeria->getRows($con);
        $fName = $data[0]->slug;
        $pathTosave = './assets/frontend/img/galerias/' . $data[0]->slug;

        if (!file_exists($pathTosave)) {
            mkdir($pathTosave, 0777, true);
        }


        if ($_FILES['imagen1']['name'] == "") {
            $imagen_mini = $this->input->post('hd_img');
        } else {

            $imagen_mini ['upload_path'] = $pathTosave;
            $imagen_mini ['allowed_types'] = 'jpg|png';
            $imagen_mini ['max_size'] = '2000';
            $imagen_mini ['min_width'] = '1000';
            $imagen_mini ['min_height'] = '1000';
            $imagen_mini ['max_width'] = '1000';
            $imagen_mini ['max_height'] = '1000';
            $imagen_mini ['remove_spaces'] = TRUE;

            $sbi = $this->SubirImagen($imagen_mini, 'imagen1');

            if (is_array($sbi) && count($sbi) > 0) {
                $imagen_mini = $sbi['file_name'];
            } else {
                $this->session->set_flashdata('errors', $sbi);
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/galeria/editImage/' . $this->input->post('id'));
            }
        }



        $in = array(
            "id" => $this->input->post('id'),
            "title" => $this->input->post('titulo'),
            "id_galery" => $this->input->post('id_galery'),
            "list_image" => $imagen_mini,
            "created_at" => date('Y-m-d h:i:s'),
            "path_saved" => $pathTosave,
            "status" => $this->input->post('estado')
        );

        if (!$this->galeria->updateImage($in)) {
            $this->session->set_flashdata('errors', "Error al actualizar el registro");
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/galeria/Listar_Imagenes/' . $this->input->post('id_galery'));
        } else {
            $this->session->set_flashdata('success', "registro actualizado con exito");
            redirect(BASE_URL . 'bo/galeria/Listar_Imagenes/' . $this->input->post('id_galery'));
        }
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
