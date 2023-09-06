

     
     
  <?php foreach ($producto as $p) :?>
  <div id="detalle-prod-img" >
   <img src="<?php echo BASE_IMG_CON ?>productos/detalle/<?php echo $p->nombre_imagen?>" width="365" height="320" />
  </div>
  <div id="data-producto">
    <div class="prod-nombre"><?php echo $p->producto?></div>
    <div class="clear"></div>
    <div class="prod-linea">&nbsp;</div>
    <div class="clear"></div>
    <span class="labels" >MARCA : <?php echo $p->marca?></span>
    <div class="clear"></div>
    <span class="labels" >CODIGO : <?php echo $p->codigo_antiguo?></span>
    <div class="clear"></div>
    <span class="labels">PUNTOS  : <?php echo number_format($p->valor_en_puntos,0,",",".")?></span>
    <?php if ($p->stock>0) :?>
    <div class="clear"></div>
    <span class="labels">STOCK  : <?php echo number_format($p->stock,0,",",".")?> Unidades</span>
    <?php endif?>
    <div class="clear"></div>
    <div class="btn-carro"><a href="<?php echo BASE_URL?>catalogo/addToCart/<?php echo $p->id_producto?>" onclick="AddCart"><img src="<?php echo BASE_IMG_FE?>agregar_al_carro.fw.png" width="263" height="54" /></a></div>
    <div class="clear"></div>
    <div class="btn-canje"><a href="<?php echo BASE_URL?>/catalogo/solicitud"><img src="<?php echo BASE_IMG_FE?>btn_canjear.png" width="263" height="54" /></a></div>
  </div>
  <div class="clear"></div>
  <div class="caracteristicas">
     <div id="titulo-caracteristicas">CARACTERISTICAS DEL PRODUCTO</div>
     <div id="detalle-caracteristicas">
       <?php echo str_replace('|','<br />' ,$p->descripcion)?>
     </div>
  </div>
<?php endforeach ;?>

