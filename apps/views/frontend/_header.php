<?php

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","S�bado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
$LaFecha=date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
//Salida: Viernes 24 de Febrero del 2012
    
?>
<?php 
  $nom= explode(' ',$this->session->userdata('nombre'));
  $ape=explode(' ' ,$this->session->userdata('apellido')); 
  $nom= ($nom[0]=="" ? $nom[1]:$nom[0]) .' '. $ape[0];

?>

<div class="header-top hidden-xs hidden-md hidden-sm    "><!--Start Header Top Area-->
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-4">
  	             <div class="mail-id float-left  no-padding text-center" >
					<i class="fa fa-phone "></i>
					<p style="text-align: right;"><a href="tel://">(56) 2 3217 0633</a></p>
				 </div>
            </div>
			<div class="col-sm-12 col-md-4 ">
                <div class="mail-id   no-padding text-center">
					<i class="fa fa-envelope-o "></i>
					<p style="text-align: right;"><a href="mailto:contacto@caren.cl">contacto@caren.cl</a></p>
				</div>
            </div>
			<div class="col-sm-12 col-md-4">
                    <div class="mail-id float-right  no-padding text-center" >
						<i class="fa fa fa-calendar "></i>
						<p style="text-align: right;"><a href="#"><?php echo $LaFecha ?></a></p>
					</div>
		
			</div>
		</div>
	</div>
</div><!--End Header Top Area-->
<div class="header-area"><!--Start Header Area-->
	<div class="container">
		<div class="row">
            <div class="col-lg-6 col-sm-6 col-md-3 col-xs-12">
               <div class="col-xs-2 hidden-md hidden-lg hidden-sm"><a href="<?php echo base_url() ?>"><i class="fa fa-home fa-2" style="font-size: 24px;" aria-hidden="true"></i></a></div>
               <div class="col-xs-8"><a href="<?php echo BASE_URL ?>"><img  src="<?php echo base_url()?>assets/frontend/img/header/logo.png" alt=""  class="img-responsive" /></a></div>
               <?php if(uri_string()!='inicio/1'):?>
               <div class="col-xs-2 hidden-md hidden-lg hidden-sm"><a href="javascript:window.history.back()"><i class="fa fa-undo " style="font-size: 24px;" aria-hidden="true"></i></a></div>
               <?php else:?>
               <div class="col-xs-2 hidden-md hidden-lg hidden-sm"><i class="fa fa-undo " style="font-size: 24px;" aria-hidden="true"></i></div>
           	   <?php endif;?>
               </div>
        
			<div class="col-sm-6 col-lg-6 col-xs-12">
            	<div class="log-link">
			        <h6 class="hidden-xs" style="color: #ccc;margin-bottom: 2px;"><a href="<?php echo BASE_URL ?>logout">Cerrar Sesi&oacute;n</a></h6>
                 	<h5 style="padding-top: 10px;" class="log-link-blue">Bienvenida(o) : <?php echo(ucwords(strtolower($nom)))?> </h5>
				</div>
			</div>
		
            
			
		</div>
	</div>
</div><!--End Header Area-->
<!--End Main Menu Area-->