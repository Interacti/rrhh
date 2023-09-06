<?php
if (!defined('BASEPATH'))     exit('No direct script access allowed');
class Encuesta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoged')){
            redirect('login');
        } else {
            $this->load->model('cartola_model');
            	
        }
    }

    function Index() {
    
        $datos['content']= '/frontend/encuesta/encuesta';
        $datos['camino_migas'] =   array('INICIO'=>BASE_URL,'ENCUESTA'=>BASE_URL."/encuesta");
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    
    
    }
    
    
    
    
    
    public function   Save(){
        
        $yaContesto=$this->ya_contesto($this->session->userdata('id'));

        if ( $yaContesto>0){
            $datos['content']= '/frontend/encuesta/yacontestaste';
            $datos['camino_migas'] =   array('INICIO'=>BASE_URL,'ENCUESTA'=>BASE_URL."/encuesta");
            $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
            
        } else {
            $data['preg_1']=$this->input->post('preg_1');
            $data['preg_2']=$this->input->post('preg_2');
            $data['preg_3']=$this->input->post('preg_3');
            $data['preg_4']=$this->input->post('preg_4');
            $data['preg_5']=$this->input->post('preg_5');
            $data['preg_6']=$this->input->post('preg_6');
            $data['preg_7']=$this->input->post('preg_7');
            $data['preg_8']=$this->input->post('comentario');
            $data['fecha']=date('Y-d-m H:i:s');
            $data['usuario']=$this->session->userdata('id');
            $this->db->insert('in_encuesta',$data);
    
            $datos['content']= '/frontend/encuesta/gracias';
            $datos['camino_migas'] =   array('INICIO'=>BASE_URL,'ENCUESTA'=>BASE_URL."/encuesta");
            $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
        }
        
        
        
    }


    function ya_contesto($id){
        $this->db->where('usuario',$id);
        $this->db->from('in_encuesta');
        return  $this->db->count_all_results();
    }  
     

}