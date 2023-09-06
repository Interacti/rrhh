
<section class="product-page page fix">
<div class="container">
<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>
<div class="col-md-9">
	<div class="row">
           <div class="section-title">
				<h2><?php echo str_replace('-',' ', $categoria)?></h2>
				<div class="underline"></div>
			</div>
            
            
            
            <div class="shop-products">
           
            <?php 
                if ($lista->getData()==0) : 
            ?>
                                <div class="alert alert-info text-center" >No existen productos activos en esta categoria </div>
            <?php else:
             
             $i=1; 
             foreach($lista->getData() as $p):
             ?>
            
            
                    	<!-- Single Product Start -->
						<div class="col-sm-4 fix">
							<div class="product-item fix">
								<div class="product-img-hover">
									<!-- Product image -->
									<a href="<?php echo base_url()?>catalogo/detalle/<?php  echo strtolower(str_replace(' ','-',quitar_tildes($p->glosa_sub_categoria)))  ?>/<?php echo strtolower(str_replace(' ','-',$p->productourl))?>" class="pro-image fix">
                                        <img class="img-responsive" src="<?php echo base_url()?>assets/frontend/images/productos/detalle/<?php echo $p->nombre_imagen?>" alt="product" />
                                    </a>
									<!-- Product action Btn -->
									<div class="product-action-btn">
										<a class="quick-view" href="<?php echo base_url()?>catalogo/detalle/<?php  echo strtolower(str_replace(' ','-',quitar_tildes($p->glosa_sub_categoria)))  ?>/<?php echo strtolower(str_replace(' ','-',$p->productourl))?>"><i class="fa fa-search"></i></a>
										<!--<a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>-->
										
									</div>
								</div>
								<div class="pro-name-price-ratting">
									<!-- Product Name -->
									<div class="pro-name">
										<a href="<?php echo base_url()?>catalogo/detalle/<?php  echo strtolower(str_replace(' ','-',quitar_tildes($p->glosa_sub_categoria)))  ?>/<?php echo strtolower(str_replace(' ','-',$p->productourl))?>"><?php echo $p->producto?></a>
									</div>
									<!-- Product Ratting -->
									<div class="pro-name">
									   <span> MARCA :<?php echo $p->marca?>  </span>
                                       <br />
                                       <?php if ($p->stock>0 ):?>
                                       <span > STOCK : <?php echo number_format($p->stock,0,",",".")?> Unidades  </span>
                                       <?php endif;?>
                                       <?php if ($p->stock==0 ):?>
                                       <span style="color: red;" > SIN STOCK </span>
                                       <?php endif;?>
									</div>
									<!-- Product Price -->
									<div class="pro-price fix">
                                        
										<p><span class="new"><?php echo  number_format($p->valor_en_puntos,0,',','.') ?> pts.</span></p>
									</div>
								</div>
							</div>
						</div><!-- Single Product End -->
                   <?php 
                        
                        if ($i==3) :
                          echo "<div class='clearfix'></div>";
                          $i=1;
                        else:
                          $i++;  
                        endif
                   
                   ?>
                    
                
                 <?php endforeach ;?> 
                 <div class="pagination ">
                	<?php echo $lista->ShowLinks('class');?>    
                 </div>
                 <?php endif;?>
                 <div style="margin-bottom: 25px;">&nbsp;</div>
                </div>
            </div>
            
            
    
    
    </div>
</div> 
</div>   	
 </section>  
    
    
    
    
    