<?php
class Descuento_Model extends  CI_Model {
	
	protected $table = 'in_descuento';
	
	function __construct(){
		
		parent::__construct();
		
	}
		
	
	function getDescuentoSocios (){
	
		    $this->db
		    ->select(' * ')
		    ->from('vw_descuento_socios')
		    ->order_by("fecha","desc");
		    $query = $this->db->get();
		    
		    //print_r($query->result());
		    return $query->result();
			
	}
	
	function GuardarDescuento($data){
		if (is_array($data)) {
			$this->db->trans_start();
			$this->db->insert($this->table,$data);
			$insert_id = $this->db->insert_id();
			$this->db->trans_complete();
			return  true;
		} else {
			return false;
		}
	}
	
	
	function Delete($id)
	{
		$this->db->where('id_descuento', $id);
		$this->db->delete($table);
	}
	
	
}