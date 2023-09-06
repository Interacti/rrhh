<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('categoryTree')){
    function categoryTree($parent_id = 0, $sub_mark = '' ,$selected='0'){
        $ci =& get_instance();
        $ci->db
        ->select('  category_id,
                    category_name,
                    category_status,
                    category_friendly_name'
                )
        ->from('category')
        ->where('category_status', 1)
        ->where('category_parent_id', $parent_id); 
        $query = $ci->db->get();
        $data=$query->result();
        if ($query->num_rows()){
            foreach($data as $dt){
                if ($dt->category_id==$selected){
                    echo "<option selected value='{$dt->category_id}'>{$sub_mark}{$dt->category_name}</option>";
                }else{
                    echo "<option value='{$dt->category_id}'>{$sub_mark}{$dt->category_name}</option>";
                }
                categoryTree( $dt->category_id, $sub_mark.'---',$selected);
            }
        }
   }
}




if (!function_exists('getCategoryName')){
    function getCategoryName($category){
        $ci =& get_instance();
        $ci->db
        ->select('category_name')
        ->from('category')
        ->where('category_status', 1)
        ->where('category_id', $category); 
        $query = $ci->db->get();
        $data=$query->result();
        $subcats=array();
        if (count($data)>0){
            return $data[0]->category_name;
        }
    }
}



?>