<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Sucursal_Model extends  CI_Model {
	
	protected $table = 'in_sucursal';
	
	function __construct(){
		
		parent::__construct();
		
	}
    
    
    
    function getSucursales(){
        
            $this->db
		    ->select(' * ')
		    ->from($this->table);
           
		    $query = $this->db->get();
		    return $query->result();
    }
    
    
	
	
 }