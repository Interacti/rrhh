<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Abono_Model extends CI_Model {
	protected $table = 'in_abono';
	function __construct() {
		parent::__construct ();
	}
	function getAbonosSocios() {
		$this->db->select ( ' * ' )->from ( 'vw_abonos_socios' )->order_by ( "fecha", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	function GuardarAbono($data) {
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
	function getAbonoGerente($id) {
		$this->db->select ( ' * ' )->from ( 'vw_abonos_socios' )->where ( 'id_gerente', $id )->where ( 'MONTH(fecha)=MONTH(NOW())' )->where ( 'YEAR(fecha)=YEAR(NOW())' )->where ( 'tipo_abono', 6 )->order_by ( "fecha", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	function getAbonoTeleventas() {
		$this->db->select ( ' * ' )->from ( 'vw_abonos_socios' )->where ( 'tipo_abono', 18 )->order_by ( "fecha", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	function EliminarAbono($id) {
		$this->db->where ( 'id_abono', $id );
		$this->db->delete ( $this->table );
		return true;
	}
	function getFormalizaciones() {
		$this->db->select ( ' * ' )->from ( 'in_formalizacion' )->order_by ( "fecha", "desc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	function getDetalleFormalizacionAgentes($id) {
		$this->db->select ( ' * ' )->from ( 'detalleformalizaciones' )->where ( 'codoper', $id )->where_in ( 'tabla', array (
				'IND-24',
				'IND+24',
				'PF-24',
				'PF+24' 
		) );
		$query = $this->db->get ();
		return $query->result ();
	}
	function getDetalleFormalizacionSupervisores($id) {
		$this->db->select ( ' * ' )->from ( 'detalleformalizaciones' )->where ( 'codoper', $id )->where_in ( 'tabla', array (
				'SUP-PF',
				'SUP-IND' 
		) );
		$query = $this->db->get ();
		return $query->result ();
	}
	function getFormalizacionById($id) {
		if (is_numeric ( $id )) {
			$this->db->select ( ' * ' )->from ( 'in_formalizacion' )->where ( 'id', $id );
			$query = $this->db->get ();
			return $query->result ();
		} else {
			
			return false;
		}
	}
	function GuardarFormalizacion($data) {
		if (is_array ( $data )) {
			$this->db->trans_start ();
			$this->db->insert ( 'in_formalizacion', $data );
			$insert_id = $this->db->insert_id ();
			$this->db->trans_complete ();
			return $insert_id;
		} else {
			return false;
		}
	}
	
	function ActualizarFormalizacionCalculada($id_formalizacion){
		//$this->db->where()
		
		
	}
	
}
