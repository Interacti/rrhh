<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Login extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->model ( "socio_model" );
		$this->load->library ( 'form_validation' );
		$this->load->library ( 'nu_soap' );
	}
	function Index() {
	}
	function validaPreview($user) {
		//$this->load->model ( "usuarios_model" );
		//$data ['username'] = $this->input->post ( 'usuario' );
		//$data ['userpass'] = md5 ( SEEDPASS . trim ( $this->input->post ( 'password' ) ) );
		if ($user) {
			//$userdata = $this->usuarios_model->UserData ( $data );
			$this->session->set_userdata ( array (
					'ide' => '9999999',
					'id' => '99999999-9',
					'nombre' => $user,
					'apellido' => '',
					'tipo' => '00-preview-00',
					'desc_tipo' => 'Usuario',
					'usuario' => $user,
					'oficina' => '-1',
					'fecha_ingreso' => '0000-00-00',
					'telefono' => '00000',
					'fecha_registro' => '0000-00-00',
					'isLoged' => "1"
					
					) );
				
			
			redirect ( '/' );
		} else {
			$this->session->set_flashdata ( 'err', '!! Error en Inicio de Sesion <br />Verifique Usuario y/o Clave' );
			redirect ( '/preview' );
		}
		
		
	}
    
    
	public function formLoginAdmin() {
		$datos ['content'] = 'frontend/login/_login'; // llamada al content de este metodo
		$datos ['hide'] = true;
		$datos ['titulo'] = "Administrador / Inicio de Sesion ";
		$this->load->view ( 'frontend/layout', $datos ); // llamada a la vista general
	}
    
	function validaLoginDns($rut = null) {
	   
		if ($this->socio_model->isSocio ( $rut )) {
			$userdata = $this->socio_model->UserData ( $rut );
			$this->session->set_userdata ( array (
					'ide' => $userdata [0]->id,
					'id' => $userdata [0]->rut,
					'nombre' => $userdata [0]->nombre,
					'apellido' => $userdata [0]->apellido,
					'tipo' => $userdata [0]->prefijo,
					'desc_tipo' => $userdata [0]->descripcion,
					'usuario' => $userdata [0]->codigo,
					'oficina' => $userdata [0]->id_sucursal,
					'fecha_ingreso' => $userdata [0]->f_ingreso,
					'telefono' => $userdata [0]->telefono_socio,
					'fecha_registro' => $userdata [0]->f_ingreso,
					'isLoged' => "1" 
			) );
			
			redirect ( '/' );
		} else {
			echo '!! Error datos de conexion no validos';
		    $this->session->set_flashdata('err', '!! Error en Inicio de Sesion <br />Verifique Usuario y/o Clave');
			 redirect('preview');
		}
	}
	
   function validaLogin($cup=null,$user=null,$codigo=null) {

     
     $user= urldecode($user);
     
     $rutdv=explode('-',$user);
     $mysesdata=$this->session->all_userdata();
     $client = new nusoap_client('http://webservices.vidasecurity.cl/wsaccess.asmx?WSDL', 'wsdl');
     $err = $client->getError();
     if ($err) {
	   echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
     }
     $param=array(
                "informacion"=>array(
                                        "UserInfo"=>array(
                                            
                                            "Rut"=>$rutdv[0],
                                            "Dv"=>$rutdv[1],
                                            "PersistCode"=>$codigo,
                                            "Ip"=>$_SERVER["REMOTE_ADDR"],
                                            "UserOS"=>0
                                        ),
                                        "AppInfo"=>array(
                                            "Cup"=>$cup,
                                            "Option"=>0,
                                            "RolName"=>0
                                            ),
                                        "WebInfo"=>array(
                                            "SessionId"=>$mysesdata['session_id'],
                                            "Method"=>$_SERVER["REQUEST_METHOD"],
                                            "Environment"=>0,
                                            "Parameters"=>0,
                                            "Url"=>$_SERVER["REMOTE_ADDR"],
                                            "UrlReferrer"=>isset($_SERVER["HTTP_REFERER"])?$_SERVER["HTTP_REFERER"]:0,
                                            "Browser"=>0,
                                            "Os"=>0,
                                            "GeoLatitude"=>0,
                                            "GeoLongitude"=>0,
                                            "IsMobile"=>0,
                                            "InfoMovile"=>0,
                                            )
                                    )


)
;


$result = $client->call('ValidaAcceso', array('parameters' => $param), '', '', false, true);
if ($client->fault) {
	//echo '<h2>Fault</h2><pre>';
	//print_r($result);
	//echo '</pre>';
    
} else {
	$err = $client->getError();
	if ($err) {
		echo '<h2>Error</h2><pre>' . $err . '</pre>';
	} else {
		//echo '<h2>Result</h2><pre>';
 	   //print_r($result);
       //echo $result['ValidaAccesoResult']['AccesoValido'];
		//echo '</pre>';
    }
 
}    
     
  
     
 if ($result['ValidaAccesoResult']['AccesoValido']==="true"){
//echo $result['ValidaAccesoResult']['AccesoValido'];

      // echo $user;
        //print_r($this->socio_model->isSocio($user));
        //die();
       if ($this->socio_model->isSocio($user)) {
                $userdata = $this->socio_model->UserData($user);
                $this->session->set_userdata(array(
                    'id' => $userdata[0]->rut,
                   	'ide' => $userdata [0]->id,
                    'nombre' => $userdata[0]->nombre ,
                	'apellido' => $userdata[0]->apellido,
					'tipo' => $userdata[0]->prefijo ,
                	'desc_tipo' => $userdata[0]->descripcion ,
                    'usuario' => $userdata[0]->codigo,
					'oficina' =>$userdata[0]->id_sucursal,
					'fecha_ingreso' =>$userdata[0]->f_ingreso,
					'telefono'=>$userdata[0]->telefono_socio,
					'fecha_registro' =>$userdata[0]->f_ingreso,
                    'isLoged' => "1"
                ));
                
                
                    $dataLog = array(
                        'log_type' => 'ValidaAcceso',
                        'title' => 'Ingreso Socio',
                        'log' => 'Ingreso Socio al Club',
                        'logger' => $user,
                        'ip_address' => $this->input->ip_address(),
                        'created' => date('Y-m-d h:i:s'),
                        'status' => 'Acceso a rutaparaiso Exitoso',
                        'data' => json_encode($result)
                    );
                    InsertLogApp($dataLog);
                 
                
                redirect('/');
            } else {
                
                    $dataLog = array(
                        'log_type' => 'ValidaAcceso',
                        'title' => 'Ingreso Socio',
                        'log' => 'Ingreso Socio al Club',
                        'logger' => $user,
                        'ip_address' => $this->input->ip_address(),
                        'created' => date('Y-m-d h:i:s'),
                        'status' => 'No existe en rutaparaiso',
                        'data' => json_encode($result)
                    );
                    InsertLogApp($dataLog);
                
                echo '!! Entra Error datos de conexion no validos aca:'.$result['ValidaAccesoResult']['AccesoValido'];
                //$this->session->set_flashdata('err', '!! Error en Inicio de Sesion <br />Verifique Usuario y/o Clave');
                //redirect('login');
            }

     }else{
                
                    $dataLog = array(
                        'log_type' => 'ValidaAcceso',
                        'title' => 'Ingreso Socio',
                        'log' => 'Ingreso Socio al Club',
                        'logger' => $user,
                        'ip_address' => $this->input->ip_address(),
                        'created' => date('Y-m-d h:i:s'),
                        'status' => 'Usuario Bloqueado o Error de Conexion',
                        'data' => json_encode($result)
                    );
                    InsertLogApp($dataLog);
                
                echo '!! Error datos de conexion no validos WS:'.$result['ValidaAccesoResult']['AccesoValido'];
                //$this->session->set_flashdata('err', '!! Error en Inicio de Sesion <br />Verifique Usuario y/o Clave');
                //redirect('login');

        
     }    
        
            
       
   }
 	

		
	function Logout() {
		$this->session->unset_userdata ( 'isLoged' );
		//$this->session->sess_destroy ();
		redirect ( 'login' );
	}
}