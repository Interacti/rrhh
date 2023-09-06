<?php

class Televenta_Model extends CI_Model{

	function __construct() {
		parent::__construct();
	}
	 
	 
	function getAgentesTeleventas(){
		//select * from vw_cartola order by fecha desc
		$this->db
		->select(' * ')
		->from('in_socio')
		->where('id_tipo', '4')
		->order_by("apellido");
		$query = $this->db->get();
		return $query->result();
		 
	}
	 

	function getSupervisorTeleventas(){
		//select * from vw_cartola order by fecha desc
		$this->db
		->select(' * ')
		->from('in_socio')
		->where('id_tipo', '7')
		->order_by("apellido");
		$query = $this->db->get();
		return $query->result();
			
	}
	 
	 
	 
	 function GuardarAbono($data=null){
	 	if (is_array($data)) {
	 		$this->db->trans_start();
	 		$this->db->insert('in_abono',$data);
	 		$insert_id = $this->db->insert_id();
	 		$this->db->trans_complete();
	 		return  true;
	 	} else {
	 		return false;
	 	}
	 }

	 
	 function GuardarDescuento($data=null){
	 	
	 	
	 	
	 	if (is_array($data)) {
	 		$this->db->trans_start(); 
	 		$this->db->insert('in_descuento',$data);
	 		$insert_id = $this->db->insert_id();
	 		$this->db->trans_complete();
	 		return  true;
	 	} else {
	 		return false;
	 	}
	 }
	 

}