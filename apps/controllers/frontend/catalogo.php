<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Catalogo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('isLoged')){
        	redirect('login');
        } else {
        	 	$this->load->model('categorias_model');
		        $this->load->model('productos_model');
				$this->load->model('solicitud_model');
				$this->load->library('paginar');
        		
        }
        
       
		
		
    }

    public function Index() {

        $datos['content']= '/frontend/catalogo'; 
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
      
    }
       
    public function Desplegar($cat=null,$pag=1){
     	$this->paginar->Rows =6;
        $this->paginar->setData($this->productos_model->getProductosPorSubcategoria($cat));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = BASE_URL."catalogo/desplegar/".$cat;      
		$datos['lista'] = $this->paginar;
		$datos['content']= '/frontend/catalogo/desplegar'; 
        $datos['categoria']=strtoupper($cat);
    	$datos['camino_migas'] =   array('Catalogo'=>'javascript:;',str_replace('-',' ',ucfirst($cat))=>$cat);
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
    }   
       
	   
	public function Detalle ($categoria,$NombreProducto){
		
	    $datos['content']= '/frontend/catalogo/detalle'; 
        $datos['producto']=$this->productos_model->getProductosPorNombre($NombreProducto);
		$datos['camino_migas'] = array('Catalogo'=>'javascript:;',
										str_replace('-',' ',ucfirst($categoria))=>base_url().'catalogo/desplegar/'.$categoria,
										str_replace('-',' ',ucfirst($NombreProducto))=>$NombreProducto,
								 );
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
		
		
	   
	
	}   
	
	
	public function Porpuntos ($Puntos,$pag=1){
		
		$this->paginar->Rows =6;
        $this->paginar->setData($this->productos_model->getProductosPorPuntos($Puntos));
        $this->paginar->Page = $pag;
        $this->paginar->Uri = BASE_URL."catalogo/porpuntos/".$Puntos;      
		$datos['lista'] = $this->paginar;
        $datos['categoria']="Entre " .str_replace('-',' y ',ucfirst($Puntos)). ' Puntos';
		$datos['camino_migas'] =   array('Catalogo'=>'/catalogo/porpuntos',
										'ENTRE '.str_replace('-',' Y ',ucfirst($Puntos))=>$Puntos);
	    $datos['content']= '/frontend/catalogo/desplegar'; 
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
	   
	
	}   
	
	
    function Solicitud(){
        $datos['camino_migas'] =   array('Catalogo'=>BASE_URL.'/catalogo/',
										'Solicitud Canje'=>BASE_URL.'catalogo/solicitud');
	    $datos['content']= '/frontend/catalogo/carro'; 
        $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
        
    }
   
   	function addToCart($idProducto){
   	    //echo $idProducto;
        
   		$cantidad=1;
	 	$data=$this->productos_model->getProductosPorId($idProducto);
        $carrito = $this->cart->contents();
       //echo "<div style='display:none'>";
       //print_r($data);
       //echo "</div>";
        //if($data[0]->stock>0 || $data[0]->stock==-1 ){
            foreach ($carrito as $item) {
                //si el id del producto es igual que uno que ya tengamos
                //en la cesta le sumamos uno a la cantidad
                if ($item['id'] == $idProducto) {
                    $cantidad = 1 + $item['qty'];
                }
            }
        	$item = array (
							"id"=>$data[0]->id_producto,
							"qty"=>$cantidad,
							"price"=>$data[0]->valor_en_puntos,
						    "name"=>$this->quitar_tildes($data[0]->producto),
						);
		
		   $this->cart->insert($item); 
		   redirect("catalogo/solicitud");    
        //}else{
        //    redirect("/catalogo/solicitud");    
        //}
       
        
 	}
	
	
	function UpdateItemAdd ($rowid){
	   
		$cantidad=1;
		$carrito = $this->cart->contents();
      
        foreach ($carrito as $item) {
            if ($item['rowid'] == $rowid) {
                $stock=$this->productos_model->StockProducto($item['id']);
                
                if ($stock[0]->stock>$item['qty'] || $stock[0]->stock==-1 ){
                   $cantidad = 1 + $item['qty'];
                }else{
                   $cantidad=$item['qty']; 
                   $this->session->set_flashdata('error_stock', "la cantidad solicitada del producto {$stock[0]->producto} excede el stock disponible"); 
                } 
                 
            }
        }
	     $producto = array(
            'rowid' => $rowid,
            'qty' => $cantidad
        );
        $this->cart->update($producto);
        redirect("/catalogo/solicitud");
	
    }
	
	function UpdateItemRest ($rowid){
		$cantidad=1;
		$carrito = $this->cart->contents();
      
        foreach ($carrito as $item) {
            if ($item['rowid'] == $rowid) {
                $cantidad = $item['qty']-1;
            }
        }
	     $producto = array(
            'rowid' => $rowid,
            'qty' => $cantidad
        );
        $this->cart->update($producto);
        redirect("/catalogo/solicitud");
	}
	
		
	function DeleteItemCart($rowid){

        $producto = array(
            'rowid' => $rowid,
            'qty' => 0
        );
        $this->cart->update($producto);
       redirect("/catalogo/solicitud");
    }
    
    
  
	
	
	
    function SaveSolicitud () {
		 if (is_array($this->cart->contents()) && count($this->cart->contents())>0) { 
		  
         	 $inOrden=array(
					"id_socio"=>$this->session->userdata('id'),
					"monto"=>$this->cart->total(),
					"fecha"=>date('Y-m-d h:i:s'),
					"estado"=>1
				 );
                 
				 $idSol=$this->solicitud_model->GuardarSolicitudCanje($inOrden);
				 $carrito = $this->cart->contents();
				 //$this->solicitud_model->GuardaDetalleSolicitud($idSol,$carrito);
                 $this->solicitud_model->GuardaCanje($idSol,$carrito);
                 $this->solicitud_model->DescontarStock($carrito);
    			 $this->cart->destroy();
	
		 }
		 $datos['solicitud']= $idSol;	
		 $datos['camino_migas'] =   array('Catalogo'=>BASE_URL.'/catalogo/',
										'Solicitud Canje'=>BASE_URL.'catalogo/solicitud'); 
		 $datos['content']= '/frontend/catalogo/cierre';
		 $this->load->view('frontend/layout', $datos); //llamada a la vista general*/
	 
	}
	 
	 
	 function CancelarSolicitud(){
	 		 $this->cart->destroy();
			 redirect("/");
	 }
     
     
      function quitar_tildes($cadena) {
        
       // echo $cadena;
        
        
        $cad=str_replace('√É¬°','a',$cadena);
        $cad=str_replace('√°','a',$cad);
        $cad=str_replace('√É¬©','e',$cad);
        $cad=str_replace('√©','e',$cad);
        
        $cad=str_replace('√É¬≠','i',$cad);
        $cad=str_replace('√≠','i',$cad);
        
        $cad=str_replace('√É¬≥','o',$cad);
        $cad=str_replace('√≥','o',$cad);
        
        $cad=str_replace('√É¬∫','u',$cad);
        $cad=str_replace('√∫','u',$cad);
        
       return $cad;
        
       //mAYUSCULAS
       //√Å | √â | √ç | √ì | √ö 
       //E—ES
       //√± | √ë  
        
       /* √° | √© | √≠ | √≥ | √∫ |+|
        
        echo $cadena;
        $no_permitidas= array ("·","È","Ì","Û","˙","¡","…","Õ","”","⁄","Ò","—","¿","√","Ã","“","Ÿ","√ô","√ ","√®","√¨","√≤","√π","Á","«","√¢","Í","√Æ","√¥","√ª","√Ç","√ä","√é","√î","√õ","¸","√∂","√ñ","√Ø","√§","´","“","√è","√Ñ","√ã");
        $permitidas=    array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        
        echo $texto;
        die();
        return $texto;*/
    }
     

}