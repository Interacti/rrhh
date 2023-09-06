
   	
    
    
    
     <?php 
	 
	 //echo count($lista->getData());
	 
	 if ($lista->getData()>0) : 
	 
	 ?>
   
 
 	<div class="clear"></div>
    <?php foreach($lista->getData() as $p):?>
    <div id="prod"  align="center">
        <img src="<?php echo BASE_IMG_CON ?>productos/listado/<?php echo $p->nombre_thumb ?>">
        <div class="clear"></div>
        <div>
            <span class="nombre-producto-listado"><strong><?php echo $p->producto?></strong></span>
            <div class="clear"></div>
            <span class="nombre-producto-listado"><strong>MARCA :<?php echo $p->marca?></strong></span>
            <div class="clear"></div>
            <span class="nombre-producto-listado"><strong>PUNTOS : <?php echo number_format($p->valor_en_puntos,0,",",".")?></strong></span>
            <?php if ($p->stock>0) :?>
    <div class="clear"></div>
   
          <span class="nombre-producto-listado"><strong>STOCK : <?php echo number_format($p->stock,0,",",".")?> Unidades</strong></span>
          
    <?php endif?>
          <div class="clear"></div>
          <p>
            <span>
                <strong>
                    <a class="btn btn-success" href="<?php echo BASE_URL ?>catalogo/detalle/<?php echo str_replace(' ','-',strtolower(trim($p->glosa_sub_categoria)))?>/<?php echo str_replace(' ','-',strtolower(trim($p->productourl)))?>">Ver Detalle</a>
                </strong>
            </span>
         </p>   
        </div>
        <div class="clear"></div>
    </div>
    
    <?php endforeach?>
    <div class="clear"></div>
    <div class="paginacion paginacion-centered">
	<?php echo $lista->ShowLinks('class');?>    
    </div>
<?php else :?>
    <div class="info">No existen productos activos en esta categoria </div>

<?php endif ?>