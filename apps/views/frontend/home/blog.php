
<div class="blog-area section fix hidden-xs"><!--Start Blog Area-->
	<div class="container">
		<div class="row">
			<div class="section-title">
				<h2>TEMAS DE INTER&Eacute;S</h2>
				<div class="underline"></div>
			</div>
			<div class="blog-slider owl-carousel">
				
                 <?php 
                    
                    $mes=array('', 'Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic' ); 
                    //print_r($blog);
                    foreach ($blog as $post):
                    $separar=explode(' ',$post->fecha);    
                    $fecha=explode('-',$separar[0]);
                    $fechac=$post->fecha;
                    $segundos=strtotime('now')-strtotime($fechac) ;
                    $diferencia_dias=intval($segundos/60/60/24);
                    $categoria= $post->categoria == 1 ? 'Temas de interes': 'Datos &uacute;tiles';
                    $categoriaUrl= $post->categoria == 1 ? 'temas-de-interes': 'datos-utiles';
                    
                 ?>
                <div class="single-blog">
					<div class="content fix">
						<a class="image fix" href="<?php echo base_url()?>temas/<?php echo $categoriaUrl ?>/<?php echo $post->seo?>"><img src="<?php echo base_url()?>assets/frontend/images/temas/miniaturas/<?php echo $post->img1_r ?>" alt="" />
							<div class="date">
								<h4><?php echo $fecha[2]; ?></h4>
								<h5><?php echo $mes[(int)$fecha[1]]; ?></h5>
							</div>
						</a>
						<h2><a class="title" href="<?php echo base_url()?>temas/<?php echo $categoriaUrl ?>/<?php echo $post->seo?>"><?php echo $post->titulo ?></a></h2>
					</div>
				</div>
			     <?php endforeach;?>
				
			</div>
		</div>
	</div>
</div><!--End Blog Area-->
