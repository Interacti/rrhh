<?php
class Usuarios_model extends CI_Model {
	protected $table = 'in_usuarios';
	function __construct() {
		parent::__construct ();
	}
	
	// recupera las categorias
	function ListarUsuarios() {
            
            $this->db
            ->select('	in_usuarios.id,
                        in_usuarios.nombre,
                        in_usuarios.apellido,
                        in_usuarios.email,
                        in_usuarios.username,
                        in_usuarios.`password`,
                        in_usuarios.perfil,
                        in_usuarios.estatus,
                        in_usuarios.fecha,
                        in_usuarios.user_add,
                        in_usuarios.userpass,
                        in_perfil.descripcion ')
            ->from($this->table)
            ->join('in_perfil', 'in_usuarios.perfil = in_perfil.id_perfil');
            
       		$query = $this->db->get();
       		return $query->result();
            
            
            
            
            
		$this->db->select ( '*' )->from ( $this->table )->where ( 'id', $id );
                
                        
		return $query->result ();
	}
	
	// obtiene un usuario por su id
	function getUserById($id) {
		$this->db->select ( '*' )->from ( $this->table )->where ( 'id', $id );
		$query = $this->db->get ();
		return $query->result ();
	}
	function AddUser($data) {
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
	
	
	
	function UpdateUser($data = null) {
		if (is_array ( $data )) {
			$this->db->where ( 'id', $data ['id'] );
			$this->db->update ( $this->table, $data );
			return true;
		} else {
			return false;
		}
	}
	
	
	
	function DeleteUser($id) {

		$this->db->where('id', $id);
		$this->db->delete($this->table); 

	}
	
	
	function ActivarDesactivar($id = null, $estado = null) {
		if ($id > 0) {
			$data = array (
					'estatus' => $estado == 1 ? 0 : 1 
			);
			$this->db->where ( 'id', $id );
			$this->db->update ( $this->table, $data );
		}
	}
        
        
        function getModulos(){
            $arr="";
            $this->db->select ( '*' )
                    ->from ( 'in_modulo' )
                    ->where ( 'id_parent <> ', 0 )
                    ->where('estado',1)
                    ->order_by('id_modulo') ;
	    $query = $this->db->get ();
	    return $query->result();
        }
        
        
        
        

        function getSubModulos($id_padre){
         $arr="";
         $this->db->select ( '*' )->from ( 'in_modulo' )->where ( 'id_parent', $id_padre );
	     $query = $this->db->get ();
	     foreach ($query->result() as $md){
                $arr[$md->descripcion]=$md->descripcion;
         };
            
            return $arr;
        }
        
        
        
        function Modular(){
            
             $this->db->select ( '*' )
                    ->from ( 'in_modulo' )
                    ->where ( 'id_parent', 0 )
                    ->where('estado',1)
                    ->order_by('id_modulo') ;
	    $query = $this->db->get ();
	    //print_r($query->result());
            
        foreach($query->result() as $modulo){
            
            $arr[$modulo->descripcion]=$this->getSubModular($modulo->id_modulo);
        }    
           /* print_r($arr);
            echo "<ul>";
         foreach($arr as $key => $value){
            
            echo "<li>" . $key;
            echo "<ul>";
            foreach($value as $k => $v){
                echo '<li>',$k .'</li>';
            }
            echo "</ul>";
            echo "</li>";
         }   
            echo "</ul>";*/
            
            return $arr;
            
        }
        
        function getSubModular($id_padre){
         $arr="";
         $this->db->select ( '*' )->from ( 'in_modulo' )->where ( 'id_parent', $id_padre );
	     $query = $this->db->get ();
	     foreach ($query->result() as $md){
                $arr[$md->descripcion]=$md->id_modulo;
         };
            
            return $arr;
        }
        
        
        
        
        function UserData($data) {
        	$data = (object) $data;
        	$this->db
        	->select('in_usuarios.id, in_usuarios.username,in_usuarios.nombre,in_usuarios.apellido,in_usuarios.perfil,in_usuarios.estatus,in_perfil.descripcion')
        	->from($this->table)
        	->join('in_perfil', 'in_usuarios.perfil = in_perfil.id_perfil')
        	->where('username', $data->username)
        	->where('userpass', $data->userpass);
        
        	$query = $this->db->get();
        	return $query->result();
        
        }
        
        function isUser($data) {
        
        	$data = (object) $data;
        	$this->db
        	->select('count(*) total')
        	->from($this->table)
        	->where('username', $data->username)
        	->where('userpass', $data->userpass)
        	->where('estatus',   '1');
        	$query = $this->db->get();
        	$row=$query->result();
        	 
        	if ($row[0]->total > 0) {
        		return true;
        	} else {
        		return false;
        	}
        }
        
        
        
}