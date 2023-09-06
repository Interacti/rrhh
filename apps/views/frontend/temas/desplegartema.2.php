<?php
/*$separar=explode(' ',$temas[0]->fecha);    
$fecha=explode('-',$separar[0]);
$fechac=$temas[0]->fecha;
$segundos=strtotime('now')-strtotime($fechac) ;
$diferencia_dias=intval($segundos/60/60/24);
$mes=array('', 'Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic' );
*/

//print_r($contenido);

?>



<?php 
$cn=count($contenido);

if ($cn==0) :?>
   
    <section id="product" style="margin-top:25px">
        <div class="container-fluid no-padding">
            <div class="row">
             	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
    			 <div class="col-md-9 " >
    			 <div class="col-md-12"><h2 class="titulo-staticos"> <strong>   </strong></h2> </div>
    					<div class="col-md-12 separacion">
    					</div>
    			 </div>
        	</div>
        </div>
    </section>
    
<?php else: ?>




<div class="clearfix" ></div>


<!--/***************************
	beneficios y convenios
**************************/-->


<?php if ($subcategoria=='beneficios-y-convenios') :?>
	<section id="product" style="margin-top:25px">
		<div class="container no-padding">
			<div class="row">
				<!-- MENU  LATERAL -->
				<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
				<!-- FIN MENU LATERAL -->
				<div class="col-md-9 " >
					<div class="col-md-12">
						<h2 class="titulo-staticos">
							<strong>
								<?php echo ucfirst(strtolower($categoria));  ?> / <?php echo ucfirst(strtolower(str_replace('-',' ',$subcategoria)));  ?> 
							</strong>
						</h2> 
					</div>	
				    
                    <?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
                    
                     
					<?php if (count($contenido)>0) :?>
					<div class="col-md-12 no-padding">
						<?php foreach ($contenido as $co):	?>
                        
                          
                        
						<div class="col-md-12 noticias-bienestar-box"  >
							<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt=""> </div>
							<div class="col-md-9" >
								<div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo?></div>
								<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto?></div>
                                <div class="col-md-12 noticias-bienestar-short-text" style="padding-top: 25px;;">
                                <?php if ($co->seo=='beneficios-de-la-mutual-de-seguridad'):?>
                                   <a href="http://rrhh.caren.cl/temas/bienestar/beneficios-y-convenios/beneficios-de-la-mutual-de-seguridad" class="btn btn-large btn-block btn-primary">CONVENIOS MUTUAL</a>
                                <?php endif;?>
                                </div>
								
							</div>
						</div>
						<?php endforeach;?>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>
<?php endif;?>




<!-- /**************************
	personal destacado
**************************/ -->

<?php if ($contenido[0]->seo_sub_categoria=='personal-destacado'  )   :?>
<section id="product" style="margin-top:25px">
		<div class="container no-padding">
			<div class="row">
				<!-- MENU  LATERAL -->
				<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
				<!-- FIN MENU LATERAL -->
				<div class="col-md-9 " >
					<div class="col-md-12">
						<h2 class="titulo-staticos">
							<strong>
								<?php echo ucfirst(strtolower($categoria));  ?> / <?php echo ucfirst(strtolower(str_replace('-',' ',$subcategoria)));  ?> 
							</strong>
						</h2> 
					</div>	
                    
                     <?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
				
					<?php if (count($contenido)>0) :?>
					<div class="col-md-12 no-padding">
						<?php foreach ($contenido as $co):	?>
						<div class="col-md-12 noticias-bienestar-box"  >
							<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt=""> </div>
							<div class="col-md-9" >
								<div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo?></div>
								<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada?></div>
								<div class="col-md-4 col-md-push-8 m-t-70"  >
								<a  href="<?php echo base_url() .'temas/'. $co->glosa_seo  .'/'.  $co->seo_sub_categoria . '/' .  $co->seo?>"   type="button" class="btn btn-large btn-block btn-primary">Ver más</a>
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>
<?php endif;?>

<!-- /**************************
	personal destacado
**************************/ -->

<?php if ($contenido[0]->seo_sub_categoria=='bienvenidos'  )   :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12"><h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
              <?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
			 	 <?php foreach ($contenido as $co):	?>
					<div class="col-md-12 empleados-box">
						 <div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  alt=""> </div>
						 <div class="col-md-9" >
						 	<div class="col-md-12 nombre-empleado"><?php echo $co->titulo?></div>
						 	<div class="col-md-12 cargo-empleado" ><?php echo $co->bajada?></div>
						 	<div class="col-md-12"><?php echo $co->texto?></div>
						</div>
					</div>
					<div class="clearfix"></div>
					
					<?php endforeach;?>
			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif;?>


