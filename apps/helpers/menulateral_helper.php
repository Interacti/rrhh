<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('MenuLateral'))
{
    function MenuLateral()
    {
	        $htm="";		
            $ci =& get_instance();
	        $ci->db
            ->select('id_categoria,glosa_categoria,icono,estado')
            ->from('in_categoria_prod')
            ->where('estado', 1); 
            $query = $ci->db->get();
       		$data=$query->result();
            foreach ($data as $row)
            {
       	        $htm.='
                    <li class="desplegable">
                        <a title="" href="javascript:;" >'
                        .ucwords(strtolower($row->glosa_categoria)).' ('.CuentaProductosPorCategoria($row->id_categoria).')'.
                         
                        '<img class="hidden-xs" style="float:right" src="'.base_url().'assets/frontend/img/iconos/'.$row->icono.'"    /></a>
                        <ul>'.SubCategorias($row->id_categoria).'</ul>
                    </li>';
    	    }
    	    return $htm;
    }
}
 
 if(!function_exists('CuentaProductosPorCategoria')) {
    function CuentaProductosPorCategoria($idCategoria){
       
        
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
        {       $html="<ul>";
                $htm.= '
                   <li class="desplegable">
                   <a title="'. str_replace(' ','-',strtolower(strtolower($row->glosa_sub_categoria))).'" href="'. BASE_URL .'catalogo/desplegar/'.str_replace(' ','-',strtolower(quitar_tildes($row->glosa_sub_categoria))).'">
                   '.ucwords(strtolower($row->glosa_sub_categoria)).'</a>
                   </li>
        		  ';
                $html="</ul>";          		
		
        }	
	
	    		
     
        
        
       return $htm;
    } 
}


if(!function_exists('quitar_tildes')) {
function quitar_tildes($cadena) {
   
    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
    $permitidas=    array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
    $texto = str_replace($no_permitidas, $permitidas ,$cadena);
    return $texto;
       
    }
}
