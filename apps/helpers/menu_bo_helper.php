<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
	
	// si no existe la función invierte_date_time la creamos
if (! function_exists ( 'Menu_bo' )) {
	function Menu_bo($id_perfil) {
		$li = "";
		$mad = "";
		$htm = "";
		$ci = & get_instance ();
		$ci->db->select ( '*' )->from ( 'in_perfil' )->where ( 'estado', 1 )->where ( "id_perfil", $id_perfil );
		$query = $ci->db->get ();
		$row = $query->result ();
		$modulos = explode ( '|', $row [0]->modulos );
		
		$htm = "";
		$ci = & get_instance ();
		$ci->db->select ( '*' )->from ( 'in_modulo' )->where ( 'estado', 1 )->where ( "id_parent", 0 );
		$query = $ci->db->get ();
		
		foreach ( $query->result () as $mdo ) {
			if (TieneModulos ( $mdo->id_modulo, $modulos )) {
				
				$mad = "";
				$htm = "";
				$ci = & get_instance ();
				$ci->db->select ( '*' )->from ( 'in_modulo' )->where ( 'estado', 1 )->where ( "id_parent", $mdo->id_modulo );
				$querySM = $ci->db->get ();
				
				$li .= '<li class="dropdown">';
				$li .= '<a data-toggle="dropdown" class="dropdown-toggle" href="#">' . $mdo->descripcion . '&nbsp;&nbsp;&nbsp;&nbsp;<b class="caret"></b></a>';
				$li .= '<ul class="dropdown-menu">';
				
				foreach ( $querySM->result () as $mdos ) {
					
					if (in_array ( $mdos->id_modulo, $modulos )) {
						// $mad [] = $mdos->descripcion;
						$li .= '<li><a href="' . BASE_URL . $mdos->url . '">' . $mdos->descripcion . '</a></li>';
					} else {
						
						$li .= '<li><a href="javascript:;">' . $mdos->descripcion . '</a></li>';
					}
				}
				
				$li .= '</ul>';
				$li .= '</li>';
				/*
				 * if (count ( $mad ) > 0) { $madi [$mdo->descripcion] = $mad; }
				 */
			}
		}
		
		return $li;
	}
	
	if (! function_exists ( 'TieneModulos' )) {
		function TieneModulos($id, $modulos) {
			$mad = "";
			$htm = "";
			$ci = & get_instance ();
			$ci->db->select ( '*' )->from ( 'in_modulo' )->where ( 'estado', 1 )->where ( "id_parent", $id );
			$querySM = $ci->db->get ();
			foreach ( $querySM->result () as $mdos ) {
				
				if (in_array ( $mdos->id_modulo, $modulos )) {
					return true;
				} else {
					return false;
				}
			}
		}
	}
}   
    
    
    
 