<!--/**************************
	charlas de segurida
**************************/-->

<?php 



if ( $subcategoria=='papeleta-vacaciones'  )   :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12"><h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
			 <?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
                 
                  <?php foreach ($contenido as $co):	?>
					
					
					<?php endforeach;?>
			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif;?>



<!--/**************************
	charlas de segurida
**************************/-->

<?php if ( $contenido[0]->seo_sub_categoria=='charlas-de-seguridad'  )   :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12"><h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
			 	 
                  <?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
                  
                  <?php foreach ($contenido as $co):	?>
					<div class="col-md-12 empleados-box">
						 <div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  alt=""> </div>
						 <div class="col-md-9" >
						 	<div class="col-md-12 nombre-empleado"><?php echo $co->titulo?></div>
						
						 	<div class="col-md-12"><?php echo $co->texto?></div>
						

						</div>
					</div>
					<div class="clearfix"></div>
					
					<?php endforeach;?>
			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif;?>

<!--/**************************
	cumpleaños
**************************/-->

<style>
	
	.slick-slide img {
    
    padding: 10px;
    margin-bottom: 15px;
}


</style>

<?php if (  $subcategoria=="cumpleanos" )   :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			<div class="col-md-9 " >
			<?php if (count($contenido)>0) :
			      
			?>
			 	<div class="col-md-12"><h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
			 	  
				<?php ?>

				<?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
                <div class="col-md-12" style="margin-bottom: 50px"> 
					<p>En esta sección usted podrá informarse sobre todos los cumpleaños de sus compañero y amigos de Caren.</p>    
				</div>    


                <div class="col-md-12">

                		
                		<div id="slick1">
							<?php foreach ($cumples as $co): ?>
						   
							<?php if (file_exists("./assets/frontend/img/personal/".$co->rutdv.".jpg")) {?>
						    <div class="item " >
						    	<div>
						    		<img  class="img-responsive"  src="<?php echo base_url()?>assets/frontend/img/personal/<?php echo $co->rutdv?>.jpg"  alt="">
						    	</div>
						    	<div>
						    		<div class="col-md-12 cargo-empleado"> <?php echo $co->nombre . ' ' . $co->apellido  ?></div>
						    		<div class="col-md-12 cargo-empleado"> <?php echo $co->departamento?></div>
						    		<div class="col-md-12 cargo-empleado"> <?php echo date('d-m',strtotime($co->fecha_nacimiento))?></div>
						    	</div>
	                                
						    </div>
							<?php }?>

							<?php if (file_exists("./assets/frontend/img/personal/".$co->rutdv.".JPG")) {?>
						    <div class="item " >
						    	<div>
						    		<img  class="img-responsive"  src="<?php echo base_url()?>assets/frontend/img/personal/<?php echo $co->rutdv?>.JPG"  alt="">
						    	</div>
						    	<div>
						    		<div class="col-md-12 cargo-empleado"> <?php echo $co->nombre . ' ' . $co->apellido  ?></div>
						    		<div class="col-md-12 cargo-empleado"> <?php echo $co->departamento?></div>
						    		<div class="col-md-12 cargo-empleado"> <?php echo date('d-m',strtotime($co->fecha_nacimiento))?></div>	
						    	</div>
	                                
						    </div>
							<?php }?>


							<?php endforeach;?>
					
						</div>    
					

                </div>

					

                 	

                  
                  
                  	<?php /*foreach ($cumples as $co):	?>
					<div class="col-md-6 empleados-box">
						<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/personal/<?php echo $co->rutdv?>.jpg"  alt=""> </div>
						<div class="col-md-9" >
							 <div class="col-md-12 cargo-empleado">NOMBRE: <?php echo $co->nombre . ' ' . $co->apellido  ?></div>
							 <div class="col-md-12 cargo-empleado" >DEPARTAMENTO: <?php echo $co->departamento?></div>
							 <div class="col-md-12 cargo-empleado" >FECHA NACIMIENTO: <?php echo date('d-m-d',strtotime($co->fecha_nacimiento))?></div>
				
						</div>
					</div>
					
					<?php endforeach;*/?>
				</div>
			<?php endif; ?>
    	</div>
	</div>
</section>
<?php endif;?>


<!--/**************************
	noticias internas
**************************/-->

