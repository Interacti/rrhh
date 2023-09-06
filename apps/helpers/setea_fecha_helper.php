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
if(!function_exists('setea_fecha_i'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
   function setea_fecha_i($fecha)
    {
 
        $day=substr($fecha,0,2);
        $month=substr($fecha,3,2);
        $year=substr($fecha,6,4);
        $datetime_format=$year."-".$month."-".$day;
        return $datetime_format;
 
    }
}






if(!function_exists('DiasHabiles'))
{
    
    
    function DiasHabiles($fechainicio, $fechafin) {
    $diasferiados=array(
        '2018-12-08',
        '2018-12-25',
        '2019-04-19',
        '2019-05-01',
        '2019-05-21',
        '2019-06-29',
        '2019-07-16',
        '2019-08-15',
        '2019-09-18',
        '2019-09-19',
        '2019-09-20',
        '2019-10-31',
        '2019-11-01',
        '2019-12-08',
        '2019-12-25',
        
        
        );

       $fechainicio=setea_fecha_i($fechainicio);
       $fechafin=setea_fecha_i($fechafin);

        // Convirtiendo en timestamp las fechas
        $fechainicio = strtotime($fechainicio);
        $fechafin = strtotime($fechafin);
       
        // Incremento en 1 dia
        $diainc = 24*60*60;
       
        // Arreglo de dias habiles, inicianlizacion
        $diashabiles = array();
       
        // Se recorre desde la fecha de inicio a la fecha fin, incrementando en 1 dia
        for ($midia = $fechainicio; $midia <= $fechafin; $midia += $diainc) {
                // Si el dia indicado, no es sabado o domingo es habil
                if (!in_array(date('N', $midia), array(6,7))) { // DOC: http://www.php.net/manual/es/function.date.php
                        // Si no es un dia feriado entonces es habil
                        if (!in_array(date('Y-m-d', $midia), $diasferiados)) {
                                array_push($diashabiles, date('Y-m-d', $midia));
                        }
                }
        }
       
        return count($diashabiles);
}
    
    
    
    //formateamos la fecha y la hora, función de cesarcancino.com
    /*function DiasHabiles($fecha_inicial,$fecha_final)
    { 
        if (empty($fecha_inicial) || empty($fecha_final)){
            return 'e1';
        }        
        
        $newArray=array(); 
        list($dia,$mes,$year) = explode("/",$fecha_inicial);
        $ini = mktime(0, 0, 0, $mes , $dia, $year);
        list($diaf,$mesf,$yearf) = explode("/",$fecha_final);
        $fin = mktime(0, 0, 0, $mesf , $diaf, $yearf);
        $r = 0;
        //echo "<pre>";
        
        
        if ($ini>$fin){
            return 'e2';
        }
        
        while($ini != $fin)
        {
            $ini = mktime(0, 0, 0, $mes , $dia+$r, $year);
            $habil=getdate($ini);
            if ($habil['wday']>0 && $habil['wday']<6){
                $newArray[] =$ini; 
            }
            $r++;
        }
        return count($newArray)==0 ? 1 : count($newArray) ;
    }*/

}


function Evalua($arreglo)
{
$feriados        = array(
'1-1',  //  Año Nuevo (irrenunciable)
'10-4',  //  Viernes Santo (feriado religioso)
'11-4',  //  Sábado Santo (feriado religioso)
'1-5',  //  Día Nacional del Trabajo (irrenunciable)
'21-5',  //  Día de las Glorias Navales
'29-6',  //  San Pedro y San Pablo (feriado religioso)
'16-7',  //  Virgen del Carmen (feriado religioso)
'15-8',  //  Asunción de la Virgen (feriado religioso)
'18-9',  //  Día de la Independencia (irrenunciable)
'19-9',  //  Día de las Glorias del Ejército
'12-10',  //  Aniversario del Descubrimiento de América
'31-10',  //  Día Nacional de las Iglesias Evangélicas y Protestantes (feriado religioso)
'1-11',  //  Día de Todos los Santos (feriado religioso)
'8-12',  //  Inmaculada Concepción de la Virgen (feriado religioso)
'13-12',  //  elecciones presidencial y parlamentarias (puede que se traslade al domingo 13)
'25-12',  //  Natividad del Señor (feriado religioso) (irrenunciable)
);
$i=0;
$j= count($arreglo)-1;

echo $j;
echo "<pre>";
$dia_=0;
for($i=0;$i<=$j;$i++)
{
$dia = $arreglo[$i];

        $fecha = getdate($dia);
       
        print_r($fecha);
        
            $feriado = $fecha['mday']."-".$fecha['mon'];
                    if($fecha["wday"]==0 or $fecha["wday"]==6)
                    {
                        $dia_ ++;
                    }
                    elseif(in_array($feriado,$feriados))
                    {   
                            $dia_++;
                    }
}
$rlt =  $dia_;
return $rlt;
}


                    
//end application/helpers/ayuda_helper.php