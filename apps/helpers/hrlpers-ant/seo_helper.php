<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if(!function_exists('seo'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function seo($palabra)
    {
        $palabra=strtolower($palabra);
    
        $word=str_replace('á','a',strtolower($palabra));
        $word=str_replace('é','e',$word);
        $word=str_replace('í','i',$word);
        $word=str_replace('ó','o',$word);
        $word=str_replace('ú','u',$word);
        $word=str_replace('ñ','n',$word);
        $word=str_replace('Á','A',$word);
        $word=str_replace('É','E',$word);
        $word=str_replace('Í','I',$word);
        $word=str_replace('Ó','O',$word);
        $word=str_replace('Ú','U',$word);
        $word=str_replace('Ñ','N',$word);
        return strtolower(str_replace(' ','-',$word));
 
    }
}

//end app