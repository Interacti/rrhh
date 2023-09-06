<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();


        if (!$this->session->userdata('isLoged')) {
            redirect('login');
        } else {
            $this->load->model('socio_model', 'socio');
            $this->load->model('abordo_model', 'abordo');
            $this->load->model('noticias_model', 'noticias');
            $this->load->model('concurso_model', 'concurso');
            $this->load->model('personal_model', 'personal');
            $this->load->model('banners_model');
            $this->load->model('productos_model', 'producto');
            $this->load->library('Form_validation');
            $this->load->model('contacto_model');
            $this->load->model('temas_model');
            $this->load->library('paginar');
        }
    }

    public function Index() {
            //   redirect(base_url() . 'inicio/1');
    }

    public function home2() {

        //echo "<<<<>>>" . empty($this->session->userdata('isupdate'));

        if (empty($this->session->userdata('isupdate'))) {
            redirect(base_url() . 'home/actualizar');
        }

        $con['conditions'] = array('status' => 1);
        $con['limit'] = 3;


        $datos['cumples'] = $this->socio->getCumpleanosHoy();

      

        $datos['abordo'] = $this->abordo->getRows($con);
        $datos['noticias'] = $this->noticias->getRows($con);
        $datos['concurso'] = $this->concurso->getRows($con);
        $datos['personal'] = $this->personal->getRows($con);
        $datos['content'] = '/frontend/home/home_1';
        $datos['blog'] = $this->temas_model->getTemas();
        $datos['banners'] = $this->banners_model->getBannersHome();
        $this->load->view('frontend/layout', $datos);
    }

    public function inicio($pag = 1) {
        $datos['cumples'] = $this->socio->getCumpleanosHoy();
        $datos['content'] = '/frontend/home/home';
        $datos['blog'] = $this->temas_model->getTemas();
        $datos['banners'] = $this->banners_model->getBannersHome();
        $this->load->view('frontend/layout', $datos);
    }

    function success() {
        $datos ['content'] = 'frontend/login/password_succes.php'; // llamada al content de este metodo
        $datos ['hide'] = true;
        $datos ['titulo'] = "Cambio contrase&ntilde;a ";
        $this->load->view('frontend/layout', $datos);
    }

    function change() {
        $datos ['content'] = 'frontend/login/change_password'; // llamada al content de este metodo
        $datos ['hide'] = true;
        $datos ['titulo'] = "Administrador / Inicio de Sesion ";
        $this->load->view('frontend/layout', $datos);
    }

    function change_pass() {

        $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
        $this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');
        $this->form_validation->set_message('matches', 'El campo %s y el campos %s deben ser iguales ');


        $this->form_validation->set_rules(
                'password', 'Nueva Contrase&ntilde;a', 'required|xss_clean|min_length[6]|matches[repassword]'
        );
        $this->form_validation->set_rules(
                'repassword', 'Reingrese Contrase&ntilde;a', 'required|xss_clean|min_length[6]'
        );

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url() . 'home/actualizar');
        } else {

            //echo $this->session->userdata('id');
            $da['isupdate'] = 1;
            $da['password'] = md5($this->input->post('password'));
            $this->db->where('rut', $this->session->userdata('id'));
            $this->db->update('in_socio', $da);
            //$this->session->unset_userdata ( 'isLoged' );
            redirect(base_url() . 'home/success');
        }
    }

    public function linea_etica() {
        $datos['content'] = '/frontend/home/linea-etica';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'Linea' => BASE_URL . "/mision");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function mision() {
        $datos['content'] = '/frontend/home/mision';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'Mision' => BASE_URL . "/mision");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function politicas() {

        $datos['files'] = $this->getFiles();

        $datos['content'] = '/frontend/home/politicas';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'Mision' => BASE_URL . "/mision");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    function getBycategory() {
        $this->db
                ->select(' * ')
                ->from('in_files')
                ->where('file_category_id', $this->input->post('id'));
        $query = $this->db->get();
        $html = '';
        foreach ($query->result() as $row) {
            $html .= '
                <table class="table table-bordered table-hover" style="font-size: 14px;">
                                <tbody>
                               
                                    <tr>
                                        <td width="90%"><h4 style="color:#E71873;">' . ucwords(strtolower($row->file_title)) . '</h5><br />' . ucfirst(strtolower($row->file_description)) . '</td>
                                        <td class="text-center" style="vertical-align: middle !important;"><a target="_blank" href="' . base_url() . 'assets/frontend/pdf/' . $row->file_name . '"><i class="fa fa-download fa-2x"></i></a></td>
                                    </tr>
                                
                                </tbody>
                </table>
                
                ';
        }
        echo $html;
    }

    function getFiles() {
        //select * from vw_cartola order by fecha desc 
        $this->db
                ->select(' * ')
                ->from('in_files');

        $query = $this->db->get();
        return $query->result();
    }

    public function induccion() {
        $datos['content'] = '/frontend/home/induccion';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'Mision' => BASE_URL . "/mision");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function reglamento() {
        $datos['content'] = '/frontend/home/reglamento';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'Mision' => BASE_URL . "/mision");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function vision() {
        $datos['content'] = '/frontend/home/vision';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'Vision' => BASE_URL . "/vision");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function quees() {
        $datos['content'] = '/frontend/home/quees';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'QUE ES RUTA PARAISO' => BASE_URL . "/quees");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function terminos() {
        $datos['content'] = '/frontend/home/terminos';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'TERMINOS Y CONDICIONES' => BASE_URL . "/terminos");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function como() {
        $datos['content'] = '/frontend/home/comoganar';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'COMO GANAR' => BASE_URL . "/como");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function contacto() {

        $datos['content'] = '/frontend/home/contactanos';
        $datos['camino_migas'] = array('INICIO' => BASE_URL, 'CONTACTO' => BASE_URL . "/contacto");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }

    public function EnviarContacto() {

        $this->form_validation->set_rules('nombre', 'nombre', 'required|trim|xss_clean');
        $this->form_validation->set_rules('email', 'email', 'required|trim|xss_clean|valid_email');
        $this->form_validation->set_rules('asunto', 'asunto', 'required|trim|xss_clean');
        $this->form_validation->set_rules('mensaje', 'mensaje', 'required|trim|xss_clean');


        $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
        $this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');
        $this->form_validation->set_message('valid_url_format', 'El campo %s debe ser una url valida');
        $this->form_validation->set_message('valid_email', 'El campo %s debe ser un email valido	 ');

        if ($this->form_validation->run() === FALSE) {

            $this->session->set_flashdata('errors', validation_errors('<li>', '</li>'));
            $this->session->set_flashdata('formdata', $this->input->post());
            redirect(BASE_URL . 'contactanos');
        } else {

            $email_config = Array(
                'mailtype' => 'html',
                'newline' => "\r\n"
            );

            $message = "
       				 <table>
       				   <tr>
       				        <td colspan='3' > CONTACTO DESDE RRHH </td>
       				        
       				    </tr>	
       				  	<tr>
       				        <td>NOMBRE</td>
       				        <td>:</td>
       						<td>" . $this->input->post('nombre') . "</td>
       				    </tr>
       					<tr>
       				        <td>E-MAIL</td>
       				        <td>:</td>
       						<td>" . $this->input->post('email') . "</td>
       				    </tr>
       					
       					<tr>
       				        <td>MOTIVO</td>
       				        <td>:</td>
       						<td>" . $this->input->post('asunto') . "</td>
       				    </tr>
       								
       					<tr>
       				        <td>MENSAJE</td>
       				        <td>:</td>
       						<td>" . $this->input->post('mensaje') . "</td>
       				    </tr>	

       					<tr>
       				        <td>Fecha</td>
       				        <td>:</td>
       						<td>" . date("d-m-Y H:i:s") . "</td>
       				    </tr>			
       				</table>
       				";



            $this->load->library('email', $email_config);
            $this->email->from('caren_rrhh@caren.cl', "Contacto");
            $this->email->to('elena.aliaga@caren.cl', 'Elena Aliaga');
            $this->email->subject(' CONTACTO DESDE INTRANET');
            $this->email->message($message);

            if ($this->email->send()) {
                $data = array(
                    "nombre" => $this->input->post('nombre'),
                    "email" => $this->input->post('email'),
                    "asunto" => $this->input->post('asunto'),
                    "mensaje" => $this->input->post('mensaje'),
                    "fecha" => date("Y-m-d h:i:s")
                );

                $this->contacto_model->AgregarContacto($data);
                $this->session->set_flashdata('success', "<li>El mensaje fue enviado con exito.</li>");
                redirect(BASE_URL . 'contactanos');
            } else {

                $this->session->set_flashdata('errors', "<li>El mensaje no pudo ser enviado. intentelo mas tarde.</li>");
                $this->session->set_flashdata('formdata', $this->input->post());
                redirect(BASE_URL . 'contactanos');
            };
        }
    }

}
