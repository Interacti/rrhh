<?php
class Login extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "usuarios_model" );
		$this->load->library ( 'form_validation' );
	}
	function Index() {
		redirect ( 'bo/login/formLogin' );
	}
	public function formLogin() {
		$datos ['content'] = '/backend/login/_login'; // llamada al content de este metodo
		$datos ['hide'] = true;
		$datos ['titulo'] = "Administrador / Inicio de Sesion ";
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general*/
	}


	function validaLogin() {
		$this->form_validation->set_rules ( 'usuario', 'Usuario', 'required|xss_clean' );
		$this->form_validation->set_rules ( 'password', 'Password', 'required|xss_clean' );
		if ($this->form_validation->run () == FALSE) {
			$this->session->set_flashdata ( 'err', '!! Error en Inicio de Sesion <br />Verifique Usuario y/o Clave' );
			redirect ( 'bo/login/formLogin' );
		} else {
			$data ['username'] = $this->input->post ( 'usuario' );
			$data ['userpass'] = md5 ( SEEDPASS . trim ( $this->input->post ( 'password' ) ) );
			if ($this->usuarios_model->isUser ( $data )) {
				$userdata = $this->usuarios_model->UserData ( $data );
				$this->session->set_userdata ( array (
						'bo_id' => $userdata [0]->id,
						'bo_nombre' => $userdata [0]->nombre . ' ' . $userdata [0]->apellido,
						'bo_usuario' => $userdata [0]->username,
						'bo_perfil' => $userdata [0]->perfil,
						'bo_perfil_desc' => $userdata [0]->descripcion,
						'bo_isLogued' => "1" 
				) );


				//Escribimos en el log de la aplicacion
					$dataLog=array(
							'log_type'=>'Inicio Session',
							'title'=>'Acceso a BackOffice',
							'log'=>'Iniciando session BackOffice  ',
							'logger'=>$this->session->userdata('bo_usuario'),
							'ip_address'=>$this->input->ip_address(),
							'created'=>date('Y-m-d h:i:s'),
							'status'=>'Acceso Permitido'
							);
					InsertLogApp($dataLog);	
               
                  
				redirect ( 'bo/banners/' );
			} else {
				$this->session->set_flashdata ( 'err', '!! Error en Inicio de Sesion <br />Verifique Usuario y/o Clave' );
				//Escribimos en el log de la aplicacion
					$dataLog=array(
							'log_type'=>'Inicio Session',
							'title'=>'Acceso a BackOffice',
							'log'=>'Error en Inicio de Sesion ',
							'logger'=>$this->input->post ( 'usuario' ),
							'ip_address'=>$this->input->ip_address(),
							'created'=>date('Y-m-d h:i:s'),
							'status'=>'Acceso Denegado'
							);
					InsertLogApp($dataLog);	
				redirect ( 'bo/login/formLogin' );
			}
		}
	}
	function Logout() {
		$dataLog=array(
							'log_type'=>'Inicio Session',
							'title'=>'Acceso a BackOffice',
							'log'=>'Cierre de sesion',
							'logger'=>$this->session->userdata('bo_usuario'),
							'ip_address'=>$this->input->ip_address(),
							'created'=>date('Y-m-d h:i:s'),
							'status'=>'Cierre Session'
							);
		InsertLogApp($dataLog);	
		$this->session->unset_userdata ( 'bo_isLogued' );
		//$this->session->sess_destroy ();
		redirect ( 'bo/login/formLogin' );
	}
}