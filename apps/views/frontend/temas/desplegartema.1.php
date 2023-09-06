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
				
					<?php if (count($contenido)>0) :?>
					<div class="col-md-12 no-padding">
						<?php foreach ($contenido as $co):	?>
						<div class="col-md-12 noticias-bienestar-box"  >
							<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt=""> </div>
							<div class="col-md-9" >
								<div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo?></div>
								<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada?></div>
								
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
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12"><h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
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

<?php if ( $contenido[0]->seo_sub_categoria=='charlas-de-seguridad'  )   :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12"><h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
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
	cumpleaños
**************************/-->

<?php if (  $subcategoria=="cumpleanos" )   :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			<div class="col-md-9 " >
			<?php if (count($contenido)>0) :
			      
			?>
			 	<div class="col-md-12"><h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
			 	 	<?php foreach ($cumples as $co):	?>
					<div class="col-md-12 empleados-box">
						<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/personal/<?php echo $co->rutdv?>.jpg"  alt=""> </div>
						<div class="col-md-9" >
							 <div class="col-md-12 nombre-empleado"><?php echo $co->nombre?></div>
							 <div class="col-md-12 cargo-empleado" ><?php echo $co->cargo?></div>
							 <div class="col-md-12 cargo-empleado" ><?php echo $co->departamento?></div>
							 <div class="col-md-12 cargo-empleado" ><?php echo $co->fecha_nacimiento?></div>
							 
			
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
				 <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
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




<?php if ($contenido[0]->seo_sub_categoria=='productos-y-servicio-destacados') :?>
<section id="product" style="margin-top:25px">
    <div class="container no-padding">
        <div class="row">
         	<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>	
			 <div class="col-md-9 " >
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12 no-padding">
				 <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>
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
			 
			 <?php if (count($contenido)>0) :?>
			 <div class="col-md-12 no-padding">
				 <h2 class="titulo-staticos"> <strong>   <?php echo ucfirst(strtolower($contenido[0]->glosa_categoria));  ?> / <?php echo ucfirst(strtolower($contenido[0]->glosa_sub_categoria));  ?> </strong></h2> </div>

				<p style="font-size:16px;text-align:justify;margin-bottom:25px">
				Cada mes todos los colaboradores de la organización podrán participar en un concurso que pretende premiar “La Súper Idea”. Este concurso consiste en que la persona que quiera puede plantear una idea que pueda representar una mejora para su área, otra área o para la organización en general. Las ideas se recibirán hasta el día 20 de cada mes y el ganador será publicado el día 30 del mismo mes. Se premiará la idea más creativa, eficiente y constructiva. El premio es una Gift Card de $30.000. Las ideas se pueden hacer llegar a gerenciadepersonas@caren.cl o a RRHH por el correo normal a nombre de Cecilia Pinto del área de RRHH. Es importante destacar que las ideas no necesariamente serán implementadas, sin embargo, se quiere premiar la innovación y el querer aportar a que “las cosas pasen”
				</p>	



				<?php foreach ($contenido as $co):	?>
					<div class="col-md-12 noticias-bienestar-box"  >
						<div class="col-md-3 no-padding"> <img src="<?php echo base_url()?>/assets/frontend/img/temas/<?php echo $co->img1?>"  class="imh-responsive" alt=""> </div>
						<div class="col-md-9" >
							<div class="col-md-12 noticias-bienestar-title" ><?php echo $co->titulo?></div>
							<div class="col-md-12 noticias-bienestar-short-text"><?php echo $co->bajada?></div>
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
						<p>
						 Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet nemo architecto atque, fugiat repudiandae asperiores laudantium numquam enim vero voluptatum illo, harum similique. Quis exercitationem quibusdam laudantium sapiente non incidunt?
						</p>
						<p><?php 	
						   $rutLiq=explode('-',$this->session->userdata['rutliq']);
						 ?>
						
						</p>
					</div>	
				
					
					<div class="col-md-12 no-padding">
						<div class="col-md-12 noticias-bienestar-box"  >
							<table class="table table-bordered table-hover">
								<tbody>
									<tr>
										<td>Descargar Liqudacion Abril 2018</td>
										<td class="text-center"><a href="<?php echo base_url()?>assets/frontend/liquidaciones/2018_04_<?php echo $rutLiq[0] ?>.pdf"><i class="fa fa-download"></i></a></td>
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