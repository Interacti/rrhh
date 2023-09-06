<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Socios extends CI_Controller {

    function __construct() {
        parent::__construct();

        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {
            $this->load->model('socio_model', 'socio');
            $this->load->model('cartola_model');
            $this->load->library('form_validation');
            $this->load->library('upload');
            $this->load->library('paginar');
        }
    }

    function Index() {
        redirect('bo/socios/Listar');
    }

    function Agregar() {
        $datos['content'] = 'backend/socios/agregar';
        $datos['hide'] = false;
        $datos['ccosto'] = $this->socio->getCentroCosto();
        $datos['departamentos'] = $this->socio->getDepartamento();
        $datos['cargos'] = $this->socio->getCargos();
        $datos['titulo'] = "Administrador de Trabajadores / Agregar";
        $datos['seccion'] = array('Trabajadores', 'bo/socios', 'Agregar', '/bo/agregar');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function Editar($id) {
        $datos['content'] = 'backend/socios/editar';
        $datos['socios'] = $this->socio->getSociosById($id);
        $datos['ccosto'] = $this->socio->getCentroCosto();
        $datos['departamentos'] = $this->socio->getDepartamento();
        $datos['cargos'] = $this->socio->getCargos();
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Trabajadores / Editar";
        $datos['seccion'] = array('Trabajadores', 'bo/socios', 'Editar', '/bo/editar');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

   
   public function reenviar($id) {
           
           $data=$this->socio->getSociosById($id);
         
            $email_config = Array(
                'mailtype' => 'html',
                'newline' => "\r\n"
            );

            $message = "
       				 <table>
       				   <tr>
       				        <td colspan='3' >REENVIO CLAVE PROVISORIA </td>
       				        
       				    </tr>
                           <tr>
       				        <td colspan='3' >Estimado ". $data[0]->nombre_full." </td>
       				        
       				    </tr>
                        <tr>
       				        <td colspan='3' >Tu clave ha sido reseteada por favor ingresa con esta nueva clave   </td>
       				        
       				    </tr>   
                        
                        <tr>
       				        <td colspan='3' align='center' ><b>". $data[0]->clave."</b> </td>
       				        
       				    </tr> 
                           	
       								
       				</table>
       				";

             
          
            $this->load->library('email', $email_config);
            $this->email->from('caren_rrhh@caren.cl', "Reseteo Clave");
            if ($data[0]->email!=""){
                $to=$data[0]->email;
            }else{
                $to="elena.aliaga@caren.cl";
            }
            $this->email->to($to);
            
            $this->email->bcc('elena.aliaga@caren.cl', 'Elena Aliaga');
            
            $this->email->subject(' CONTACTO DESDE INTRANET - Reseteo clave');
            $this->email->message($message);

            if ($this->email->send()) {
                 
                 $Adata = array(
                   'isupdate' =>'' ,
                   'password' => md5($data[0]->clave),
                );
                
                $this->db->where('id', $id);
                $this->db->update('in_socio', $Adata); 


                //$this->contacto_model->AgregarContacto($data);
                 $this->session->set_flashdata("OKIS", "El mensaje no pudo ser enviado. intentelo mas tarde.");
                 redirect(BASE_URL . 'bo/socios');
            } else {

                $this->session->set_flashdata('errors', "<li>El mensaje no pudo ser enviado. intentelo mas tarde.</li>");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/socios');
            };
        
    }

    function Listar() {
        $datos['content'] = 'backend/socios/listar'; //llamada al content de este metodo

        $datos['data'] = $this->socio->getSocios();
        $datos['hide'] = false;
        $datos['titulo'] = "Administrador de Trabajadores / Listar";
        $datos['lista'] = $this->paginar; //$this->categorias_model->ListarCategorias();
        $datos['seccion'] = array('Socios', 'bo/socios', 'Listado', '/bo/socios');
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }

    function generar_clave() {

        $key = "";
        $caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
//aquí podemos incluir incluso caracteres especiales pero cuidado con las ‘ y “ y algunos otros
        $length = 10;
        $max = strlen($caracteres) - 1;
        for ($i = 0; $i < $length; $i++) {
            $key .= substr($caracteres, rand(0, $max), 1);
        }
        return $key;
    }

    function Actualizar() {

        $this->form_validation->set_rules('codigo', 'Codigo Trabajador', 'required|trim|xss_clean|integer');
        $this->form_validation->set_rules('rutdv', 'Rut Trabajador', 'required|trim|xss_clean');
        $this->form_validation->set_rules('nombre', 'Nombres', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('apellido', 'Apellidos', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacimiento', 'required|trim|xss_clean');

        //$this->form_validation->set_rules('celular_socio', 'Teléfono Celular', 'required|trim|xss_clean|integer|exact_length[9]');
        //$this->form_validation->set_rules('telefono_socio', 'Teléfono Fijo ', 'required|trim|xss_clean|integer|exact_length[9]');
        //$this->form_validation->set_rules('anexo', 'Anexo Teléfonico ', 'required|trim|xss_clean|integer|max_length[5]');
        //$this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('f_ingreso', 'Fecha Ingreso', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id_cargo', 'Cargo', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id_departamento', 'Departamento', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id_centro_costo', 'Centro Costo', 'required|trim|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|trim|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/socios/editar/' . $this->input->post('id'));
        } else {


            $imagen_mini ['upload_path'] = './assets/frontend/img/personal/';
            $imagen_mini ['allowed_types'] = 'gif|jpg|png';
            $imagen_mini ['file_name'] = $this->input->post('rutdv');
            $imagen_mini ['overwrite'] = TRUE;
            $imagen_mini ['max_size'] = '2000';


            if ($_FILES['imagen1']['name'] == "") {
                $imagen_mini = $this->input->post('hdImg1');
            } else {
                $sbi = $this->SubirImagen($imagen_mini, 'imagen1');
                if (is_array($sbi) && count($sbi) > 0) {
                    $imagen_mini = $sbi['file_name'];
                } else {
                    $this->session->set_flashdata('errors', $sbi);
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/socios/Editar/' . $this->input->post('id'));
                }
            }
            $in['id'] = $this->input->post('id');
            $in['codigo'] = $this->input->post('codigo');
            $in['rut'] = ltrim($this->input->post('rutdv'), '0');
            $in['rutdv'] = $this->input->post('rutdv');
            $in['nombre'] = $this->input->post('nombre');
            $in['apellido'] = $this->input->post('apellido');
            $in['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
            $in['f_ingreso'] = $this->input->post('f_ingreso');
            $in['telefono_socio'] = $this->input->post('telefono_socio');
            $in['celular_socio'] = $this->input->post('celular_socio');
            $in['anexo'] = $this->input->post('anexo');
            $in['email'] = $this->input->post('email');
            $in['id_cargo'] = $this->input->post('id_cargo');
            $in['id_centro_costo'] = $this->input->post('id_centro_costo');
            $in['id_departamento'] = $this->input->post('id_departamento');
            $in['nombre_full'] = strtoupper(strtolower($this->input->post('nombre') . ' ' . $this->input->post('apellido')));
            $in['imagen_socio'] = $imagen_mini;
            $in['estado'] = $this->input->post('estado');
            if ($this->socio->ActualizarSocio($in)) {
                $this->session->set_flashdata('success', "registro ingresado con exito");
                redirect(BASE_URL . 'bo/socios');
            } else {
                $this->session->set_flashdata('errors', "Error al actulizar el registro");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/socios/Editar/' . $this->input->post('id'));
            }
        }
    }

    function Guardar() {

        $this->form_validation->set_rules('codigo', 'Codigo Trabajador', 'required|trim|xss_clean|integer|is_unique[in_socio.codigo]');
        $this->form_validation->set_rules('rutdv', 'Rut Trabajador', 'required|trim|xss_clean|is_unique[in_socio.rutdv]');
        $this->form_validation->set_rules('nombres', 'Nombres', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required|trim|xss_clean|max_length[100]');
        $this->form_validation->set_rules('fecha_nacimiento', 'Fecha Nacimiento', 'required|trim|xss_clean');
        //$this->form_validation->set_rules('celular_socio', 'Teléfono Celular', 'required|trim|xss_clean|integer|exact_length[9]');
        //$this->form_validation->set_rules('telefono_socio', 'Teléfono Fijo ', 'required|trim|xss_clean|integer|exact_length[9]');
        //$this->form_validation->set_rules('anexo', 'Anexo Teléfonico ', 'required|trim|xss_clean|integer|max_length[5]');
        //$this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('f_ingreso', 'Fecha Ingreso', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id_cargo', 'Cargo', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id_departamento', 'Departamento', 'required|trim|xss_clean');
        $this->form_validation->set_rules('id_centro_costo', 'Centro Costo', 'required|trim|xss_clean');
        $this->form_validation->set_rules('estado', 'Estado', 'required|trim|xss_clean');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'bo/socios/Agregar');
        } else {
            $imagen_mini ['upload_path'] = './assets/frontend/img/personal/';
            $imagen_mini ['allowed_types'] = 'gif|jpg|png';
            $imagen_mini ['file_name'] = $this->input->post('rutdv');
            $imagen_mini ['overwrite'] = TRUE;
            $imagen_mini ['max_size'] = '2000';
            $sbi = $this->SubirImagen($imagen_mini, 'imagen1');
            if (is_array($sbi) && count($sbi) > 0) {
                $imagen_mini = $sbi ['file_name'];
                $CLV = $this->generar_clave();
                $in['codigo'] = $this->input->post('codigo');
                $in['rut'] = ltrim($this->input->post('rutdv'), '0');
                $in['rutdv'] = $this->input->post('rutdv');
                $in['nombre'] = $this->input->post('nombre');
                $in['apellido'] = $this->input->post('apellido');
                $in['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
                $in['f_ingreso'] = $this->input->post('f_ingreso');
                $in['telefono_socio'] = $this->input->post('telefono_socio');
                $in['celular_socio'] = $this->input->post('celular_socio');
                $in['anexo'] = $this->input->post('anexo');
                $in['email'] = $this->input->post('email');
                $in['id_cargo'] = $this->input->post('id_cargo');
                $in['id_centro_costo'] = $this->input->post('id_centro_costo');
                $in['id_departamento'] = $this->input->post('id_departamento');
                $in['password'] = md5($CLV);
                $in['clave'] = $CLV;
                $in['nombre_full'] = strtoupper(strtolower($this->input->post('nombre') . ' ' . $this->input->post('apellido')));
                $in['imagen_socio'] = $imagen_mini;
                $in['estado'] = $this->input->post('estado');
                if ($this->socio->InsertarSocio($in)) {
                    $this->session->set_flashdata('xx', "registro ingresado con exito");
                    redirect(BASE_URL . 'bo/socios');
                } else {
                    $this->session->set_flashdata('errors', "Error al Agregar el registro");
                    $this->session->set_flashdata('formdata', $this->input->post());
                    redirect(BASE_URL . 'bo/socios/agregar/' );
                }
            } else {
                $this->session->set_flashdata('errors', $sbi);
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'bo/socios/Agregar');
            }
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

    function test($rut) {

        echo $rut;

        echo number_format(PuntosBySocio($rut), 0, ',', '.');
    }

}
