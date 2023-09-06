<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//si no existe la función invierte_date_time la creamos
if (!function_exists('MenuLateralCaren')) {

    function MenuLateralCaren() {
        $htm = "";
        $ci = & get_instance();
        $ci->db
                ->select('id_categoria,glosa_categoria,color,estado')
                ->from('in_categoria_temas')
                ->where('estado', 1);
        $query = $ci->db->get();
        $data = $query->result();
        foreach ($data as $row) {
            $htm .= '
                    <li class="li" style="background:' . $row->color . ';color:#fff" >' . strtoupper($row->glosa_categoria) . '' . '
                        ' . SubCategoriasCaren($row->id_categoria) . '
                    </li>';
        }
        return $htm;
    }

}





if (!function_exists('SubCategoriasCaren')) {

    function SubCategoriasCaren($idCategoria) {
        $htm = "";
        $ci = & get_instance();
        $ci->db
            ->select('
                in_sub_categoria_temas.id_sub_categoria,
                in_sub_categoria_temas.id_categoria,
                in_sub_categoria_temas.glosa_sub_categoria,
                in_categoria_temas.glosa_categoria,
                in_sub_categoria_temas.url
            ')
            ->from('in_sub_categoria_temas')
            ->join('in_categoria_temas', 'in_categoria_temas.id_categoria=in_sub_categoria_temas.id_categoria')
            ->where('in_sub_categoria_temas.id_categoria', $idCategoria)
            ->where('in_sub_categoria_temas.estado', '1')
            ->order_by('in_sub_categoria_temas.orden', 'asc');
        $query = $ci->db->get();
        foreach ($query->result() as $row) {
            /*$html = "<ul>";
            $htm .= '
                   <li >
                   <a title="' . str_replace(' ', '-', strtolower(strtolower($row->glosa_sub_categoria))) . '" href="' . BASE_URL . 'temas/' . str_replace(' ', '-', strtolower(quitar_tildes($row->glosa_categoria))) . '/' . str_replace(' ', '-', strtolower(quitar_tildes($row->glosa_sub_categoria))) . '">
                   ' . $row->glosa_sub_categoria . '</a>
                   </li>
        		  ';
            $html = "</ul>";*/
            $html="<ul>";
                
               if(strtolower($row->glosa_sub_categoria)==strtolower("promociones caren")){
$htm.= '
                   <li >
                   <a title="'. str_replace(' ','-',strtolower(strtolower($row->glosa_sub_categoria))).'" href="https://promociones.caren.cl/" target="_blank">
                   '.$row->glosa_sub_categoria.'</a>
                   </li>  ';


		}else{
                $htm.= '
                   <li >
                   <a title="'. str_replace(' ','-',strtolower(strtolower($row->glosa_sub_categoria))).'" href="'. BASE_URL .$row->url.'">
                   '.$row->glosa_sub_categoria.'</a>
                   </li>
        		  ';

}
                
                $html="</ul>";     
        }
        return $htm;
    }

}



if (!function_exists('SelectCategorias')) {

    function SelectCategorias($selected = "") {



        $htm = "";
        $ci = & get_instance();
        $ci->db
                ->select('id_categoria,glosa_categoria,color,estado')
                ->from('in_categoria_temas')
                ->where('estado', 1);
        $query = $ci->db->get();
        $data = $query->result();
        foreach ($data as $row) {



            // $htm.="<optgroup value ='".$row->id_categoria."'>".$row->glosa_categoria."</option>";
            $htm .= "<optgroup id='" . $row->glosa_categoria . "' label='" . $row->glosa_categoria . "'>";
            $htm .= SelectSubCategorias($row->id_categoria, $selected);
            $htm .= "</optgroup>";
        }
        return $htm;
    }

}

function SelectSubCategorias($idCategoria, $selected = "") {

    $htm = "";
    $ci = & get_instance();
    $ci->db
            ->select('
        in_sub_categoria_temas.id_sub_categoria,
        in_sub_categoria_temas.id_categoria,
        in_sub_categoria_temas.glosa_sub_categoria,
        in_categoria_temas.glosa_categoria
            ')
            ->from('in_sub_categoria_temas')
            ->join('in_categoria_temas', 'in_categoria_temas.id_categoria=in_sub_categoria_temas.id_categoria')
            ->where('in_sub_categoria_temas.id_categoria', $idCategoria)
            ->where('in_sub_categoria_temas.estado', '1')
            ->order_by('in_sub_categoria_temas.id_sub_categoria', 'asc');

    $query = $ci->db->get();
    echo $ci->db->last_query();
    foreach ($query->result() as $row) {
        if ($selected == $row->id_sub_categoria) {
            $htm .= "<option value='" . $row->id_sub_categoria . "' selected > -->" . $row->glosa_sub_categoria . "</option>";
        } else {
            $htm .= "<option value='" . $row->id_sub_categoria . "' > -->" . $row->glosa_sub_categoria . "</option>";
        }
    }

    return $htm;
}

if (!function_exists('quitar_tildes')) {

    function quitar_tildes($cadena) {

        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "Ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        $texto = str_replace($no_permitidas, $permitidas, $cadena);
        return $texto;
    }

}
