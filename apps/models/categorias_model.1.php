<?php

class Categorias_Model extends CI_Model {

    protected $table = 'in_categoria_prod';
     protected $subtable = 'in_sub_categoria_prod';

    function __construct() {
        
        parent::__construct();
        
    }
    
    
    // recupera las categorias
    function ListarCategoriasById($idCategoria) {
        
        $this->db
            ->select('id_categoria,glosa_categoria,estado')
            ->from($this->table)
            ->where('id_categoria', $idCategoria); 
            $query = $this->db->get();
            return $query->result();
       
       
    }
    
    function ListarCategorias() {
		 $this->db
            ->select('id_categoria,glosa_categoria,estado')
            ->from($this->table);
            $query = $this->db->get();
            return $query->result();
        }
    
    function catToMenu(){
        $htm="";
        $data=$this->ListarCategorias();
        
        foreach ($data as $row)
        {
   	        $htm.='
                <li class="has-sub">
                    <a title="" href="javascript:;">'
                    .strtoupper($row->glosa_categoria).
                    '</a>
                    <ul>'.$this->subCatMenu($row->id_categoria).'</ul>
                </li>';
    					
            
           
        }
        
         return $htm;
        
    }
    
    
    function InsertarNuevaCategoria($data=null){
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
   
   function ActualizarCategoria($data=null){
	   if (is_array($data)) {
		   
  		    $this->db->where('id_categoria', $data['id_categoria']);
			$this->db->update($this->table, $data);
			return true;
	   
	   } else {
		 	return false;
	   }
	   
   }
    

  function Activar($id= null,$estado= null){
		
	  if ($id>0 ){
		   
           $data = array(
               'estado' => $estado==1? 0 : 1,
            );

			$this->db->where('id_categoria', $id);
			$this->db->update($this->table, $data); 
 	       
	   }	
		
  }

    
   /**********************************************
   
   SUB CATEGORIAS
   ***********************************************/
   
	
	 function ListarSubCategorias() {
        
       $this->db
            ->select('in_sub_categoria_prod.id_sub_categoria,
                        in_sub_categoria_prod.id_categoria,
                        in_sub_categoria_prod.glosa_sub_categoria,
                        in_sub_categoria_prod.estado,
                        in_categoria_prod.glosa_categoria
                        ')
            ->join('in_categoria_prod', 'in_sub_categoria_prod.id_categoria=in_categoria_prod.id_categoria')
            ->from($this->subtable);
           
       $query = $this->db->get();
       return $query->result();
       
       
    }

    function ListarSubCategoriasByCategorias($idCategoria) {
        
       $this->db
            ->select('id_sub_categoria,id_categoria,glosa_sub_categoria')
            ->from($this->subtable)
            ->where('id_categoria', $idCategoria);
       $query = $this->db->get();
       return $query->result();
       
       
    }

    
    function ListarSubCategoriasById($IdSubCategoria) {
        
    	$this->db
    	->select('id_sub_categoria,id_categoria,glosa_sub_categoria,estado')
    	->from($this->subtable)
    	->where('id_sub_categoria', $IdSubCategoria);
    	$query = $this->db->get();
    	return $query->result();
    	 
    	 
    }
    
    
   
     function subCatMenu($idCategoria){
        
        $htm="";
        $data=$this->ListarSubCategoriasByCategorias($idCategoria);
        
        foreach ($data as $row)
        {
            
                 $htm.= '
                   <li class="has-sub">
                   <a title="'. str_replace(' ','-',strtolower($row->glosa_sub_categoria)).'" href="'. BASE_URL .'catalogo/desplegar/'.str_replace(' ','-',strtolower($row->glosa_sub_categoria)).'">
                   '.strtoupper($row->glosa_sub_categoria).'</a>
                   </li>
        		  ';
                           
           
        }
        
     
        
        
       return $htm;
    }
    
    
	
	
    function InsertarNuevaSubCategoria($data=null){
    	if (is_array($data)) {
    		$this->db->trans_start();
    		$this->db->insert($this->subtable,$data);
    		$insert_id = $this->db->insert_id();
    		$this->db->trans_complete();
    		return  true;
    	} else {
    		return false;
    	}
    
    }
     
    function ActualizarSubCategoria($data=null){
    	if (is_array($data)) {
    		 
    		$this->db->where('id_sub_categoria', $data['id_sub_categoria']);
    		$this->db->update($this->subtable, $data);
    		return true;
    
    	} else {
    		return false;
    	}
    
    }
    
    
    function ActivarSub($id= null,$estado= null){
    
    	if ($id>0 ){
    		 
    		$data = array(
    				'estado' => $estado==1? 0 : 1,
    		);
    
    		$this->db->where('id_sub_categoria', $id);
    		$this->db->update($this->subtable, $data);
    		 
    	}
    
    } 
    
    
    
}