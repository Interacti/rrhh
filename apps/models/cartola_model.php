<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Cartola_Model extends CI_Model{
    
   function __construct() {
      parent::__construct();
   }
   
   
   function getCartola($rutsocio){
    //select * from vw_cartola order by fecha desc 
             $this->db
            ->select(' * ')
            ->from('vw_cartola')
            ->where('rut_socio', $rutsocio)
            ->order_by("fecha desc"); 
            $query = $this->db->get();
            return $query->result();


   
   }
   
   
   
   
   
   function getAbonos($rutsocio){
	   		$this->db
            ->select('id_abono,rut_socio,fecha,tipo_abono,abono')
            ->from('in_abono')
            ->where('rut_socio', $rutsocio); 
            $query = $this->db->get();
            return $query->result();
	     
   }
   
   
	
    
   function getTotalAbonos ($rutsocio){
    
           $this->db
            ->select(' sum(abono) abono ')
            ->from('in_abono')
            ->where('rut_socio', $rutsocio); 
            $query  = $this->db->get();
            $abn    = $query->result();
            $abn = count($abn) > 0 ? $abn[0]->abono : 0;
 


            $this->db
            ->select(' sum(puntos) pts ')
            ->from('in_formalizacion_detalle')
            ->where('rut', $rutsocio); 
            $query = $this->db->get();
            $frm    = $query->result();
            $frm = count($frm) > 0 ? $frm[0]->pts : 0;
 
            
            $this->db
                    ->select(' puntos pts ')
                    ->from('in_puntos_gerentes')
                    ->where('rut_gerente', $rutsocio);
            $query = $this->db->get();
            $pts_gte = $query->result();
            $pts_gte = count($pts_gte) > 0 ? $pts_gte[0]->pts : 0;


            return ((int)$frm + (int)$abn + (int)$pts_gte);




            
    
   } 

  function getTotalAbono ($rutsocio){
    
           $this->db
            ->select(' sum(puntos) pts ')
            ->from('in_formalizaciones_detalle')
            ->where('rut', $rutsocio); 
            $query = $this->db->get();
            return $query->result();
            
            
            
    
   }




   function getTotalDescuentos($rutsocio){
    
            $this->db
            ->select(' sum(descuento)  descuento ')
            ->from('in_descuento')
            ->where('rut_socio', $rutsocio); 
            $query = $this->db->get();
            return $query->result();
    
   }
	
    
    function getTotalCanjes ($rutsocio){
            $this->db
            ->select(' sum(valor_en_puntos) canje ')
            ->from('in_canje')
            ->join('in_producto', 'in_canje.id_producto=in_producto.id_producto')
            ->where('rut_socio', $rutsocio); 
            $query = $this->db->get();
            return $query->result();
     } 
	
    
    function getAbonoGerente($rut){
            
            $this->db
                    ->select(' puntos pts ')
                    ->from('in_puntos_gerentes')
                    ->where('rut_gerente', $rut);
            $query = $this->db->get();
            $pts_gte = $query->result();
            $pts_gte = count($pts_gte) > 0 ? $pts_gte[0]->pts : 0;
            return $pts_gte;
    }
    
    
    
    
  
}