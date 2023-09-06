<?php

// Este codigo es para validar que solo se pueda acceder desde index.php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Desktop extends CI_Controller {
	function __construct() {
		parent::__construct ();
		
		if (! $this->session->userdata ( 'bo_isLogued' )) {
			redirect ( 'bo/login/formLogin' );
		} else {
			
			$this->load->library ( 'PHPExcel' );
			$this->load->model ( 'solicitud_model' );
            $this->load->library('form_validation');
		}
	}
	function Index() {
		redirect ( 'bo/desktop/solicitudes' );
	}
	
	
	function PlanillaCanje($fInicio = null, $fTermino = null) {
		$fInicio = $this->input->post ( 'fecha_inicio' ) == "" ? null : $this->input->post ( 'fecha_inicio' );
		$fTermino = $this->input->post ( 'fecha_termino' ) == "" ? null : $this->input->post ( 'fecha_termino' );
		
		$datos ['content'] = '/backend/desktop/desktop'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['solicitudes'] = $this->solicitud_model->getPlanillaCanjes( $fInicio, $fTermino );
		$datos ['seccion'] = array (
				'Desktop',
				'bo/desktop/Solicitudes',
				'Planilla Canjes',
				'bo/desktop/PlanillaCanje' 
		);
		$datos ['titulo'] = "Planilla de Canjes ";
		$datos ['fInicio'] = $fInicio;
		$datos ['fTermino'] = $fTermino;
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	} 
	
	function Solicitudes(){
	   
      
       
		$datos ['content'] = '/backend/desktop/solicitudes'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['solicitudes'] = $this->solicitud_model->getAllSolicitudes ( );
	
         
         
        
    	$datos ['seccion'] = array (
				'Desktop',
				'bo/desktop/Solicitudes',
				'Solicitudes',
				'bo/desktop/Solicitudes'
		);
		$datos ['titulo'] = "Solicitudes de Canjes";
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
		
		
		//$solicitudes
	}
	
    function Estatus($id=null){
            $data['id']=$id;
            $data['estados']=$this->solicitud_model->getEstadoSolicitud();
        	$this->load->view ( 'backend/desktop/status', $data); // llamada a la vista general
    }
	
	
	function DetalleSolicitud($id = null) {
		$datos ['content'] = '/backend/desktop/detallesolicitud'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['solicitudes'] = $this->solicitud_model->getDetalleSolicitud($id);
		$datos ['seccion'] = array (
				'Inicio',
				'bo/desktop',
				'Detalle de Canjes Por Solicitud',
				'' 
		);
		$datos ['titulo'] = "Administrador / Detalle de Canjes Por Solicitud ";
		
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general*/
	}
	
	
	function ActualizaSolicitud() {
    $this->form_validation->set_rules ( 'estado', 'Estado', 'required|trim|xss_clean|integer' );
   	//$this->form_validation->set_rules ( 'fecha_despacho', 'Fecha Despacho', 'required|trim|xss_clean' );
    $this->form_validation->set_rules ( 'observacion', 'Observacion', 'required|trim|xss_clean' );
   	if ($this->form_validation->run() == FALSE) {
   		   $data=array(
              "succes"=>"error",
              "estado"=>form_error('estado'),
              "fecha_despacho"=>form_error('fecha_despacho'),
              "observacion"=>form_error('observacion'),
           );
           
            echo json_encode($data);
            exit;
   		}else {
   			
               $data = array (
				"id_solicitud" => $this->input->post('id'),
				"estado" => $this->input->post('estado'),
                "fecha_despacho"=>$this->input->post('fecha_despacho'),
                "observacion"=>$this->input->post('observacion'));
		
        
                        
        		if ($this->solicitud_model->ActulizaEstadoSolicitud ( $data )) {
        			//echo ( 'Se ha cambiado el esatdo de la solicitud numero ' .$this->input->post('id') );
                    $data=array(
                  "succes"=>"OK",
                  "msg"=>"Orden Actualizada de forma correcta"
               );
           
            echo json_encode($data);
            exit;
        			
        		} else {
        			
        			
        		}                
                            
   			
   			
   		}
    
        die();
    
    /*	$data = array (
				"id_solicitud" => $idSol,
				"estado" => $Estado 
		);
		
		if ($this->solicitud_model->ActulizaEstadoSolicitud ( $data )) {
			$this->session->set_flashdata ( 'msg', 'Se ha cambiado el esatdo de la solicitud numero ' . $idSol );
			redirect ( 'bo/desktop/Solicitudes' );
		} else {
			
			$this->session->set_flashdata ( 'error', 'Error al realizar la operacion de actualizacion para la orden ' . $idSol );
			redirect ( 'bo/desktop/Solicitudes' );
		}*/
	}
	
	function SolicitudesToExecel($fInicio = null, $fTermino = null) {
		//    echo "<pre>";
	    $query = $this->solicitud_model->getSolicitudesCanjeExcel ( $fInicio, $fTermino );
		//print_r($query);
		
		if (! $query) {
			return false;
		}
		
		
		;
		// if(count($query->result())==0){ return false;};
		
		$objPHPExcel = new PHPExcel ();
		$objPHPExcel->getProperties ()->setTitle ( "export" )->setDescription ( "Canjes" );
		$objPHPExcel->setActiveSheetIndex ( 0 );
		// Field names in the first row
		//$fields = $query->list_fields ();
		$fields=array('fecha','rut_socio','nombre','apellido','email','producto','items','puntos','proveedor','codigo_antiguo','sucursal');
		$col = 0;
		
		
		foreach ( $fields as $field ) {
			$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( $col, 1, $field );
			$col ++;
		}
		
		// Fetching the table data
		$row = 2;
		foreach ( $query  as $data ) {
		  
			
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 0, $row, $data->fecha );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 1, $row, $data->rut_socio );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 2, $row, $data->nombre );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 3, $row, $data->apellido );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 5, $row, $data->producto );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 4, $row, $data->email );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 6, $row, $data->items );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 7, $row, $data->puntos );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 8, $row, $data->proveedor );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 9, $row, $data->codigo_antiguo );
				$objPHPExcel->getActiveSheet ()->setCellValueByColumnAndRow ( 10, $row, $data->sucursal );
			
			$row ++;
		}
		
		
		header ( 'Content-Type: application/vnd.ms-excel' );
		header ( 'Content-Disposition: attachment;filename="Canjes_' . date ( 'dmY' ) . '.xls"' );
		header ( 'Cache-Control: max-age=0' );
		$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, "Excel5" );
		$objWriter->save ( 'php://output' );
	}
	
	function Eliminar($id_canje = null) {
		
		if (!$this->input->is_ajax_request()) {
			die('No se permite esta accion');
		}
		
		if (is_numeric ( $id_canje )) {
			if ($this->solicitud_model->DeleteCanjeById ( $id_canje )){
				$data=array(
						'success'=>'OK'
				);
			}else{
				$data=array(
						'success'=>'error'
				);
			}
			die(json_encode($data));
		} else {
			$data=array(
					'success'=>'error'
			);
		}
	}
	
	//eliminarSolicitud
	
	function eliminarSolicitud($id_sol = null) {
	
		if (!$this->input->is_ajax_request()) {
			die('No se permite esta accion');
		}
	
		if (is_numeric ( $id_sol )) {
			if ($this->solicitud_model->DeleteSolicitud( $id_sol )){
				$data=array(
						'success'=>'OK'
				);
			}else{
				$data=array(
						'success'=>'error'
				);
			}
			die(json_encode($data));
		} else {
			$data=array(
					'success'=>'error'
			);
		}
	}
	
	
}