<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class perfil_Model extends CI_Model {
	protected $table = 'in_perfil';
	function __construct() {
		parent::__construct ();
	}
	function getPerfiles() {
		$this->db->select ( ' * ' )->from ( 'in_perfil' )->order_by ( "id_perfil", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	
        function getPerfilesActivos(){
            	$this->db->select ( ' * ' )->from ( 'in_perfil' )->where('estado',1)->order_by ( "id_perfil", "desc" );
		$query = $this->db->get ();
		return $query->result ();
        }
        
        
	function getPerfilById($id) {
		if (is_numeric($id)){
		$this->db->select ( ' * ' )->from ( 'in_perfil' )->where('id_perfil',$id)->order_by ( "id_perfil", "desc" );
		$query = $this->db->get ();
		return $query->result ();
		}else{} 
			
	}
	
	
	function GuardarPerfil($data) {
		if (is_array ( $data )) {
			$this->db->trans_start ();
			$this->db->insert ( $this->table, $data );
			$insert_id = $this->db->insert_id ();
			$this->db->trans_complete ();
			return true;
		} else {
			return false;
		}
	}
	function ActualizarPerfil($data = null) {
		if (is_array ( $data )) {
			$this->db->where ( 'id_perfil', $data ['id_perfil'] );
			$this->db->update ( $this->table, $data );
			return true;
		} else {
			return false;
		}
	}
}