<?php if ($subcategoria=='noticias-internas') :?>
	<section id="product" style="margin-top:25px">
		<div class="container no-padding">
			<div class="row">
				<!-- MENU  LATERAL -->
				<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
				<!-- FIN MENU LATERAL -->
				<div class="col-md-9 " >
					<div class="col-md-12">
						<h2 class="titulo-staticos">
							<strong>
								<?php echo ucfirst(strtolower($categoria));  ?> / <?php echo ucfirst(strtolower(str_replace('-',' ',$subcategoria)));  ?> 
							</strong>
						</h2> 
					</div>	
                    
                    <?php if ($banner):?>
                         <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
                        
                					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
                         </div>
                    <?php endif;?>
				
					<?php if (count($contenido)>0) :?>
					<div class="col-md-12 no-padding">
						<?php foreach ($contenido as $co):	?>
						<div class="col-md-12 noticias-bienestar-box"  >
							<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt=""> </div>
							<div class="col-md-9" >
								<div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo?></div>
								<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada?></div>
								<div class="col-md-4 col-md-push-8 m-t-70"  >
								<a  href="<?php echo base_url() .'temas/'. $co->glosa_seo  .'/'.  $co->seo_sub_categoria . '/' .  $co->seo?>"   type="button" class="btn btn-large btn-block btn-primary">Ver más</a>
								</div>
							</div>
						</div>
						<?php endforeach;?>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>
<?php endif;?>



<!--/**************************
	galeria de fotos
**************************/-->

<?php if ($contenido[0]->seo_sub_categoria=='galeria-de-fotos') :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12 no-padding">
				 <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
				
                <?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
                
                <?php foreach ($contenido as $co):	?>
					<div class="col-md-12 noticias-bienestar-box"  >
						<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt=""> </div>
						<div class="col-md-9" >
							<div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo?></div>
							<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada?></div>
							<div class="col-md-4 col-md-push-8 m-t-70"  >
									<a  href="<?php echo base_url() .'temas/'. $co->glosa_seo  .'/'.  $co->seo_sub_categoria . '/' .  $co->seo?>"   type="button" class="btn btn-large btn-block btn-primary">Ver Galeria</a>
							</div>
						</div>
					
					<div class="clearfix"></div>
					</div>
					<?php endforeach;?>

			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif;?>



<!--/**************************
	concursos
**************************/-->

<?php if ($contenido[0]->seo_sub_categoria=='concursos') :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>

			 <div class="col-md-12 no-padding">
				 <h2 class="titulo-destacado-inc"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> 
			</div>
				
			<?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>	

			<?php foreach ($contenido as $co):	?>
				<div class="col-md-4 noticias-bienestar-box"  >
					<img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt="">
					<div class="clearfix"></div>
				</div>
				<?php endforeach;?>

			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif;?>


<?php if ($contenido[0]->seo_sub_categoria=='encuesta-clima') :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>

			 <div class="col-md-12 no-padding">
				 <h2 class="titulo-destacado-inc"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> 
			</div>
				
			<?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>	

			    <?php foreach ($contenido as $co):	?>
				
				<?php endforeach;?>

			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif;?>







<?php if ($contenido[0]->seo_sub_categoria=='productos-y-servicio-destacados') :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12 no-padding">
				 <h2 class="titulo-destacado-inc"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
				<?php foreach ($contenido as $co):	?>
					<div class="col-md-12 noticias-bienestar-box"  >
						<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt=""> </div>
						<div class="col-md-9" >
							<div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo?></div>
							<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto?></div>
						</div>
					
					<div class="clearfix"></div>
					</div>
					<?php endforeach;?>

			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif;?>

<!--/*****
	SUPER IDEA
*****/-->

<?php if ($contenido[0]->seo_sub_categoria=='super-idea') :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 
			 	<div class="col-md-12 no-padding">
					 <h2 class="titulo-destacado-inc"> 
						 <strong>   
						 	<?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / 
						 	<?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> 
						 </strong>
					 </h2> 
				 </div>
                 <?php if ($banner):?>
                     <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
                    
            					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
                     </div>
                <?php endif;?>
				 <div class="col-md-12 no-padding">
				 	<?php foreach ($contenido as $co):	?>
				 		
                      	<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto?></div>
				 	<?php endforeach;?>
				 </div>

 			 </div>
			 
    	</div>
    </div>
</section>
<?php endif;?>


<!--/*****
	SUPER IDEA
*****/-->
<?php 


