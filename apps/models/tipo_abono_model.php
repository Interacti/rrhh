<?php
class  Tipo_Abono_Model extends  CI_Model {
	
	protected $table = 'in_tipo_abono';
	
	function __construct(){
		
		parent::__construct();
		
	}
	
	
	
	function GetTipoAbonos(){
		
		
		$this->db
		->select('*')
		->from($this->table)
		->where('tipo_transac' ,1);
		$query = $this->db->get();
		return $query->result();
	}
	
	function GetTipoDescuentos(){
	
	
		$this->db
		->select('*')
		->from($this->table)
		->where('tipo_transac' ,2);
		$query = $this->db->get();
		return $query->result();
	}
	
	
	function  getTipoFormalizacion(){
		$this->db
		->select('*')
		->from($this->table)
		->where('id_tipo_abono' ,4);
		$query = $this->db->get();
		return $query->result();
		
		
		
	}
	
}