<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('ProductosDesctacados'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function ProductosDesctacados()
    {
       $ci =& get_instance();
	   $ci->db
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
			 ->where("in_producto.stock >=",1)
            ->order_by("valor_en_puntos","asc")
            ->limit(9);
            
            
       $query = $ci->db->get();
       return $query->result();
    }
}
 