if ($subcategoria=='anexos-telefonicos') :?>
<style>
	.typeahead { border: 1px solid #FFF;border-radius: 4px;padding: 8px 12px;max-width: 300px;min-width: 290px;background: #000;color: #FFF;}
	.tt-menu { width:300px; }
	ul.typeahead{margin:0px;padding:10px 0px;}
	ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:#FFF;}
	ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
	.bgcolor {max-width: 100%;min-width: 290px;max-height:340px;background:transparent no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
	.demo-label {font-size:1.5em;color: #ccc;font-weight: 500;color:#FFF;}
	.dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
		text-decoration: none;
		background-color: #ccc;
		outline: 0;
	}
    
    #resul{
        margin-top: 25px;
    }
	</style>

<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 
               
			 	<div class="col-md-12 no-padding">
					 <h2 class="titulo-staticos-rrhh"> 
						 <strong>   
						 	<?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / 
						 	<?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> 
						 </strong>
					 </h2> 
				 </div>
                 <?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?>
                 
                 <?php foreach ($contenido as $co):	?>
				 <div class="col-md-12 no-padding" style="margin-bottom: 70px;"><h5><?php echo $co->texto?></h5></div>
                 <?php endforeach;?>
				<div class="col-md-6 col-md-offset-3 no-padding">
					<div class="input-group input-group-sm" style="margin-top:25px">
		                <input type="text" id="txtCountry" class="form-control" placeholder="BUSQUEDA POR NOMBRE" >
		                <span class="input-group-btn">
		                	<button id="search" type="button" class="btn btn-info btn-flat">BUSCAR</button>
		                </span>
		            </div>
				</div>
                
                
                <div class="col-md-12" id="resul">
                
                
                </div>



 			 </div>
			 
    	</div>
    </div>
</section>
<?php endif;?>


<?php /* if ($contenido[0]->seo_sub_categoria=='liquidaciones-de-sueldo') : ?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12 no-padding">
				 <h2 class="titulo-staticos-rrhh"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
				<?php foreach ($contenido as $co):	?>
					<div class="col-md-12 "  >
						<div class="col-md-12" >
                            <div class="sub-titulo-staticos-rrhh col-md-12 noticias-bienestar-short-text">PARA DESCARGAR TU LIQUIDACIÓN DE SUELDO</div>
							<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->texto?></div>
						</div>
					
					<div class="clearfix"></div>
					</div>
					<?php endforeach;?>

			 </div>
			 <?php endif; ?>
    	</div>
    </div>
</section>
<?php endif; */?>





<?php if ($subcategoria=='liquidaciones-de-sueldo') :?>
	<section id="product" style="margin-top:25px">
		<div class="container no-padding">
			<div class="row">
				<!-- MENU  LATERAL -->
				<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
				<!-- FIN MENU LATERAL -->
				<div class="col-md-9 " >
					<div class="col-md-12">
						<h2 class="titulo-staticos-rrhh">
							<strong>
								<?php echo strtoupper(strtolower($categoria));  ?> / <?php echo ucfirst(strtolower(str_replace('-',' ',$subcategoria)));  ?> 
							</strong>
						</h2> 
						<?php $rutLiq=explode('-',$this->session->userdata['rutliq']); ?>
						</p>
					</div>	
					
					<?php if ($banner):?>
             <div class="col-md-12 no-padding" style="margin-bottom: 50px"> 
            
    					<img src="<?php echo base_url()?>assets/frontend/img/banners/<?php echo $banner[0]->bnr_image?>"  class="center-block  img-responsive">    
             </div>
             <?php endif;?> 
	

					<div class="col-md-12">
						<p>
						 En  esta secci&oacute;n usted podr&aacute; acceder en formato pdf a sus &uacute;ltimas 3 liquidaciones de sueldo, para los tramites que estime conveniente.
						</p>
					</div>
				
					
					<div class="col-md-12 no-padding">
						<div class="col-md-12 noticias-bienestar-box"  >
							<table class="table table-bordered table-hover">
								<tbody>
									<tr>
										<td>Descargar Liqudacion Junio 2018</td>
										<td class="text-center"><a target="_blank"  href="<?php echo base_url()?>assets/frontend/liquidaciones/2018_06_<?php echo $rutLiq[0] ?>.pdf"><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td>Descargar Liqudacion Mayo 2018</td>
										<td class="text-center"><a target="_blank" href="<?php echo base_url()?>assets/frontend/liquidaciones/2018_05_<?php echo $rutLiq[0] ?>.pdf"><i class="fa fa-download"></i></a></td>
									</tr>
									<tr>
										<td>Descargar Liqudacion Abril 2018</td>
										<td class="text-center"><a target="_blank" href="<?php echo base_url()?>assets/frontend/liquidaciones/2018_04_<?php echo $rutLiq[0] ?>.pdf"><i class="fa fa-download"></i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					

				</div>
			</div>
		</div>
	</section>
<?php endif;?>












<?php endif;?>