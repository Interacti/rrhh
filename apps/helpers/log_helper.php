<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if(!function_exists('InsertLogApp')){
    function InsertLogApp($data=null){
      if (!is_null($data)){
          if (is_array($data)){
              $ci=& get_instance();
              $ci->db->trans_start();
              $ci->db->insert('in_syslog',$data);
              $ci->db->trans_complete();

          }
      }
    }
}
 