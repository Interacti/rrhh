<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Formalizacion extends CI_Controller {
	function __construct() {
		parent::__construct ();
		if (! $this->session->userdata ( 'bo_isLogued' )) {
			redirect ( 'bo/login/formLogin' );
		} else {
			$this->load->library ( 'PHPExcel' );
			$this->load->model ( 'tipo_abono_model' );
			$this->load->model ( 'abono_model' );
			$this->load->library ( 'upload' );
			$this->load->library ( 'paginar' );
			$this->load->library ( 'form_validation' );
		}
	}
	function Index() {
		redirect ( 'bo/formalizacion/Listar' );
	}
	function Listar() {
		$datos ['data'] = $this->abono_model->getFormalizaciones ();
		$datos ['content'] = 'backend/formalizacion/listar'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['titulo'] = "Administrador de Formalizaciones / Listar";
		$datos ['lista'] = $this->paginar; // $this->categorias_model->ListarCategorias();
		$datos ['seccion'] = array (
				'Formalizacion',
				'/bo/formalizacion',
				'Listado',
				'/bo/formalizacion' 
		);
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	function Detalle($id) {
		$datos ['data'] = $this->abono_model->getDetalleFormalizacionAgentes ( $id );
		$datos ['sup'] = $this->abono_model->getDetalleFormalizacionSupervisores ( $id );
		$datos ['content'] = 'backend/formalizacion/detalle'; // llamada al content de este metodo
		$datos ['hide'] = false;
		$datos ['titulo'] = "Administrador de Formalizaciones / Detalle";
		$datos ['lista'] = $this->paginar; // $this->categorias_model->ListarCategorias();
		$datos ['seccion'] = array (
				'Formalizacion',
				'/bo/formalizacion',
				'Detalle',
				'/bo/formalizacion' 
		);
		$this->load->view ( 'backend/layout', $datos ); // llamada a la vista general
	}
	function Agregar() {
		$datos ['content'] = '/backend/formalizacion/agregar';
		$datos ['hide'] = false;
		$datos ['tipo'] = $this->tipo_abono_model->getTipoFormalizacion ();
		$datos ['mes'] = array (
				'ENERO' => 1,
				'FEBRERO' => 2,
				'MARZO' => 3,
				'ABRIL' => 4,
				'MAYO' => 5,
				'JUNIO' => 6,
				'JULIO' => 7,
				'AGOSTO' => 8,
				'SEPTIEMBRE' => 9,
				'OCTUBRE' => 10,
				'NOVIEMBRE' => 11,
				'DICIEMBRE' => 12,
                'CARGA ESPECIAL' => 13  
		);
		$datos ['seccion'] = array (
				'Formalizacion',
				BASE_URL . 'bo/formalizacion',
				'Subir Archivo',
				BASE_URL . 'bo/formalizacion/subir' 
		);
		$datos ['titulo'] = "Subir Formalizacion ";
		$this->load->view ( 'backend/layout', $datos );
	}
	function Save() {
		$this->form_validation->set_rules ( 'mes', 'Mes', 'required|xss_clean|integer' );
		$this->form_validation->set_rules ( 'anno', 'A&ntilde;', 'required|xss_clean|integer' );
		$this->form_validation->set_rules ( 'descripcion', 'Descripcion', 'required|trim|xss_clean|max_length[30]' );
		$this->form_validation->set_rules ( 'estado', 'Estado', 'required|integer' );
		if ($this->form_validation->run () === FALSE) {
			$this->session->set_flashdata ( 'errors', validation_errors () );
			$this->session->set_flashdata ( 'formdata', $this->input->post () );
			redirect ( '/bo/formalizacion/Agregar' );
		} else {
			$config_formal ['upload_path'] = './assets/backoffice/formalizaciones/';
			$config_formal ['allowed_types'] = '*';
			$config_formal ['max_size'] = '2000';
			$sbd = $this->SubeExcel ( $config_formal, 'archivo' );
			
			if (is_array ( $sbd ) && count ( $sbd ) > 0) {
				
				$config_formal ['upload_path'] = './assets/backoffice/formalizaciones/';
				$config_formal ['allowed_types'] = '*';
				$config_formal ['max_size'] = '2000';
				$sbi = $this->SubeExcel ( $config_formal, 'archivo_sup' );
				
				if (is_array ( $sbi ) && count ( $sbi ) > 0) {
					
					$data = array (
							'mes' => $this->input->post ( 'mes' ),
							'ano' => $this->input->post ( 'anno' ),
							'tipo' => $this->input->post ( 'tipo' ),
							'archivo' => $sbd ['file_name'],
							'archivo_sup' => $sbi ['file_name'],
							'descripcion' => $this->input->post ( 'descripcion' ),
							'estado' => $this->input->post ( 'estado' ),
							'fecha' => date ( 'Y-m-d' ) 
					);
					
					$nroProc = $this->abono_model->GuardarFormalizacion ( $data );
					
					if (! is_numeric ( $nroProc )) {
						$this->session->set_flashdata ( 'errors', "Error al insertar el registro" );
						$this->session->set_flashdata ( 'formdata', $this->input->post () );
						redirect ( BASE_URL . 'bo/formalizacion/Agregar' );
					} else {
						
						$this->__Calcular ( $nroProc );
						
						$this->session->set_flashdata ( 'success', "registro ingresado con exito" );
						redirect ( BASE_URL . 'bo/formalizacion' );
					}
				} else {
					$this->session->set_flashdata ( 'errors', $sbi );
					$this->session->set_flashdata ( 'formdata', $this->input->post () );
					redirect ( '/bo/formalizacion/Agregar' );
				}
			} else {
				$this->session->set_flashdata ( 'errors', $sbd );
				$this->session->set_flashdata ( 'formdata', $this->input->post () );
				redirect ( '/bo/formalizacion/Agregar' );
			}
		}
	}
	function __Calcular($id_formalizacion = null, $tipo = null) {
		$formalizacion = $this->abono_model->getFormalizacionById ( $id_formalizacion );
		$arrParam = array (
				'id' => $formalizacion [0]->id,
				'periodo' => $formalizacion [0]->ano . '-' . $formalizacion [0]->mes 
		);
		$objPHPExcel = PHPExcel_IOFactory::load ( './assets/backoffice/formalizaciones/' . $formalizacion [0]->archivo );
		$total_sheets = $objPHPExcel->getSheetCount ();
		$allSheetName = $objPHPExcel->getSheetNames ();
		
		foreach ( $objPHPExcel->getWorksheetIterator () as $worksheet ) {
			$arrayData [$worksheet->getTitle ()] = $worksheet->toArray ();
		}
		
		$this->__insertaAgentes ( $arrayData ['IND-24'], 'IND-24', $arrParam );
		$this->__insertaAgentes ( $arrayData ['IND+24'], 'IND+24', $arrParam );
		$this->__insertaAgentes ( $arrayData ['PF+24'], 'PF+24', $arrParam );
		$this->__insertaAgentes ( $arrayData ['PF-24'], 'PF-24', $arrParam );
		
		$arrayData = "";
		$objPHPExcel = PHPExcel_IOFactory::load ( './assets/backoffice/formalizaciones/' . $formalizacion [0]->archivo_sup );
		$total_sheets = $objPHPExcel->getSheetCount ();
		$allSheetName = $objPHPExcel->getSheetNames ();
		
		foreach ( $objPHPExcel->getWorksheetIterator () as $worksheet ) {
			$arrayData [$worksheet->getTitle ()] = $worksheet->toArray ();
		}
		
		$this->__insertaSupervisor ( $arrayData ['SUPIND'], 'SUP-IND', $arrParam );
		$this->__insertaSupervisor ( $arrayData ['SUPPF'], 'SUP-PF', $arrParam );
	}
	private function __insertaAgentes($data, $tabla, $arrParam) {
		for($i = 1; $i <= count ( $data ) - 1; $i ++) {
			$arrData [] = array (
					'CODINTER' => $data [$i] [0],
					'RUT' => substr ( $data [$i] [1], 0, strlen ( $data [$i] [1] ) - 1 ) . '-' . substr ( $data [$i] [1], - 1 ),
					'TIPO' => $data [$i] [4],
					'CODSUPERVISOR' => $data [$i] [8],
					'NEGAPV' => $data [$i] [11],
					'NEGNOAPV' => $data [$i] [12],
					'PERM' => $data [$i] [13],
					'CAPITAL' => $data [$i] [14],
					'CPROM' => $data [$i] [15],
					'COMISION' => $data [$i] [16],
					'RUTSUP' => substr ( $data [$i] [17], 0, strlen ( $data [$i] [17] ) - 1 ) . '-' . substr ( $data [$i] [17], - 1 ),
					'ANTIGUEDAD' => $data [$i] [18],
					'TABLA' => $tabla,
					'FCARGA' => date ( 'Y-m-d H:i:s' ),
					'CODOPER' => $arrParam ['id'],
					'PERIODO' => $arrParam ['periodo'] 
			);
		}
		$this->db->trans_start ();
		$this->db->insert_batch ( 'in_formalizacion_detalle', $arrData );
		$this->db->trans_complete ();
		
		if ($this->db->trans_status () === FALSE) {
			return false;
		} else {
			return true;
		}
	}
	private function __insertaSupervisor($data, $tabla, $arrParam) {
		for($i = 1; $i <= count ( $data ) - 1; $i ++) {
			$arrData [] = array (
					'CODINTER' => $data [$i] [0],
					'RUT' => substr ( $data [$i] [10], 0, strlen ( $data [$i] [10] ) - 1 ) . '-' . substr ( $data [$i] [10], - 1 ),
					'UFAS' => $data [$i] [6],
					'TABLA' => $tabla,
					'FCARGA' => date ( 'Y-m-d H:i:s' ),
					'CODOPER' => $arrParam ['id'],
					'PERIODO' => $arrParam ['periodo'] 
			);
		}
		$this->db->trans_start ();
		$this->db->insert_batch ( 'in_formalizacion_detalle', $arrData );
		$this->db->trans_complete ();
		
		if ($this->db->trans_status () === FALSE) {
			return false;
		} else {
			return true;
		}
	}
	function Calcular($nroProc) {
		$query = "call spCalculaAgente('$nroProc')";
		$query2 = $this->db->query ( $query );
		if ($this->db->affected_rows () > 0) {
		}
		;
	}
	function SubeExcel($data = null, $campo = null) {
		$this->upload->initialize ( $data );
		if (! $this->upload->do_upload ( $campo )) {
			return $this->upload->display_errors ();
		} else {
			return $this->upload->data ();
		}
	}
	
	/*
	 * public function importarExcel($fileWithPath) { // estas lineas nos puede servir para comprobar que nuestro fichero // que queremos cargar existe // $fileWithPath - Es el nombre del fichero con el path completo // if(file_exists($fileWithPath)) { // echo 'exist'."<br>"; // } else { // echo 'dont exist'."<br>"; // die; // } //cargamos el archivo a procesar. $objPHPExcel = $this->get('xls.load_xls2007')->load($fileWithPath); //se obtienen las hojas, el nombre de las hojas y se pone activa la primera hoja $total_sheets=$objPHPExcel->getSheetCount(); $allSheetName=$objPHPExcel->getSheetNames(); $objWorksheet = $objPHPExcel->setActiveSheetIndex(0); //Se obtiene el n�mero m�ximo de filas $highestRow = $objWorksheet->getHighestRow(); //Se obtiene el n�mero m�ximo de columnas $highestColumn = $objWorksheet->getHighestColumn(); $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn); //$headingsArray contiene las cabeceras de la hoja excel. Llos titulos de columnas $headingsArray = $objWorksheet->rangeToArray('A1:'.$highestColumn.'1',null, true, true, true); $headingsArray = $headingsArray[1]; //Se recorre toda la hoja excel desde la fila 2 y se almacenan los datos $r = -1; $namedDataArray = array(); for ($row = 2; $row <= $highestRow; ++$row) { $dataRow = $objWorksheet->rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true); if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] > '')) { ++$r; foreach($headingsArray as $columnKey => $columnHeading) { $namedDataArray[$r][$columnHeading] = $dataRow[$row][$columnKey]; } //endforeach } //endif } var_dump($namedDataArray); } //end function
	 */
}