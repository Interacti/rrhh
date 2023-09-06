<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!function_exists('PuntosSocio')) {

    function PuntosSocio() {

        $ci = & get_instance();
        $rutsocio   = $ci->session->userdata('id'); // es en realidad el rut
        $socioId    = $ci->session->userdata('ide');
        $socioTipo  = $ci->session->userdata('tipo');
   
        
        
        
        if ($rutsocio) {

            //Obtengo Los Puntos del Gerente
            $ci->db
                    ->select(' puntos pts ')
                    ->from('in_puntos_gerentes')
                    ->where('rut_gerente', $rutsocio);
            $query = $ci->db->get();
            $pts_gte = $query->result();
            $pts_gte = count($pts_gte) > 0 ? $pts_gte[0]->pts : 0;

            //Descuento Por Abonos de gerentes a sus empleados
            $ci->db
                    ->select(' sum(abono) abonogte ')
                    ->from('vw_abonos_socios')
                    ->where('id_gerente', $socioId)
                    ->where('MONTH(fecha)=MONTH(NOW())')
                    ->where('YEAR(fecha)=YEAR(NOW())')
                    ->where('tipo_abono', 6)
                    ->order_by("fecha", "desc");
            $query = $ci->db->get();
            $ptsabgte = $query->result();
            $dsc_gte = count($ptsabgte) > 0 ? $ptsabgte[0]->abonogte : 0;

            
            //ABONOS PUNTOS
            $ci->load->model('solicitud_model');
            $data = $ci->solicitud_model->getSolicitudBySocio($rutsocio);

            $ci->db
                    ->select(' sum(abono) abono ')
                    ->from('in_abono')
                    ->where('rut_socio', $rutsocio);
               
            $query = $ci->db->get();
            $abono = $query->result();
            $abono = count($abono) > 0 ? $abono[0]->abono : 0;
      
            //puntos formalizacion
      
           $ci->db
                    ->select(' sum(in_formalizacion_detalle.puntos) frmPuntos ')
                    ->from('in_formalizacion_detalle')
                    ->where('rut', $rutsocio);
            $query = $ci->db->get();
            $frm = $query->result();
            $frm = count($frm) > 0 ? $frm[0]->frmPuntos : 0;
      
             
            if ($socioTipo==='GV') {
            // PUNTOS GERENTES
                $ci->db
                        ->select(' sum(valor_en_puntos) canje ')
                        ->from('in_canje')
                        ->join('in_producto', 'in_canje.id_producto=in_producto.id_producto')
                        ->where('rut_socio', $rutsocio)
                        ->where('MONTH(fecha)=MONTH(NOW())')
                        ->where('YEAR(fecha)=YEAR(NOW())');
                $query = $ci->db->get();
                $canje = $query->result();
                $canje = count($canje) > 0 ? $canje[0]->canje : 0;

            }else{    
            // PUNTOS CANJES
                $ci->db
                        ->select(' sum(valor_en_puntos) canje ')
                        ->from('in_canje')
                        ->join('in_producto', 'in_canje.id_producto=in_producto.id_producto')
                        ->where('rut_socio', $rutsocio);
                $query = $ci->db->get();
                $canje = $query->result();
                $canje = count($canje) > 0 ? $canje[0]->canje : 0;
            }
            // DESCUENTO DE PUNTOS    
            $ci->db
                    ->select(' sum(descuento)  descuento ')
                    ->from('in_descuento')
                    ->where('rut_socio', $rutsocio);
            $query = $ci->db->get();
            $descuento = $query->result();
            $descuento = count($descuento) > 0 ? $descuento[0]->descuento : 0;

            return (($pts_gte + $abono + $frm) - ($canje + $descuento + $dsc_gte));
        }

        return 0;
    }
  
}
 
 
 
 
 
 if (!function_exists('PuntosBySocio')) {
 
 function PuntosBySocio($rutsocio) {

       $ci = & get_instance();
        //$rutsocio   = $ci->session->userdata('id'); // es en realidad el rut
        //$socioId    = $ci->session->userdata('ide');
        $socioTipo  = $ci->session->userdata('tipo');
        
        
        
        if ($rutsocio) {

            //Obtengo Los Puntos del Gerente
            $ci->db
                    ->select(' puntos pts ')
                    ->from('in_puntos_gerentes')
                    ->where('rut_gerente', $rutsocio);
            $query = $ci->db->get();
            $pts_gte = $query->result();
            $pts_gte = count($pts_gte) > 0 ? $pts_gte[0]->pts : 0;


          

                     
            //Obtengo el id del socio
             $ci->db
                    ->select(' * ')
                    ->from('in_socio')
                    ->where('rut', $rutsocio);
            $query = $ci->db->get();
            $socio = $query->result();
            $socio_id = $socio[0]->id ;
    
           
   
            
   
            //Descuento Por Abonos de gerentes a sus empleados
            
            $ci->db
                    ->select(' sum(abono) abonogte ')
                    ->from('vw_abonos_socios')
                    ->where('id_gerente', $socio_id)
                    ->where('MONTH(fecha)=MONTH(NOW())')
                    ->where('YEAR(fecha)=YEAR(NOW())')
                    ->where('tipo_abono', 6)
                    ->order_by("fecha", "desc");
            $query = $ci->db->get();
            $ptsabgte = $query->result();
            $dsc_gte = count($ptsabgte) > 0 ? $ptsabgte[0]->abonogte : 0;
            
            

            //puntos formalizacion
      
           $ci->db
                    ->select(' sum(in_formalizacion_detalle.puntos) frmPuntos ')
                    ->from('in_formalizacion_detalle')
                    ->where('rut', $rutsocio);
            $query = $ci->db->get();
            $frm = $query->result();
            $frm = count($frm) > 0 ? $frm[0]->frmPuntos : 0;
      


            //ABONOS PUNTOS
              $ci->db
                    ->select(' sum(abono) abono ')
                    ->from('in_abono')
                    ->where('rut_socio', $rutsocio);
               
            $query =  $ci->db->get();
            $abono = $query->result();
            $abono = count($abono) > 0 ? $abono[0]->abono : 0;
      

  

            if ($socioTipo==='GV') {
                // PUNTOS GERENTES
                $ci->db
                        ->select(' sum(valor_en_puntos) canje ')
                        ->from('in_canje')
                        ->join('in_producto', 'in_canje.id_producto=in_producto.id_producto')
                        ->where('rut_socio', $rutsocio)
                        ->where('MONTH(fecha)=MONTH(NOW())')
                        ->where('YEAR(fecha)=YEAR(NOW())');
                $query = $ci->db->get();
                $canje = $query->result();
                $canje = count($canje) > 0 ? $canje[0]->canje : 0;

            }else{    
            // PUNTOS CANJES
                $ci->db
                        ->select(' sum(valor_en_puntos) canje ')
                        ->from('in_canje')
                        ->join('in_producto', 'in_canje.id_producto=in_producto.id_producto')
                        ->where('rut_socio', $rutsocio);
                $query = $ci->db->get();
                $canje = $query->result();
                $canje = count($canje) > 0 ? $canje[0]->canje : 0;
            }

            // DESCUENTO DE PUNTOS    
             $ci->db
                    ->select(' sum(descuento)  descuento ')
                    ->from('in_descuento')
                    ->where('rut_socio', $rutsocio);
            $query =  $ci->db->get();
            $descuento = $query->result();
            $descuento = count($descuento) > 0 ? $descuento[0]->descuento : 0;


            //return $pts_gte;

            return (($pts_gte + $abono + $frm) - ($canje + $descuento + $dsc_gte));
        }

        return 0;
    }
  }  