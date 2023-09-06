<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('getSocioPorRut')) {
    function getSocioPorRut($rut) {
        $ci = & get_instance();
        //Obtengo Los Puntos del Gerente
        $ci->db
                ->select('nombre, apellido ')
                ->from('in_socio')
                ->where('rutdv', $rut);
        $query  = $ci->db->get();
        $return = $query->result();
        
    
        
        return $return[0]->nombre .' '. $return[0]->apellido ;
    }

}





  