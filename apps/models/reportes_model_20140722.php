<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes_Model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    function getCanjeByNegocio($fInicio = null, $fTermino = null) {

        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');

        $this->db->select('tipo_socio,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 7.34) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('tipo_socio')
                ->order_by('tipo_socio');
        $query = $this->db->get();
        return $query->result();
    }

    function getCanjeBySucursal($fInicio = null, $fTermino = null) {


        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select('sucursal,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 7.34) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('sucursal')
                ->order_by('sucursal');
        $query = $this->db->get();

        //die($this->db->last_query());
        return $query->result();
    }

    function getCanjeByProveedor($fInicio = null, $fTermino = null) {


        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select('nombre_empresa,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 7.34) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('nombre_empresa')
                ->order_by('nombre_empresa');
        $query = $this->db->get();

        //die($this->db->last_query());
        return $query->result();
    }

    function getCanjeBySubCategoria($fInicio = null, $fTermino = null) {


        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select('glosa_sub_categoria,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 7.34) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('glosa_sub_categoria')
                ->limit(10)
                ->order_by('sum(valor_en_puntos) desc');
                
        $query = $this->db->get();

        //die($this->db->last_query());
        return $query->result();
    }
    
    
    
    
    function getProductosCanjeados($fInicio = null, $fTermino = null) {
    	$fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
    	$fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
    	$this->db->select('UPPER(producto) producto,count(producto) cantidad,sum(valor_en_puntos) puntos,(SUM(valor_en_puntos)* 7.34) pesos')
    	->from('DetalleDeCanjes')
    	->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
    	->group_by('producto')
    	->limit(10)
    	->order_by('count(producto) desc');
    
    	$query = $this->db->get();
    	return $query->result();
    }
    
    

}
