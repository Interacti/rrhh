<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_Model extends CI_Model {
    function __construct() {
        parent::__construct();
   }

   function getCanjeByNegocio($fInicio = null, $fTermino = null) {
        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select('tipo_socio,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 8) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('tipo_socio')
                ->order_by('tipo_socio');
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

   function getCanjeBySucursal($fInicio = null, $fTermino = null) {
        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select('sucursal,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 8) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('sucursal')
                ->order_by('sucursal');
        $query = $this->db->get();
        //echo $this->db->last_query();
        //die($this->db->last_query());
        return $query->result();
   }

  function getCanjeByProveedor($fInicio = null, $fTermino = null) {
        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select(' in_proveedor.nombre_empresa ,
        					sum(in_producto.valor_en_puntos) puntos ,
        					(SUM(valor_en_puntos)* 8) pesos')
                ->from('in_canje')
                ->join('in_producto','in_canje.id_producto=in_producto.id_producto')
                ->join('in_proveedor','in_producto.id_proveedor=in_proveedor.id_proveedor')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('nombre_empresa')
                ->order_by('in_proveedor.nombre_empresa');
                echo $this->db->last_query();
        $query = $this->db->get();

        //echo($this->db->last_query());
        return $query->result();
    }

  /* function getCanjeByProveedor($fInicio = null, $fTermino = null) {
        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select('nombre_empresa,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 8) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('nombre_empresa')
                ->order_by('nombre_empresa');
        $query = $this->db->get();
        //die($this->db->last_query());
        return $query->result();
   }*/

   /*function getCanjeBySubCategoria($fInicio = null, $fTermino = null) {
        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select('glosa_sub_categoria,sum(valor_en_puntos) puntos ,(SUM(valor_en_puntos)* 8) pesos')
                ->from('vw_canje')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('glosa_sub_categoria')
                //->limit(10)
                ->order_by('sum(valor_en_puntos) desc');
        $query = $this->db->get();
        //die($this->db->last_query());
        return $query->result();
   }*/
   
   function getCanjeBySubCategoria($fInicio = null, $fTermino = null) {
        $fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
        $fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select(' in_sub_categoria_prod.glosa_sub_categoria,
        					sum(in_producto.valor_en_puntos) puntos ,
        					(sum(in_producto.valor_en_puntos)* 8) pesos')
                ->from('in_canje')
                ->join('in_producto','in_canje.id_producto=in_producto.id_producto')
                ->join('in_sub_categoria_prod','in_producto.id_sub_categoria=in_sub_categoria_prod.id_sub_categoria')
                ->where("fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
                ->group_by('glosa_sub_categoria')
                ->order_by('sum(valor_en_puntos) desc');
         //echo $this->db->last_query();       
        $query = $this->db->get();
        //echo($this->db->last_query());
        return $query->result();
    }
   
     
   function getProductosCanjeados($fInicio = null, $fTermino = null) {
    	$fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
    	$fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
        $this->db->select(' UPPER(in_producto.producto) producto,
        					count(in_canje.id_canje) cantidad,
    						sum(in_producto.valor_en_puntos) puntos,
    						(sum(in_producto.valor_en_puntos)* 8) pesos')
    	->from('in_canje')
    	->join('in_producto', 'in_canje.id_producto = in_producto.id_producto','right')
    	->where("in_canje.fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
    	->group_by('in_producto.producto')
        ->limit(10)
      	->order_by('count(in_canje.id_canje) desc');
    	$query = $this->db->get();
        //echo $this->db->last_query();
    	return $query->result();
        
   }
    
   function getAllProductosCanjeados($fInicio = null, $fTermino = null) {
    	$fInicio = !is_null($fInicio) ? $fInicio : date('Y') . '-01-01';
    	$fTermino = !is_null($fTermino) ? $fTermino : date('Y-m-d');
    	$this->db->select(' UPPER(in_producto.producto) producto,
    						count(in_canje.id_canje) cantidad,
    						sum(in_producto.valor_en_puntos) puntos,
    						(sum(in_producto.valor_en_puntos)* 8) pesos')
    	->from('in_canje')
    	->join('in_producto', 'in_canje.id_producto = in_producto.id_producto','right')
    	->where("in_canje.fecha BETWEEN '" . $fInicio . "' and '" . $fTermino . "'")
    	->group_by('in_producto.producto')
      	->order_by('count(in_canje.id_canje) desc');
     	$query = $this->db->get();
    	return $query->result();
   }
    
    

}
