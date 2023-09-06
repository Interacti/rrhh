<?php 


class Actualizacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoged')){
                    redirect('login');
        } else {
              $this->load->model('cartola_model');
              $this->load->model('sucursal_model');
              $this->load->model('socio_model');
              $this->load->library('Form_validation');
         
        }
    }


    function Index() {



        $datos['content']           =   '/frontend/actualizadatos/frm_update';
        $datos['sucursal']          =   $this->sucursal_model->getSucursales() ;
        $datos['socio']             =   $this->socio_model->UserData($this->session->userdata('id'));
        $datos['cargos']            =   $this->socio_model->getCargos();
        $datos['centros']           =   $this->socio_model->getCentroCosto();
        $datos['departamentos']     =   $this->socio_model->getDepartamento();
      
        //$datos['cargos']    =   $this->socio_model->getCentroCosto();
        //$datos['cargos']    =   $this->socio_model->getDepartamento();
       
        
        
        $datos['tipo']=$this->socio_model->tipo_agente();
        $datos['sucursales']=$this->sucursal_model->getSucursales();
		
	  $datos['camino_migas'] =   array('INICIO'=>BASE_URL,'Actualizar Datos'=>BASE_URL."actualizar");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
      

    }

    /*function Actualizar(){
  		$data=array(
		  'codigo'=>$this->input->post("codigo"),
  		  'rut'=>$this->input->post("rut"),
		  'rutdv'=>$this->input->post("rut"),
		  'nombre'=>$this->input->post("nombre"),
		  'apellido'=>$this->input->post("apellido"),
		  'estado_civil'=>$this->input->post("estado_civil"),
		  'fecha_nacimiento'=>$this->input->post("nacimiento"),
		  'email'=>$this->input->post("email"),
		  'f_ingreso'=>$this->input->post("ingreso"),
		  'id_tipo'=>$this->input->post("tipo"),
		  'id_sucursal'=>$this->input->post("sucursal"),
		  'telefono_socio'=>$this->input->post("telefono"),
		);
		
		
        if ($this->socio_model->ActualizarSocio($data)){
			$this->session->set_flashdata('success', 'Sus datos han sido actualizados con exito');
			redirect(BASE_URL.'actualizar');
		}else{
			$this->session->set_flashdata('error', 'se ha producido un error al actulizar el registro');
			redirect(BASE_URL.'actualizar');
		};
        
    }*/

    function ActualizarDatos(){
        $datos['content']= '/frontend/actulizadatos/frm_update'; 
        $datos['hide'] = false;  
        $this->load->view('backend/layout', $datos); //llamada a la vista general
    }
    
    public function change(){
        $this->form_validation->set_message('required', 'El campo %s no debe estar en blanco');
        $this->form_validation->set_message('min_length', 'El campo %s debe tener %s caracteres como minimo');
        $this->form_validation->set_message('max_length', 'El campo %s debe tener %s caracteres como maximo');
        $this->form_validation->set_message('integer', 'El campo %s debe ser un numero entero');
        $this->form_validation->set_message('matches', 'El campo %s y el campos %s deben ser iguales ');


        $this->form_validation->set_rules(
                'password', 'Contrase&ntilde;a', 'required|xss_clean|min_length[6]|matches[re_password]'
        );
        $this->form_validation->set_rules(
                're_password', 'Repita Contrase&ntilde;a', 'required|xss_clean|min_length[6]'
        );

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url() . 'mis-datos');
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
  

}


?>