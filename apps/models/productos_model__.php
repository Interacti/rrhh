<?php

class Productos_Model extends CI_Model{
    
   protected $table = 'in_producto';
   
   
   function __construct() {
       parent::__construct();
   }
   
   
   function ListarProductos(){
	   
	   
	    $this->db
            ->select('	in_sub_categoria_prod.id_sub_categoria, 
						in_sub_categoria_prod.glosa_sub_categoria, 
						in_producto.producto, 
						in_producto.marca, 
						in_producto.valor_en_puntos, 
						in_producto.nombre_thumb, 
						in_producto.codigo_antiguo, 
						in_producto.id_producto,
                        in_producto.stock,
						in_producto.flag_destacado,
						in_producto.flag_estado ')
            ->from($this->table)
            ->join('in_sub_categoria_prod', 'in_producto.id_sub_categoria = in_sub_categoria_prod.id_sub_categoria');
            
       		$query = $this->db->get();
       		return $query->result();
    
   
   
   }
   
   
   
   function InsertarNuevoproducto($data=null){
	   if (is_array($data)) {
	   	$this->db->trans_start();
	  		 $this->db->insert('in_producto',$data);
	   		 $insert_id = $this->db->insert_id();
	         $this->db->trans_complete();
	         return  true; 
	   } else {
		 	return false;
	   }
	   
   }
   
   function ActualizarProducto($data=null){
	   if (is_array($data)) {
		   
  		    $this->db->where('id_producto', $data['id_producto']);
			$this->db->update($this->table, $data);
			return true;
	   
	   } else {
		 	return false;
	   }
	   
   }
   
   
   
   
   
   function getProductosPorSubcategoria($sCat){
       
       $st="in_producto.stock>0";
    
        $this->db
            ->select('	in_sub_categoria_prod.id_sub_categoria, 
						in_sub_categoria_prod.glosa_sub_categoria, 
						in_producto.producto, 
                        in_producto.productourl,
						in_producto.marca, 
						in_producto.valor_en_puntos, 
						in_producto.nombre_thumb, 
						in_producto.codigo_antiguo, 
						in_producto.id_producto,
            			in_producto.stock
            		')
            ->from($this->table)
            ->join('in_sub_categoria_prod', 'in_producto.id_sub_categoria = in_sub_categoria_prod.id_sub_categoria')
            ->where("LOWER( REPLACE ( in_sub_categoria_prod.glosa_sub_categoria, ' ', '-' ))=", $sCat)
			->where("in_producto.flag_estado","1")
			->where($st, NULL, FALSE);
            
                
            
       $query = $this->db->get();
       //echo $this->db->last_query();
       return $query->result();
    
    
   }
   
   
   
   function getProductosPorNombre($sNombre){
    
        $this->db
            ->select('	in_sub_categoria_prod.id_sub_categoria, 
						in_sub_categoria_prod.glosa_sub_categoria, 
						in_producto.producto, 
						in_producto.marca, 
						in_producto.valor_en_puntos, 
						in_producto.nombre_imagen, 
						in_producto.codigo_antiguo, 
						in_producto.id_producto,
						in_producto.descripcion,
            			in_producto.stock,
                        in_producto.productourl
						 ')
            ->from($this->table)
            ->join('in_sub_categoria_prod', 'in_producto.id_sub_categoria = in_sub_categoria_prod.id_sub_categoria')
            ->where("LOWER( REPLACE ( TRIM(in_producto.productourl), ' ', '-' ))=", $sNombre);
            
            
       $query = $this->db->get();
       return $query->result();
    
    
	
	
   }
   
  
   
   
   function getProductosPorId($id){
    
        $this->db
            ->select('	in_producto.id_producto,
						in_producto.id_sub_categoria,
						in_producto.valor_en_puntos,
						in_producto.producto,
						in_producto.marca,
						in_producto.descripcion,
						in_producto.nombre_thumb,
						in_producto.nombre_imagen,
						in_producto.codigo_antiguo,
						in_producto.proveedor,
						in_producto.flag_destacado,
						in_producto.flag_estado,
						in_producto.fecha_creacion,
                        in_producto.id_proveedor,
            			in_producto.stock
						')
            ->from($this->table)
            ->where("in_producto.id_producto", $id);
            
            
       $query = $this->db->get();
       return $query->result();
    
    
	
	
   }
   
   
   function StockProducto($id=null){
    
       $this->db
            ->select('in_producto.producto,in_producto.stock')
            ->from($this->table)
            ->where("in_producto.id_producto", $id);
            
       $query = $this->db->get();
       return $query->result();
    
   }
   
   
   
   
      function getProductosPorPuntos($sPuntos){
		  $rango=explode('-',$sPuntos);
		  if ($rango[1]=="MAS" ){
			  $rango[1]='99999999';
			}
		  
    
        $this->db
            ->select('	in_sub_categoria_prod.id_sub_categoria, 
						in_sub_categoria_prod.glosa_sub_categoria, 
						in_producto.producto, 
						in_producto.marca, 
						in_producto.valor_en_puntos, 
						in_producto.nombre_imagen, 
						in_producto.codigo_antiguo, 
						in_producto.id_producto,
						in_producto.nombre_thumb,
						in_producto.stock,
                        in_producto.productourl,
                       	in_producto.flag_estado  ')
            ->from($this->table)
            ->join('in_sub_categoria_prod', 'in_producto.id_sub_categoria = in_sub_categoria_prod.id_sub_categoria')
            ->where("valor_en_puntos >=",(int)$rango[0])
			->where("valor_en_puntos <=",(int)$rango[1])
            ->where("flag_estado",1)
            ->where("stock >=",1)
			->order_by("valor_en_puntos","asc");
            
            
       $query = $this->db->get();
       //echo $this->db->last_query();
       return $query->result();
    
    
	
	
   }
   
   
    function getProductosDestacados(){
         $st="in_producto.stock>0";
	       $this->db
          ->select('	in_sub_categoria_prod.id_sub_categoria, 
						in_sub_categoria_prod.glosa_sub_categoria, 
						in_producto.producto, 
						in_producto.marca, 
						in_producto.valor_en_puntos, 
						in_producto.nombre_imagen, 
						in_producto.codigo_antiguo, 
						in_producto.id_producto,
						in_producto.nombre_thumb,  ')
            ->from('in_producto')
            ->join('in_sub_categoria_prod', 'in_producto.id_sub_categoria = in_sub_categoria_prod.id_sub_categoria')
            ->where('in_producto.flag_destacado','1')
			 ->where('in_producto.flag_estado','1')
			 ->where($st, NULL, FALSE)
            ->order_by("valor_en_puntos","asc")
            ->limit(9);
            
       $query = $this->db->get();
       echo $this->db->last_query();
       return $query->result();
  
   }


	function ActivarDesactivar($id= null,$estado= null){
		
	  if ($id>0 ){
		   
           $data = array(
               'flag_estado' => $estado==1? 0 : 1,
            );

			$this->db->where('id_producto', $id);
			$this->db->update($this->table, $data); 
 	       
	   }	
		
  }


  function OnOffDestacar($id= null,$estado= null){
		
	  if ($id>0 ){
		   
           $data = array(
               'flag_destacado' => $estado==1? 0 : 1,
            );

			$this->db->where('id_producto', $id);
			$this->db->update($this->table, $data); 
 	       
	   }	
		
  }
  
   function getProveedores(){
    
	  $this->db
            ->select('*')
            ->from('in_proveedor')
            ->where("estado", 1); 
            $query = $this->db->get();
            return $query->result();
        
     
   }
   
}