<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Paginacion {

    public $Rows = 10;
    public $TotalRecords;
    public $Data;
    public $Page = 1;
    public $LinksToShow = 10;
    public $LinksAfterBefore = 6;
    public $Vars = array();
    public $Uri = "";
    public $v = "";

    public function __construct() {
        
    }

    /*     * ******************************
     * PASAR LOS DATOS                                *
     * ****************************** */

    function setData($data) {

        $this->Data = $data;
    }

    /*     * ******************************
     * CALCULA EL TOTAL DE REGISTROS    *
     * ****************************** */

    function RecordCount() {
        //return count($this->Data);
        return $this->TotalRecords;
    }

    /*     * *****************************
     * CALCULA LOS NUMEROS DE PAGINA *
     * ***************************** */

    function NumbersOfPage() {
        return ceil($this->RecordCount() / $this->Rows);
    }

    /*     * ***************************** ********
     * DEVUELVE LOS DATOS DE LA AGINA EN UN ARRAY *
     * *************************************** */

    function GetData() {
        $gdata = "";
        if ($this->Page <= 0 || $this->Page > $this->NumbersOfPage()) {
            $this->Page = 1;
        };

        $inferior = (($this->Page - 1) * $this->Rows);
        $superior = ($this->Rows + $inferior) - 1;
        $colspan = 0;
        if (count($this->Data) > 0) {
            foreach ($this->Data as $key => $value) {
                if ($key >= $inferior && $key <= $superior) {
                    $gdata [$key] = $value;
                }
            }
        } else {
            $gdata = 0;
        }
        return $gdata;
    }

    function DataGrid() {
        $AutoHeaders = true;

        if ($this->Page <= 0 || $this->Page > $this->NumbersOfPage()) {
            $this->Page = 1;
        }
        ;
        $inferior = (($this->Page - 1) * $this->Rows);
        $superior = ($this->Rows + $inferior) - 1;
        $colspan = 0;

        $htm = "<table align='center' cellpadding='0' cellspacing='0'  width='100%'  >";
        $htm .= $this->Headers($this->Data);
        $htm .= "<tbody>";
        $fila = 0;
        foreach ($this->Data as $key => $value) {
            if ($key >= $inferior && $key <= $superior) {
                if (is_array($value)) {
                    $htm .= "<tr>";
                    foreach ($value as $k => $v) {
                        if (strlen($v) == 0) {
                            $v = "&nbsp;";
                        }
                        ;

                        $htm .= "<td>" . $v . "</td>";
                        $colspan++;
                    }

                    $htm .= "</tr>";
                }
            }
        }

        $htm .= "</tbody>";
        $htm .= "<tfoot><tr><td colspan='$colspan'  class='text' align='center' ></td></tr></tfoot></table>";
        return $htm;
    }

    public function info() {
        if ($this->RecordCount() > 0) {
            return " Pagina   {$this->Page} de  {$this->NumbersOfPage()}  [Total Registros {$this->RecordCount()} / Registros Por Pagina {$this->Rows}]";
        }
    }

    /*     * *********************************
     * CREAR LOS ENLACES Y NRO PAGINAS *
     * ********************************* */

    function ShowLinks($class) {
        if ($this->RecordCount() <= 0) {
            return null;
        }
        //$lnk .= "<div  class='".$class."'>";
        //$lnk .= " <ul >";
        // limite inferior
        if (($this->Page - $this->LinksAfterBefore) < 1) {

            $min = 1;
        } else {

            $min = ($this->Page - $this->LinksAfterBefore);
        }

        //limite superior
        if (($min + $this->LinksToShow) > $this->NumbersOfPage()) {

            $max = $this->NumbersOfPage();
        } else {

            $max = $min + $this->LinksToShow;
        }


        $lnk = "
         <ul class='{$class}'>
         ";
        if ($this->Page == 1) {
            $lnk .= "<li ><a href='javascript:void(0)'>&laquo;</a></li>";
        } else {
            $lnk .= "<li ><a href='" . $this->Uri . '' . ($this->Page - 1) . "'>&laquo;</a></li>";
        }

        for ($i = $min; $i <= $max; $i++) {

            if ($this->Page == $i) {
                $lnk .= "<li ><a style='background:#53a8e1 !important;color:#FFF' href='javascript:void(0)'>" . $i . "</a></li>";
            } else {

                $lnk .= "<li><a href='" . $this->Uri . "" . $i . "'>" . $i . "</a></li>";
            }
        }


        if ($this->Page == $this->NumbersOfPage()) {
            //echo $this->Uri;

            $lnk .= " <li ><a href='javascript:void(0)'>&raquo;</a></li>";
        } else {
            $lnk .= '<li ><a href="' . $this->Uri . '' . ($this->Page + 1) . $this->vars() . '  ">&raquo;</a></li>';
        }


        $lnk .= "	
					</ul>
    			";

        return $lnk;
    }

    public function vars() {
        $v = '';
        $OL = '&';
        if (is_array($this->Vars)) {
            foreach ($this->Vars as $key => $value) {
                //$vars .= "{$value}" . $OL;
                $v .= $OL . "{$key}={$value}";
            }
            return $v; //substr($v, 0, - 1);
        } else {
            return '';
        }
    }

    /*     * ******************************
     * OBTIENE LOS NOMBRES DE CAMPOS  *
     * ****************************** */

    private function Headers($data) {
        //print_r($data);


        if (is_array($data)) {

            $h = "<thead><tr class='ui-widget-header'>";
            foreach ($data as $key => $value) {
                foreach ($value as $k => $v) {
                    $h .= "<th>" . $k . "</th>";
                }
                break;
            }

            $h .= "</tr></thead>";

            return $h;
        }
    }

}
