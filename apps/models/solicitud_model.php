<?php

class Solicitud_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getSolicitudBySocio($socio = null)
    {
        if ($socio != null)
        {

            $this->db->select('*')->from('vw_SolicitudesProductos')->where('rutsocio', $socio);
            $query = $this->db->get();
            return $query->result();
        } else
        {

            return null;
        }
    }
    
    
    function getAllSolicitudes()
    {
        $this->db->select('*')
        ->from('vw_SolicitudesProductos')
        ->where('cantidad > 0') 
        ->order_by('id_solicitud','desc')
        ->limit(1500);
        $query = $this->db->get();
        return $query->result();
    }
    
    
    function  getDetalleSolicitud($id){ 
       	
    	$this->db->select('*')
    	->from('DetalleDeCanjes')
    	->where('nro_orden', $id);
    	$query = $this->db->get();
    	return $query->result();
    	
    }
    
        
    function getEstadoSolicitud()
    {
    	$this->db->select('*')->from('in_estado_solicitud');
    
    	$query = $this->db->get();
    	return $query->result();
    }
    
     
    
    function getPlanillaCanjes($fInicio = null, $fTtermino = null)
    {
        if (is_null($fInicio) && is_null($fTtermino))
        {
            $this->db
            	->select('*')
            	->from('DetalleCanjesPlanillaExcel')
            	->order_by('fecha', 'desc');
        }

        if (!is_null($fInicio) && !is_null($fTtermino))
        {

            $this->db->select('*')->from('DetalleCanjesPlanillaExcel')->where("fecha BETWEEN '" .
                $fInicio . "' AND '" . $fTtermino . "'")->order_by('fecha', 'desc');
        }

        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    function getSolicitudById($id)
    {
        $this->db->select('*')->from('vw_SolicitudesProductos')->where('id_solicitud', $id)->
            order_by('id_solicitud', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    
    
    
    
    function getSolicitudesCanje($fInicio = null, $fTtermino = null)
    {
        if (is_null($fInicio) && is_null($fTtermino))
        {
            $this->db->select('*')->from('vw_listado_solicitudes_excel')->order_by('nro_orden',
                'desc');
        }

        if (!is_null($fInicio) && !is_null($fTtermino))
        {

            $this->db->select('*')->from('vw_listado_solicitudes_excel')->where("fecha BETWEEN '" .
                $fInicio . "' AND '" . $fTtermino . "'")->order_by('nro_orden', 'desc');
        }

        $query = $this->db->get();
        return $query->result();
    }
    
    function getCanjeByIdSolicitud($id = null)
    {
        if (!is_null($id))
        {
            $this->db
            	->select('*')
            	->from('DetalleDeCanjes')
            	->where('nro_orden', $id)->order_by('nro_orden', 'desc');

            $query = $this->db->get();
            return $query->result();
        }
    }
    
     
    
    
    
    /*********************************************************
     * permite descargar la planilla excel que se envia para
     * despacho a security 
    **********************************************************/
   
    
    
    function getSolicitudesCanjeExcel($fInicio = null, $fTtermino = null)
    {
        
        
        if (is_null($fInicio) && is_null($fTtermino))
        {
            $this->db->select('*')->from('DetalleCanjesPlanillaExcel')->order_by('fecha',
                'desc');
        }

        if (!is_null($fInicio) && !is_null($fTtermino))
        {

            $this->db->select('*')->from('DetalleCanjesPlanillaExcel')->where("fecha BETWEEN '" .
                $fInicio . "' AND '" . $fTtermino . "'");
        }
        
        $q=$this->db->get();
        return $q->result();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    function GuardarSolicitudCanje($data = null)
    {
        if (is_array($data))
        {
            $this->db->trans_start();
            $this->db->insert('in_solicitud_canje', $data);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();
            return $insert_id;
        } else
        {
            return 'No se pudo insertar la solicitud';
        }
    }
    
    function GuardaDetalleSolicitud($data = null, $carrito = null)
    {
        if (is_array($carrito) && $data != "")
        {
            foreach ($carrito as $item)
            {
                $inDetalle[] = array(
                    "id_solicitud" => $data,
                    "id_producto" => $item['id'],
                    "cantidad" => $item['qty'],
                    "puntos" => $item['price'],
                    "subtotal" => $item['subtotal']);
            }
            $this->db->trans_start();
            $this->db->insert_batch('in_solicitud_producto', $inDetalle);
            $this->db->trans_complete();
            return true;
        } else
        {
            return 'No se pudo insertar el detalle de la solicitud';
        }
    }
    
    function GuardaCanje($data = null, $carrito = null)
    {
        if (is_array($carrito) && $data != "")
        {
            foreach ($carrito as $item)
            {
                for ($i = 1; $i <= $item['qty']; $i++)
                {
                    $cj[] = array(
                        "rut_socio" => $this->session->userdata('id'),
                        "id_producto" => $item['id'],
                        "fecha" => date('Y-m-d'),
                        "nro_orden" => $data);
                       
                }
            }

            $this->db->trans_start();
            $this->db->insert_batch('in_canje', $cj);
            $this->db->trans_complete();
             $this->DescontarStock($cj);   
        } else
        {
            return 'No se pudo insertar el detalle de la solicitud';
        }
    }
    
    
    function DescontarStock($id) {
      for($i=0;$i<=count($id)-1;$i++){
          $this->db->select('id_producto,stock')->from('in_producto')->where('id_producto',$id[$i]['id_producto']);
          $query = $this->db->get();
          $prod=$query->result(); 
          $newStock=(int)$prod[0]->stock-1;         
          $this->db->where('id_producto',$id[$i]['id_producto']);
          $this->db->update('in_producto', array("stock"=>$newStock));
      }
    }
    
    function CheckStock($id){
        
          $this->db->select('stock')->from('in_producto')->where('id_producto',$id);
          $query = $this->db->get();
          $prod=$query->result(); 
          return $prod[0]->stock > 0 ? 1 : 0 ; 
        
    }

    function ActulizaEstadoSolicitud($data)
    {

        if (is_array($data))
        {
            $this->db->where('id_solicitud', $data['id_solicitud']);
            $this->db->update('in_solicitud_canje', $data);
            return true;

        } else
        {
            return false;
        }
    }


    function DeleteCanjeById($id){
        $this->db->select('*')->from('in_canje')->where('id_canje',$id);
        $query = $this->db->get();
        $prod=$query->result();
        $QRY="update in_producto set stock =stock + 1 where id_producto=".$prod[0]->id_producto;
        $this->db->query($QRY);
        return $this->db->where('id_canje', $id)->delete('in_canje');
    }
    
    /* 
     *eleimina una solicitud de canje y todos  
     * sus canjes si los tiene 
     */
    
    function DeleteSolicitud($id){
    	if ($this->__TieneCanjes($id)>0){
    	    $this->_ActualizarStock($id);
            //
            $this->db->where('nro_orden', $id)->delete('in_canje');
        }
    	return $this->db->where('id_solicitud', $id)->delete('in_solicitud_canje');
    }

    
    function __TieneCanjes($idsol){
    	
    	$this->db->like('nro_orden', $idsol);
    	$this->db->from('in_canje');
    	return $this->db->count_all_results();
    	
    	
    }
    
    function _ActualizarStock($idOrden=null){
        $this->db->select('*')->from('in_canje')->where('nro_orden',$idOrden);
        $query = $this->db->get();
        $prod=$query->result();
        foreach ($prod as $p){
            $QRY="update in_producto set stock =stock + 1 where id_producto=".$p->id_producto;
            $this->db->query($QRY);
        }
        return true; 
    }
    
}
