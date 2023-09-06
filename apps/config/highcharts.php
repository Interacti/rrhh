<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// shared_options : highcharts global settings, like interface or language
$config['shared_options'] = array(
        'lang'=>array(
           'decimalPoint'=>',',
           'thousandsSep'=>'.' 
        ),
        'chart' => array(
                'backgroundColor' => array(
                        'linearGradient' => array(0, 0, 500, 500),
                        'stops' => array(
                                array(0, 'rgb(255, 255, 255)'),
                                array(1, 'rgb(240, 240, 255)')
                        )
                ),
                
                'shadow' => true
        ),
         "xAxis"=>array(
                'type'=> 'category',
                'labels'=>array(
                    'rotation'=> -25,
                    'style'=>array(
                        'fontSize'=> '10px',
                        'fontFamily'=> 'Arial, sans-serif'
                    )
                )
            )
        
);

