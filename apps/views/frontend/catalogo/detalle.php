<style>
ul {padding: 18px;}
</style>
<section class="product-page page fix">
    <div class="container">
        <div class="row">
           
               <?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>
               <?php foreach ($producto as $p) :?>
               <div class="col-lg-4 col-sm-6">
				<div class="details-pro-tab">
			<!-- Tab panes -->
					<div class="tab-content details-pro-tab-content">
						<div class="tab-pane fade in active" id="image-1">
							<div class="simpleLens-big-image-container">
								<a class="simpleLens-lens-image" data-lens-image="img/single-product/1.jpg">
									<img src="<?php echo base_url()?>assets/frontend/images/productos/detalle/<?php echo $p->nombre_imagen?>"  />
								</a>
							</div>
						</div>
					</div>
					<!-- Nav tabs
					<ul class="tabs-list details-pro-tab-list" role="tablist">
						<li class="active"><a href="#image-1" data-toggle="tab"><img src="img/single-product/thumb-1.jpg" alt=""></a></li>
						<li><a href="#image-2" data-toggle="tab"><img src="img/single-product/thumb-2.jpg" alt=""></a></li>
						<li><a href="#image-3" data-toggle="tab"><img src="img/single-product/thumb-3.jpg" alt=""></a></li>
						<li><a href="#image-4" data-toggle="tab"><img src="img/single-product/thumb-4.jpg" alt=""></a></li>
					</ul> -->
				</div>
			</div>
              
            <div class="col-lg-4 col-sm-6">
				<div class="shop-details">
					<!-- Product Name -->
					<h2><?php echo $p->producto?></h2>
				    <p></p>	
					<h6 style="font-weight: normal;"><strong>MARCA  :</strong> <?php echo $p->marca?></h6>
                    <h6 style="font-weight: normal;"><strong>CODIGO :</strong> <?php echo $p->codigo_antiguo?></h6>
                    <h6 style="font-weight: normal;"><strong>PUNTOS :</strong> <?php echo number_format($p->valor_en_puntos,0,",",".")?></h6>
                    <?php if ($p->stock>0) :?>
                    <h6 style="font-weight: normal;"><strong>STOCK  :</strong> <?php echo number_format($p->stock,0,",",".")?> Unidades</h6>
                    <?php endif?>
                    
				    <p>&nbsp;</p>
                 
					<div class="select-menu fix text-center">
                      <?php if ($p->stock>0 ) :?>
                     <a class="btn btn-primary btn-solicitud" href="<?php echo BASE_URL?>catalogo/solicitud"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>&nbsp;Solicitar Ahora</a>
                     <a class="btn btn-primary btn-solicitud" href="<?php echo BASE_URL?>catalogo/addToCart/<?php echo $p->id_producto?>" onclick="AddCart"><i class="fa fa-shopping-cart"></i>&nbsp;A&ntilde;adir al Carro</a>
                     
                     <?php else :?>
                       <!--<a class="btn btn-primary btn-solicitud" href="javascript:;"><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;Solicitar Ahora</a>-->
                     <?php endif?>
					</div>
					
                    
                    
				</div>
			</div>
            
            <div class="col-lg-9 col-sm-12 fix">
				<div class="description">
					<!-- Nav tabs -->
					<ul class="nav product-nav">
						<li class="li-tab active"><a data-toggle="tab" href="#description">DETALLES DEL PRODUCTO</a></li>
						<!--<li class="li-tab"><a data-toggle="tab" href="#review">VALORACIONES</a></li>-->
						<li class="li-tab"><a data-toggle="tab" href="#tags">ENV&Iacute;O</a></li>
						<li class="li-tab"><a data-toggle="tab" href="#custom-tags">GARANT&Iacute;A Y DEVOLUCIONES</a></li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="description" class="tab-pane fade active in" role="tabpanel">
                          	
                            <div class="col-md-12 no-padding" style="background: #ccc;padding-top: 10px;margin-bottom: 15px;  ">
                              <p><strong> Detalle del Producto</strong></p>
                            </div>
                            <div class="col-md-12 no-padding">
                                <?php echo $p->detalle; ?>
                            </div>
                            
                            <div class="clearfix"></div>
                            <div class="col-md-12" style="background: #ccc;padding-top: 10px;margin-bottom: 15px;margin-top: 15px;  ">
                              <p><strong>Descripción del producto</strong></p>
                            </div>
                            <div class="col-md-12">
                                <p><?php echo str_replace('|','<br />' ,$p->descripcion)?></p>
                            </div>
                            
                            
                            <div class="clearfix"></div>
						</div>	
						<!--<div id="review" class="tab-pane fade" role="tabpanel">
							<img class="img-responsive" alt="" src="<?php  echo  base_url()?>assets/frontend/img/iconos/estrellas.png">
							
						</div>-->
						<div id="tags" class="tab-pane fade" role="tabpanel">
							<p><?php echo $p->envio; ?></p>
						</div>
						<div id="custom-tags" class="tab-pane fade" role="tabpanel">
							<p style="padding: 18px;"><?php echo $p->garantia; ?></p>
						</div>
					</div>
				</div>
			</div>
            <?php endforeach ;?>
            
            
            
            
        </div>
    </div>
    
    
			 
    
    
</section>
     
  

