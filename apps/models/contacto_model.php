<?php

class  Contacto_Model extends CI_Model {
	

	
	protected $table = 'in_contacto';
	
	
	function __construct() {
		parent::__construct();
	}
	
	
	
	function AgregarContacto($data){
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
	
	
}


