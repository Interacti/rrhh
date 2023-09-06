<?php

if (!function_exists('have_parent')) {

    function have_parent($root_id) {
        $ci = & get_instance();
        $ci->load->model('beneficios_model', 'beneficios');
        $con['returnType'] = 'count';
        $con['conditions'] = array(
            'category' => $root_id,
        );
        $rows = $ci->beneficios->getRows($con);
        return $rows > 0 ? TRUE : FALSE;
    }

}

if (!function_exists('MonthNameCL')) {
    function MonthNameCL($month_number) {
 
        $month[1]="Enero";
        $month[2]="Febrero";
        $month[3]="Marzo";
        $month[4]="Abril";
        $month[5]="Mayo";
        $month[6]="Junio";
        $month[7]="Julio";
        $month[8]="Agosto";
        $month[9]="Septiembre";
        $month[10]="Octubre";
        $month[11]="Noviembre";
        $month[12]="Diciembre";
        return $month[$month_number];
        
    }
}
?> 
