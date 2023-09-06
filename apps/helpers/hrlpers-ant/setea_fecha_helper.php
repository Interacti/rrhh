<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if(!function_exists('setea_fecha'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function setea_fecha($fecha)
    {
 
        $day=substr($fecha,8,2);
        $month=substr($fecha,5,2);
        $year=substr($fecha,0,4);
        //$hour = substr($fecha,11,5);
        $datetime_format=$day."-".$month."-".$year;
        return $datetime_format;
 
    }
}

//end application/helpers/ayuda_helper.php