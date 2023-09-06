<?php //print_r($temas)?>
<section class="blog-page page fix"><!-- Start Blog Area-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-3">
				<div class="single-sidebar">
					<h2>Categorias</h2>
					<ul>
						<li><a href="#">Datos &Uacute;tiles</a></li>
						<li><a href="#">Temas de Inter&eacute;s</a></li>
						
					</ul>
				</div>
				<div class="single-sidebar">
					<h2>Recent Post</h2>
					<ul class="resent-post">
						<li><!-- SINGLE POST -->
							<div class="image">
								<a href="#"><img alt="" src="img/blog/recent-1.jpg"></a>
							</div>
							<div class="content fix">
								<h5><a href="#">Lorem ipsum</a></h5>
								<span><i class="fa fa-clock-o"></i>20-2-2015</span>
							</div>
						</li>
						<li><!-- SINGLE POST -->
							<div class="image">
								<a href="#"><img alt="" src="img/blog/recent-2.jpg"></a>
							</div>
							<div class="content fix">
								<h5><a href="#">Lorem ipsum</a></h5>
								<span><i class="fa fa-clock-o"></i>20-2-2015</span>
							</div>
						</li>
						<li><!-- SINGLE POST -->
							<div class="image">
								<a href="#"><img alt="" src="img/blog/recent-3.jpg"></a>
							</div>
							<div class="content fix">
								<h5><a href="#">Lorem ipsum</a></h5>
								<span><i class="fa fa-clock-o"></i>20-2-2015</span>
							</div>
						</li>
					</ul>
				</div>
				<!--  <div class="single-sidebar">
					<h2>Acrive</h2>
					<ul>
						<li><a href="#">May 2013</a></li>
						<li><a href="#">April 2013</a></li>
						<li><a href="#">March 2013</a></li>
						<li><a href="#">February 2013</a></li>
						<li><a href="#">January 2013</a></li>
					</ul>
				</div>
				<div class="single-sidebar">
					<h2>Tags</h2>
					<div class="tagcloud fix">
						<a href="#">Rings</a>
						<a href="#">Necklaces</a>
						<a href="#">Bracelets</a>
						<a href="#">Earrings</a>
						<a href="#">Churies</a>
						<a href="#">Jewelry Sets</a>
						<a href="#">Kids Jewelry</a>
						<a href="#">Watches</a>
					</div>
				</div>-->
			</div>
			<div class="col-sm-8 col-md-9">
				<div class="row">
					<div class="col-md-6">
						<div class="single-blog">
							<div class="content fix">
								<a class="image fix" href="blog-details.html"><img src="img/blog/blog-1.jpg" alt="" />
									<div class="date">
										<h4>25</h4>
										<h5>Aug</h5>
									</div>
								</a>
								<h2><a class="title" href="blog-details.html">Lorem ipsum dolor sit amet</a></h2>
								<div class="meta">
									<a href="#"><i class="fa fa-pencil-square-o"></i>John Lee</a>
									<a href="#"><i class="fa fa-calendar"></i>2 Days ago</a>
									<a href="#"><i class="fa fa-comments"></i>12 Comments</a>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim niam.</p>
							</div>
						</div>
					</div>
				</div>
				<!-- Pagination -->
				<div class="pagination">
					<ul>
						<li><a href="#"><i class="fa fa-angle-left"></i></a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">8</a></li>
						<li><a href="#">9</a></li>
						<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section><!-- Start Blog Area-->


<div class="grid_9" id="content-tema">
	<div class="grid_3">
		<div id="img-tema">
			<img
				src="<?php echo BASE_IMG_CON ?>temas/principal/<?php echo $temas[0]->img2 ?>"
				width="225" height="231" />
		</div>
		<div class="clear"></div>
		<div class="otros-temas-titulo">OTROS TEMAS DE INTERES</div>

		 <?php foreach ($otros as $otr) :?>
		<div class="otros-temas">
			<?php echo $otr->titulo ; ?>.<br /> <span><a
				href="<?php echo BASE_URL?>temas/<?php echo $otr->seo // str_replace(' ', '-' , strtolower($otr->titulo))?>"><?php echo $otr->bajada ; ?> </a><span>
		
		</div>
		<?php endforeach; ?>


	</div>

	<div id="texto-tema">
		<h5><?php echo $temas[0]->titulo ?></h5>
		<div class="clear"></div>
  <?php echo $temas[0]->texto ?>   
  </div>



</div>