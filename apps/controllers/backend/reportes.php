<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @author artanis
 *        
 */
class Reportes extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('bo_isLogued')) {
            redirect('bo/login/formLogin');
        } else {

            $this->load->model('reportes_model');
            $this->load->library('highcharts.php');
        }
    }

    function Index() {
        
    }

    function Canjes() {
        //$fi = $this->input->post('fecha_inicio') != "" ? $this->input->post('fecha_inicio') : ( (int) date('m') === 1 ? date('Y') - 1 : date('Y')) . '-' . ( (int) date('m') - 1 === 0 ? 12 : date('m') - 1 ) . '-' . date('d');
        //$ft = $this->input->post('fecha_termino') != "" ? $this->input->post('fecha_termino') : date('Y-m-d');
        
    	$fi=$this->input->post('fecha_inicio')=="" ?  date('Y').'-'.((ceil(date('m'))-1)<10 ? '0':'') .(ceil(date('m'))-1) .'-'. date('d') : $this->input->post('fecha_inicio');
    	$ft=$this->input->post('fecha_termino')=="" ?  date('Y-m-d') : $this->input->post('fecha_termino');
    	
    	
        $datos ['content'] = 'backend/reportes/reporte'; // llamada al content de este metodo
        $datos ['hide'] = false;
        $datos ['titulo'] = 'Reportes';
        $datos ['finicio'] = $fi;
        $datos ['ftermino'] = $ft;
        $datos ['info_negocios'] = $this->__CanjesPorNegocios($fi, $ft);
        $datos ['info_sucursal'] = $this->__CanjesPorSucursal($fi, $ft);
        $datos ['info_proveedor'] = $this->__CanjesPorPreoveedor($fi, $ft);
        $datos ['info_categorias'] = $this->__CanjesPorcategoria($fi, $ft);
        $datos ['titulo_filtro'] = 'Filtro Reportes';
        $datos ['seccion'] = array(
            'Reportes',
            'bo/reportes',
            'Agregar',
            '/bo/abono'
        );
        $this->load->view('backend/layout', $datos); // llamada a la vista general
    }
    
    
    function Productos(){
    	
    	$fi=$this->input->post('fecha_inicio')=="" ?  date('Y').'-'.((ceil(date('m'))-1)<10 ? '0':'') .(ceil(date('m'))-1) .'-'. date('d') : $this->input->post('fecha_inicio');
    	$ft=$this->input->post('fecha_termino')=="" ?  date('Y-m-d') : $this->input->post('fecha_termino');
    	//echo '<pre>';
    	//print_r($this->__ProductosCanjeados($fi, $ft));
    	
    	
    	$datos ['content'] = 'backend/reportes/reporteprod'; // llamada al content de este metodo
    	$datos ['hide'] = false;
    	$datos ['titulo'] = 'Reportes';
    	$datos ['finicio'] = $fi;
    	$datos ['ftermino'] = $ft;
    	$datos ['info_productos'] = $this->__ProductosCanjeados($fi, $ft);
    	$datos ['all_productos'] = $this->reportes_model->getAllProductosCanjeados($fi, $ft);
    	//$datos ['info_proveedor'] = $this->__CanjesPorPreoveedor($fi, $ft);
    	//$datos ['info_categorias'] = $this->__CanjesPorcategoria($fi, $ft);
    	$datos ['titulo_filtro'] = 'Filtro Reportes';
    	$datos ['seccion'] = array(
    			'Reportes',
    			'bo/reportes',
    			'Productos',
    			'/bo/reportes'
    	);
    	$this->load->view('backend/layout', $datos); // llamada a la vista general
    	//$fi = $this->input->post('fecha_inicio') != "" ? $this->input->post('fecha_inicio') : ( (int) date('m') === 1 ? date('Y') - 1 : date('Y')) . '-' . ( (int) date('m') - 1 === 0 ? 12 : date('m') - 1 ) . '-' . date('d');
    	//$ft = $this->input->post('fecha_termino') != "" ? $this->input->post('fecha_termino') : date('Y-m-d');
    	
    	
    	
    	
    }
    
    
    

    private function __CanjesPorNegocios($fi, $ft) {

        $data = $this->reportes_model->getCanjeByNegocio($fi, $ft);
        if (count($data) > 0) {
            foreach ($data as $dt) {
                $graph_data [] = (object) array(
                            'negocio' => $dt->tipo_socio,
                            'puntos' => $dt->puntos,
                            'pesos' => $dt->puntos * 8
                );
            }
            $dat1 ['x_labels'] = 'negocio'; // optionnal, set axis categories from result row
            $dat1 ['series'] = array(
                'puntos',
                'pesos'
            ); // set values to create series, values are result rows
            $dat1 ['data'] = $graph_data;
            //$this->highcharts->set_type('');
            $this->highcharts
                    ->set_title('Canjes Por Tipo de Negocios', 'Desde ' . setea_fecha($fi) . ' Hasta ' . setea_fecha($ft))
                    ->set_dimensions(1024, 300)
                    ->from_result($dat1)->add();
            $datos ['titulo_reporte_negocio'] = 'Canjes Por Tipo de Negocios';
            $datos ['charts_negocio'] = $this->highcharts->render();
            $datos ['data_negocios'] = $data;
            return $datos;
        }
    }

    private function __CanjesPorSucursal($fi, $ft) {
        $data = $this->reportes_model->getCanjeBySucursal($fi, $ft);
        if (count($data) > 0) {
            foreach ($data as $dt) {
                $graph_data [] = (object) array(
                            'sucursal' => $dt->sucursal,
                            'puntos' => $dt->puntos,
                            'pesos' => $dt->puntos * 8
                );
            }
            $dat1 ['x_labels'] = 'sucursal'; // optionnal, set axis categories from result row
            $dat1 ['series'] = array(
                'puntos',
                'pesos'
            ); // set values to create series, values are result rows
            $dat1 ['data'] = $graph_data;
            $this->highcharts
                    ->set_title('Canjes Por Sucursal', 'Desde ' . setea_fecha($fi) . ' Hasta ' . setea_fecha($ft))
                    ->set_dimensions(1024, 300)
                    ->from_result($dat1)
                    ->add();
            $datos ['titulo_reporte_sucursal'] = 'Canjes Por Sucursal';
            $datos ['charts_sucursal'] = $this->highcharts->render();
            $datos ['data_sucursal'] = $data;
            return $datos;
        }
    }

    private function __CanjesPorPreoveedor($fi, $ft) {
        $data = $this->reportes_model->getCanjeByProveedor($fi, $ft);
        if (count($data) > 0) {
            foreach ($data as $dt) {
                $graph_data [] = (object) array(
                            'proveedor' => $dt->nombre_empresa,
                            'puntos' => $dt->puntos,
                            'pesos' => $dt->puntos * 8
                );
            }
            $dat1 ['x_labels'] = 'proveedor'; // optionnal, set axis categories from result row
            $dat1 ['series'] = array(
                'puntos',
                'pesos'
            ); // set values to create series, values are result rows
            $dat1 ['data'] = $graph_data;
            $this->highcharts
                    ->set_title('Canjes Por Proveedor', 'Desde ' . setea_fecha($fi) . ' Hasta ' . setea_fecha($ft))
                    ->set_dimensions(940, 300)
                    ->from_result($dat1)
                    ->add();
            $datos ['titulo_reporte_proveedor'] = 'Canjes Por Proveedor';
            $datos ['charts_proveedor'] = $this->highcharts->render();
            $datos ['data_proveedor'] = $data;
            return $datos;
        }
    }

    private function __CanjesPorcategoria($fi, $ft) {
        $data = $this->reportes_model->getCanjeBySubCategoria($fi, $ft);
        if (count($data) > 0) {
            foreach ($data as $dt) {
                $graph_data [] = (object) array(
                            'categoria' => $dt->glosa_sub_categoria,
                            'puntos' => $dt->puntos,
                            'pesos' => $dt->puntos * 8
                );
            }
            $dat1 ['x_labels'] = 'categoria'; // optionnal, set axis categories from result row
            $dat1 ['series'] = array(
                'puntos',
                'pesos'
            ); // set values to create series, values are result rows
            $dat1 ['data'] = $graph_data;
            $this->highcharts
                    ->set_title('Canjes Por Categoria', 'Desde ' . setea_fecha($fi) . ' Hasta ' . setea_fecha($ft))
                    ->set_dimensions(1024, 300)
                    ->from_result($dat1)
                    ->add();
            $datos ['titulo_reporte_categoria'] = 'Canjes Por Categoria';
            $datos ['charts_categoria'] = $this->highcharts->render();
            $datos ['data_categoria'] = $data;
            return $datos;
        }
    }


    private function __ProductosCanjeados($fi, $ft) {
    	$data = $this->reportes_model->getProductosCanjeados($fi, $ft);
    	if (count($data) > 0) {
    		foreach ($data as $dt) {
    			$graph_data [] = (object) array(
    					'producto' => $dt->producto,
    					'puntos' => $dt->puntos,
    					'pesos' => $dt->puntos * 8,
    					'cantidad' => $dt->cantidad
    					
    			);
    		}
    		$dat1 ['x_labels'] = 'producto'; // optionnal, set axis categories from result row
    		$dat1 ['series'] = array(
    				'puntos',
    				'pesos',
    				'cantidad'
    		); // set values to create series, values are result rows
    		$dat1 ['data'] = $graph_data;
    		$this->highcharts
    		->set_title('Productos Canjeados', 'Desde ' . setea_fecha($fi) . ' Hasta ' . setea_fecha($ft))
    		->set_dimensions(1024, 300)
    		->from_result($dat1)
    		->add();
    		$datos ['titulo_reporte_categoria'] = 'Productos Canjeados';
    		$datos ['charts_productos'] = $this->highcharts->render();
    		$datos ['data_productos'] = $data;
    		return $datos;
    	}
    }
    
   



}
