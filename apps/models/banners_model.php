<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Banners_Model extends CI_Model {
	protected $table = 'in_banner';
	function __construct() {
		parent::__construct ();
	}
	
	// recupera los banners
	function getBanners() {
		$query = $this->db->get ( $this->table );
		return $query->result ();
	}
	function getBannersHome() {
		$this->db->select ( '*' )->from ( $this->table )->where ( "bnr_estado", '1' )->where('bnr_categoria','home')->order_by ( "bnr_posicion", "asc" );
		$query = $this->db->get ();
		return $query->result ();
	}
	
	// obtine una categoria especifica
	function getBannersById($id) {
		$this->db->select ( ' * ' )->from ( $this->table )->where ( 'id_banner', $id );
		$query = $this->db->get ();
		return $query->result ();
	}
	function getBannersByCategoria($slug) {
		$this->db->select ( ' * ' )->from ( $this->table )->where ( 'bnr_categoria', $slug );
		$query = $this->db->get ();
		return $query->result ();
	}
	// graba un banner
	function AgregarBanner($data) {
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
	
	// actualizar un banner
	function ActualizarBanner($data) {
		if (is_array ( $data )) {
			$this->db->trans_start (); 
			$this->db->where ( 'id_banner', $data ['id_banner'] );
			$this->db->update ( $this->table, $data );
			$this->db->trans_complete ();
			return true;
		} else {
			return false;
		}
	}
	
	
	//borrar banner
	function DeleteBanners() {
		
		
	
	}
	
	
	function Activar($id = null, $estado = null) {
		if ($id > 0) {
			$data = array (
					'bnr_estado' => $estado == 1 ? 0 : 1 
			);
			$this->db->where ( 'id_banner', $id );
			$this->db->update ( $this->table, $data );
		}
	}
}