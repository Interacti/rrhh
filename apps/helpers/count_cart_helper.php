<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('calculaItemsEnCarro'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function calculaItemsEnCarro()
    {
  		 $ci =& get_instance();
		 if ($carrito = $ci->cart->contents()){
			 
		   	 		$num_items=0;
                    foreach ($carrito as $item) {
					  $num_items+=$item['qty'];
					}
		 
		 }
		 
		 
        
        return isset($num_items) ? $num_items : 0;
    }
}
 
if(!function_exists('calculaPuntosEnCarro'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function calculaPuntosEnCarro()
    {
  		 $ci =& get_instance();
		 if ($carrito = $ci->cart->contents()){
			 
		   	 		$puntos_items=0;
                    foreach ($carrito as $item) {
					  $puntos_items+=$item['price'];
					}
		 
		 }
		 
		 
        
        return isset($puntos_items) ? $puntos_items : 0;
    }
}
 
//end application/helpers/ayuda_helper.php