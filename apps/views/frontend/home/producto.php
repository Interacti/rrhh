<?php $this->load->view('frontend/_menu_lateral',  FALSE); ?>




<div class="col-md-9"> 
	<div class="row"> 
           <div class="section-title">
           <div class="categorias-tittle">
                   <img class="float-left hidden-xs" style="margin-top: -8px" width="60" height="38" src="<?php echo base_url()?>assets/frontend/img/iconos/azul.png" />
                   <span class="h2">Productos Destacados</span>
                   <img class="float-right hidden-xs" style="margin-top:-8px" width="60" height="38" src="<?php echo base_url()?>assets/frontend/img/iconos/azul.png" />
     		</div>
           	  
                   
        	</div>
        	<div class="clearfix"></div>
            
            <?php 
               
            ?>
            <div class="shop-products">
            
                <?php 
                
                $i=1;
              
                foreach ($info->getData() as $producto):?> 
                    	<!-- Single Product Start -->
						<div class="col-sm-4  fix">
							<div class="product-item fix">
								<div class="product-img-hover">
									<!-- Product image -->
									<a href="<?php echo base_url()?>catalogo/detalle/<?php  echo strtolower(str_replace(' ','-',$producto->glosa_sub_categoria))  ?>/<?php echo strtolower(str_replace(' ','-',$producto->productourl))?>" class="pro-image fix">
                                        <img src="<?php echo base_url()?>assets/frontend/images/productos/detalle/<?php echo $producto->nombre_imagen?>" alt="product" />
                                    </a>
									<!-- Product action Btn -->
									<div class="product-action-btn">
										<a class="quick-view" href="<?php echo base_url()?>catalogo/detalle/<?php  echo strtolower(str_replace(' ','-',$producto->glosa_sub_categoria))  ?>/<?php echo strtolower(str_replace(' ','-',$producto->productourl))?>"><i class="fa fa-search"></i></a>
										<!--<a class="favorite" href="#"><i class="fa fa-heart-o"></i></a>-->
										
									</div>
								</div>
								<div class="pro-name-price-ratting"> 
									<!-- Product Name -->
									<div class="pro-name">
										<a href="<?php echo base_url()?>catalogo/detalle/<?php  echo strtolower(str_replace(' ','-',$producto->glosa_sub_categoria))  ?>/<?php echo strtolower(str_replace(' ','-',$producto->productourl))?>"><?php echo $producto->producto?></a>
									</div>
									<!-- Product Ratting -->
									<!--<div class="pro-ratting">
										<i class="on fa fa-star"></i>
										<i class="on fa fa-star"></i>
										<i class="on fa fa-star"></i>
										<i class="on fa fa-star"></i>
										<i class="on fa fa-star-half-o"></i>
									</div>-->
									<!-- Product Price -->
									<div class="pro-price fix">
										<p><span class="new"><?php echo  number_format($producto->valor_en_puntos,0,',','.') ?> pts.</span></p>
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
                	<?php echo $info->ShowLinks('class');?>    
                 </div>
                 
                 
                 <div style="margin-bottom: 2px;">&nbsp;</div>
                </div>
            </div>
            
            
    
    
    </div>
</div>                