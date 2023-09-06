<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('MenuLateral'))
{
    
    function MenuLateral()
    {
	   $htm="";		
       $ci =& get_instance();
	    $ci->db
            ->select('id_categoria,glosa_categoria,estado')
            ->from('in_categoria_prod')
            ->where('estado', 1); 
            $query = $ci->db->get();
       		$data=$query->result();
            
            
            
       foreach ($data as $row)
        {
   	        $htm.='
                <li class="has-sub">
                    <a title="" href="javascript:;">'
                    .ucfirst(strtolower($row->glosa_categoria)).' ('.CuentaProductosPorCategoria($row->id_categoria).')'.
                    '</a>
                    <ul>'.SubCategorias($row->id_categoria).'</ul>
                </li>';
    					
           
        }
	  
	  
	  return $htm;
      
    }
}
 
 if(!function_exists('CuentaProductosPorCategoria')) {
    function CuentaProductosPorCategoria($idCategoria){
        
        /*
SELECT
 count(in_producto.producto)
FROM
in_categoria_prod
INNER JOIN in_sub_categoria_prod ON in_categoria_prod.id_categoria = in_sub_categoria_prod.id_categoria
INNER JOIN in_producto ON in_sub_categoria_prod.id_sub_categoria = in_producto.id_sub_categoria
WHERE in_categoria_prod.id_categoria=2
and in_sub_categoria_prod.estado=1
and in_producto.flag_estado=1
        */
        
        
        
        
    $htm="";
		$ci =& get_instance();
	   	$ci->db
            ->select('count(in_producto.producto) total')
            ->from('in_categoria_prod')
            ->join('in_sub_categoria_prod','in_categoria_prod.id_categoria = in_sub_categoria_prod.id_categoria')
            ->join('in_producto','in_sub_categoria_prod.id_sub_categoria = in_producto.id_sub_categoria')
            ->where('in_categoria_prod.id_categoria', $idCategoria)
            ->where('in_sub_categoria_prod.estado', '1')
            ->where('in_producto.flag_estado', '1');
        $query = $ci->db->get();
        
        
        $total=$query->result();
	   	return $total[0]->total;
  }  
 }
 
 if(!function_exists('CuentaProductos')) {
    function CuentaProductos($idCategoria){
    $htm="";
		$ci =& get_instance();
	   	$ci->db
            ->select('count(*) total')
            ->from('in_sub_categoria_prod')
            ->where('id_categoria', $idCategoria)
            ->where('estado', '1');
        $query = $ci->db->get();
        $total=$query->result();
	   	return $total[0]->total;
  }  
 }
 
 
 
 
if(!function_exists('SubCategorias')) {

function SubCategorias($idCategoria){
        $htm="";
		$ci =& get_instance();
	   	$ci->db
            ->select('id_sub_categoria,id_categoria,glosa_sub_categoria')
            ->from('in_sub_categoria_prod')
            ->where('id_categoria', $idCategoria)
            ->where('estado', '1')
	   	
	   	;
       $query = $ci->db->get();
        
		 
		 
        foreach ($query->result() as $row)
        {
                $htm.= '
                   <li class="has-sub">
                   <a title="'. str_replace(' ','-',strtolower(str_replace('ñ','n',strtolower($row->glosa_sub_categoria)))).'" href="'. BASE_URL .'catalogo/desplegar/'.str_replace(' ','-',str_replace('ñ','n',strtolower($row->glosa_sub_categoria))).'">
                   '.ucfirst(strtolower($row->glosa_sub_categoria)).'</a>
                   </li>
        		  ';
                           
           
        }
        
     
        
        
       return $htm;
    } 
}